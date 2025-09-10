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
require_once 'models/SubscriberDopplerList.php';
require_once 'utils/SpreadSheetGoogle.php';

class StripeCustomersController
{
    public function handleRequest()
    {
        Logger::debug("controller_started", [], 'STRIPE');
        try {
            // Verificar el metodo de solicitud
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                Logger::error("invalid_method", ['method' => $_SERVER['REQUEST_METHOD'] ?? 'unknown'], 'STRIPE');
                http_response_code(405);
                throw new Exception('Metodo no permitido');
            }

            $jsonData = $this->getJsonDataFromRequest();
            $email = $jsonData['customer_email'] ?? 'unknown';

            Logger::info("subscription_processing_started", ['email' => $email], 'STRIPE');
            $resultados = $this->processAndSaveSubscription($jsonData);

            $response = ['message' => 'Subscription saved successfully', 'data' => $resultados];
            return $response;
        } catch (Exception $e) {
            Logger::error("controller_failed", [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 'STRIPE');
            http_response_code(500);
            throw new Exception($e->getMessage());
        }
    }

    private function getJsonDataFromRequest()
    {
        Logger::debug("json_parsing_started", [], 'STRIPE');
        $entityBody = file_get_contents('php://input');

        $jsonData = mb_convert_encoding($entityBody, 'UTF-8');
        $jsonData = json_decode($jsonData, true);

        // Verificar si el JSON es valido
        if (json_last_error() !== JSON_ERROR_NONE) {
            Logger::error("json_invalid", ['error' => json_last_error_msg()], 'STRIPE');
            http_response_code(400);
            throw new Exception('JSON incorrecto' . $jsonData);
        }

        Logger::debug("json_parsed", ['email' => $jsonData['customer_email'] ?? 'unknown'], 'STRIPE');
        return $jsonData;
    }

    private function updateRegisteredUser($db, $UserData)
    {
        $email = $UserData['customer_email'] ?? 'unknown';
        Logger::debug("Updating registered user", ['email' => $email], 'STRIPE');

        $RegisteredModel = new RegisteredDatabase($db);
        $existingUser = $RegisteredModel->getRegisteredByEmail($UserData['customer_email']);

        if ($existingUser) {
            Logger::debug("User exists, updating DT VIP status", ['email' => $email], 'STRIPE');
            $RegisteredModel->updateDTVIPByEmail($UserData['customer_email']);
        } else {
            Logger::debug("User doesn't exist, inserting new automated registered", ['email' => $email], 'STRIPE');
            return $RegisteredModel->insertAutomatedRegistered($UserData);
        }
    }

    private function processAndSaveSubscription($UserData)
    {
        $email = $UserData['customer_email'] ?? 'unknown';
        Logger::debug("subscription_processing", ['email' => $email], 'STRIPE');

        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $StripeCustomersModel = new StripeCustomersDatabase($db);

        // Check if customer already exists
        $existingCustomer = $StripeCustomersModel->getCustomerByEmail($UserData['customer_email']);
        if ($existingCustomer) {
            Logger::duplicate("customer_duplicate", ['email' => $email], 'STRIPE');
            return false;
        }

        // Save customer to stripe_customers table
        $StripeCustomersModel->insertCustomer($UserData);
        Logger::debug("customer_saved", ['email' => $email], 'STRIPE');

        // Update or create in registered table
        $this->updateRegisteredUser($db, $UserData);
        Logger::debug("registered_updated", ['email' => $email], 'STRIPE');

        // Create user object for integrations
        $user = $this->CreateUserObj($UserData, LIST_LANDING_DIGITALT_VIP);
        $user['final_price'] = $UserData['final_price'];
        $user['payment_status'] = $UserData['payment_status'];
        $user['stripe'] = $UserData;

        try {
            // Send email
            Logger::info("email_sending", ['email' => $email, 'subject' => $user['subject']], 'STRIPE');
            sendEmail($user, $user['subject']);
            Logger::info("email_sent", ['email' => $email], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("email_failed", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
            // Continue with other integrations even if email fails
        }

        try {
            // Save to spreadsheet
            Logger::debug("spreadsheet_saving", ['email' => $email, 'spreadsheet_id' => ID_SPREADSHEET_DT_VIP], 'STRIPE');
            saveSubscriptionSpreadSheet($user, ID_SPREADSHEET_DT_VIP);
            Logger::info("spreadsheet_saved", ['email' => $email], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("spreadsheet_failed", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
        }

        try {
            // Save to Doppler
            Logger::debug("doppler_adding", ['email' => $email, 'list' => $user['list']], 'STRIPE');
            $dopplerHandler = new SubscriberDopplerList();
            $result = $dopplerHandler->saveSubscription($user);
            Logger::info("doppler_added", ['email' => $email, 'result' => $result], 'STRIPE');
        } catch (Exception $e) {
            Logger::error("doppler_failed", ['email' => $email, 'error' => $e->getMessage()], 'STRIPE');
        }

        Logger::success("subscription_completed", ['email' => $email], 'STRIPE');
        return true;
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
        Logger::debug("Creating user object", ['email' => $email], 'STRIPE');

        $currentEvent = getCurrentEvent();
        Logger::debug("Current event resolved", ['event_name' => $currentEvent['name'] ?? 'unknown'], 'STRIPE');

        $encode_email = toHex(json_encode([
            'userEmail' => $UserData['customer_email'],
            'userEvents' => json_encode([$currentEvent['freeId'], $currentEvent['vipId']])
        ]));

        $ticketType = $this->resolveTicketType(DIGITALTRENDS);
        Logger::debug("Ticket type resolved", ['ticket_type' => $ticketType], 'STRIPE');

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
            'subject' => "#EMMS2025 - Compraste tu entrada vip!"
        ];

        Logger::debug("User object created", ['email' => $userObj['email'], 'ticket_type' => $userObj['ticketType']], 'STRIPE');
        return $userObj;
    }
}
