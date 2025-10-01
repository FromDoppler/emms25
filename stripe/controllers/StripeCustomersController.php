<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Logger.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/getCurrentEvent.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php';
require_once 'models/StripeCustomersDatabase.php';
require_once 'models/RegisteredDatabase.php';
require_once 'utils/sendEmail.php';
require_once 'utils/toHex.php';
require_once 'models/StripeCustomersJobsDatabase.php';
require_once 'workers/core/RedisManager.php';
require_once 'utils/SpreadSheetGoogle.php';

class StripeCustomersController
{
    private $db;

    public function __construct()
    {
        $this->db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 'utf8mb4');
    }

    public function handleRequest()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                Logger::error("invalid_method", ['method' => $_SERVER['REQUEST_METHOD'] ?? 'unknown'], 'STRIPE');
                http_response_code(405);
                throw new Exception('Metodo no permitido');
            }

            $jsonData = $this->getJsonDataFromRequest();
            $email = $jsonData['customer_email'] ?? 'unknown';

            Logger::info("subscription_received", [
                'session_id' => $jsonData['session_id'] ?? $jsonData['stripe_session_id'] ?? 'unknown',
                'email' => $email,
                'final_price' => (float)($jsonData['final_price'] ?? 0),
                'payment_status' => $jsonData['payment_status'] ?? 'unknown'
            ], 'STRIPE');

            $result = $this->processAndSaveSubscription($jsonData);

            return ['message' => 'Subscription saved successfully', 'data' => $result];
        } catch (Exception $e) {
            Logger::error("controller_failed", [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 'STRIPE');
            http_response_code(500);
            throw $e;
        }
    }

    private function getJsonDataFromRequest()
    {
        $json = file_get_contents('php://input');
        $data = json_decode(mb_convert_encoding($json, 'UTF-8'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Logger::error("json_invalid", ['error' => json_last_error_msg()], 'STRIPE');
            http_response_code(400);
            throw new Exception('JSON incorrecto');
        }

        return $data;
    }

    private function updateRegisteredUser($UserData)
    {
        $email = $UserData['customer_email'] ?? 'unknown';
        $registeredModel = new RegisteredDatabase($this->db);
        $existingUser = $registeredModel->getRegisteredByEmail($email);

        if ($existingUser) {
            $registeredModel->updateDTVIPByEmail($email);
            return $existingUser['id'];
        }

        return $registeredModel->insertAutomatedRegistered($UserData);
    }

    private function processAndSaveSubscription($UserData)
    {
        $email = $UserData['customer_email'] ?? 'unknown';

        $userContext = $this->saveCustomerAndPrepareUser($UserData);

        if (!$userContext) {
            return false;
        }

        return $this->enqueueOrFallback(
            $userContext['user'],
            $userContext['registeredId'],
            $userContext['stripeCustomerId'],
            $email
        );
    }

    private function saveCustomerAndPrepareUser($UserData)
    {
        $email = $UserData['customer_email'] ?? 'unknown';
        $stripeModel = new StripeCustomersDatabase($this->db);

        if ($stripeModel->getCustomerByEmail($email)) {
            Logger::duplicate("customer_duplicate", ['email' => $email], 'STRIPE');
            return null;
        }

        $stripeModel->insertCustomer($UserData);
        $stripeCustomerId = $this->db->lastInsertID();

        $registeredId = $this->updateRegisteredUser($UserData);

        Logger::info("customer_upserted", [
            'registered_id' => $registeredId,
            'stripe_customer_id' => $stripeCustomerId,
            'email' => $email
        ], 'STRIPE');

        $user = $this->CreateUserObj($UserData, LIST_LANDING_DIGITALT_VIP);
        $user['final_price'] = $UserData['final_price'] ?? 0;
        $user['payment_status'] = $UserData['payment_status'] ?? '';
        $user['stripe'] = $UserData;

        return compact('registeredId', 'stripeCustomerId', 'user');
    }

    private function enqueueOrFallback($user, $registeredId, $stripeCustomerId, $email)
    {
        $useQueue = defined('USE_JOB_QUEUE') && USE_JOB_QUEUE && class_exists('Redis');

        if ($useQueue) {
            $jobModel = new StripeCustomersJobsDatabase($this->db);
            $jobId = $jobModel->createJob($registeredId, $stripeCustomerId, $user);

            Logger::info("job_created", [
                'job_id' => $jobId,
                'registered_id' => $registeredId,
                'stripe_customer_id' => $stripeCustomerId,
                'email' => $email
            ], 'STRIPE');

            $publishResults = $this->publishJobToStreams($jobId, $email);
            $allStreams = RedisManager::getAllStreams();

            if (count($publishResults) === count($allStreams)) {
                Logger::success("subscription_queued", [
                    'email' => $email,
                    'job_id' => $jobId,
                    'registered_id' => $registeredId,
                    'stripe_customer_id' => $stripeCustomerId,
                    'streams' => $publishResults
                ], 'STRIPE');
                return true;
            }

            Logger::warning("queue_fallback_triggered", [
                'job_id' => $jobId,
                'email' => $email,
                'reason' => empty($publishResults) ? 'redis_failed' : 'redis_partial'
            ], 'STRIPE');
        } else {
            Logger::info('queue_unavailable', ['email' => $email], 'STRIPE');
        }

        return $this->processFallback($user, $email);
    }

    private function processFallback($user, $email)
    {
        require_once 'models/SubscriberDopplerList.php';
        $ok = true;

        try {
            sendEmail($user, $user['subject']);
            Logger::info("email_sent", ['email' => $email], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("email_failed_direct", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
            $ok = false;
        }

        try {
            saveSubscriptionSpreadSheet($user, ID_SPREADSHEET_DT_VIP);
            Logger::info("spreadsheet_saved", ['email' => $email], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("spreadsheet_failed_direct", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
            $ok = false;
        }

        try {
            $doppler = new SubscriberDopplerList();
            $result = $doppler->saveSubscription($user);
            Logger::info("doppler_added", ['email' => $email, 'result' => $result], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("doppler_failed_direct", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
            $ok = false;
        }

        if ($ok) {
            Logger::success("subscription_completed_direct", ['email' => $email], 'STRIPE');
        } else {
            Logger::warning("subscription_partial_direct", ['email' => $email], 'STRIPE');
        }

        return $ok;
    }

    private function publishJobToStreams($jobId, $email)
    {
        if (!class_exists('Redis')) return [];

        try {
            $redisManager = RedisManager::getInstance();
            $streams = RedisManager::getAllStreams();
            $results = [];

            foreach ($streams as $stream) {
                $results[$stream] = $redisManager->addToStream($stream, $jobId);
                Logger::info('job_published', ['stream'=>$stream,'job_id'=>$jobId,'message_id'=>$results[$stream]], 'STRIPE');
            }

            return $results;
        } catch (Exception $e) {
            Logger::error("job_publish_failed", ['email'=>$email,'job_id'=>$jobId,'error'=>$e->getMessage()], 'STRIPE');
            return [];
        }
    }

    private function resolveTicketType(string $event): string
    {
        $eventTicketMaps = [
            DIGITALTRENDS => [
                'pre' => 'digitalTrendsVipPre',
                'during' => 'digitalTrendsVipDuring',
                'post' => 'digitalTrendsVipPost',
            ],
            ECOMMERCE => [
                'pre' => 'ecommerceVipPre',
                'during' => 'ecommerceVipDuring',
                'post' => 'ecommerceVipPost',
            ],
        ];

        if (!isset($eventTicketMaps[$event])) {
            throw new LogicException("Evento no válido: {$event}");
        }

        $tiketTypeMap = $eventTicketMaps[$event];

        $phaseData = processPhaseToShow($event);
        $phaseToShow = $phaseData['phaseToShow'] ?? null;

        if (!isset($tiketTypeMap[$phaseToShow])) {
            throw new LogicException("Fase no válida para el evento: {$phaseToShow}");
        }

        return $tiketTypeMap[$phaseToShow];
    }

    private function CreateUserObj($UserData, $listId = LIST_LANDING_DIGITALT_VIP)
    {
        $email = $UserData['customer_email'] ?? 'unknown';
        $currentEvent = getCurrentEvent();

        $encode_email = toHex(json_encode([
            'userEmail' => $UserData['customer_email'],
            'userEvents' => json_encode([$currentEvent['freeId'], $currentEvent['vipId']])
        ]));

        $ticketType = $this->resolveTicketType(DIGITALTRENDS);

        $userObj = [
            'register' => date("Y-m-d h:i:s A"),
            'firstname' => $UserData['customer_name'],
            'email' => $UserData['customer_email'],
            'company' => '',
            'jobPosition' => '',
            'phone' => '',
            'ecommerce' => 0,
            'digital_trends' => 1,
            'encode_email' => $encode_email,
            'privacy' => true,
            'promotions' => false,
            'ip' => '',
            'country_ip' => '',
            'source_utm' => $UserData['utm_source'] ?? '',
            'medium_utm' => $UserData['utm_medium'] ?? '',
            'campaign_utm' => $UserData['utm_campaign'] ?? '',
            'content_utm' => $UserData['utm_content'] ?? '',
            'term_utm' => $UserData['utm_term'] ?? '',
            'origin' => $UserData['origin'] ?? '',
            'type' => $currentEvent['freeId'],
            'ticketType' => $ticketType,
            'form_id' => "pre",
            'list' => $listId,
            'subject' => "=?UTF-8?B?" . base64_encode("🎟️ Tu entrada VIP al EMMS Digital Trends") . "?="
        ];

        return $userObj;
    }
}
