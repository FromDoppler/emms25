<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
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
        try {
            // Verificar el metodo de solicitud
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405); // Metodo no permitido
                throw new Exception('Metodo no permitido');
            }
            $jsonData = $this->getJsonDataFromRequest();

            // Procesar y guardar suscripcion
            $resultados = $this->processAndSaveSubscription($jsonData);
            $response = ['message' => 'Subscription saved successfully', 'data' => $resultados];
            return $response;
        } catch (Exception $e) {
            http_response_code(500); // Error interno del servidor
            throw new Exception($e->getMessage());
        }
    }

    private function getJsonDataFromRequest()
    {
        $entityBody = file_get_contents('php://input');
        $jsonData = mb_convert_encoding($entityBody, 'UTF-8');
        $jsonData = json_decode($jsonData, true);
        // Verificar si el JSON es valido
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400); // Solicitud incorrecta
            throw new Exception('JSON incorrecto' . $jsonData);
        } else {
            $response = ['message' => "success_raw", "objRaw" => $jsonData];
        }
        return $jsonData;
    }

    private function updateRegisteredUser($db, $UserData)
    {
        $RegisteredModel = new RegisteredDatabase($db);
        if ($RegisteredModel->getRegisteredByEmail($UserData['customer_email'])) {
            $RegisteredModel->updateEcommerceVIPByEmail($UserData['customer_email']);
        } else {
            return $RegisteredModel->insertAutomatedRegistered($UserData);
        }
    }

    private function processAndSaveSubscription($UserData)
    {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $StripeCustomersModel = new StripeCustomersDatabase($db);

        $existingCustomer = $StripeCustomersModel->getCustomerByEmail($UserData['customer_email']);

        if ($existingCustomer) {
            return false;
        }

        // registra usuario VIP en tabla STRIPE
        $StripeCustomersModel->insertCustomer($UserData);

        // crea o actualiza usuario en tabla registered
        $this->updateRegisteredUser($db, $UserData);

        $user = $this->CreateUserObj($UserData, LIST_LANDING_ECOMMERCE_VIP);

        // Enviar email de compra exitosa
        $user['final_price'] = $UserData['final_price'];
        $user['payment_status'] = $UserData['payment_status'];
        sendEmail($user, $user['subject']);
        $user['stripe'] = $UserData;
        // Guardar la suscripcion en SpreadSheet de usuarios VIP
        saveSubscriptionSpreadSheet(ID_SPREADSHEET_VIP, $user);

        // carga el usuario en lista de doppler de usuarios vip
        $dopplerHandler = new SubscriberDopplerList();
        $dopplerHandler->saveSubscription($user);

        return true;
    }

    private function resolveTiketType(string $event): string
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
        $encode_email = toHex(json_encode([
            'userEmail' => $UserData['customer_email'],
            'userEvents' => json_encode(['ecommerce25', 'ecommerce25-vip'])
        ]));
        return [
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
            'source_utm' => "stripe",
            'medium_utm' => "stripe",
            'campaign_utm' => 'stripe',
            'content_utm' => 'stripe',
            'term_utm' => "stripe",
            'origin' => "stripe",
            'type' => "ecommerce25",
            'tiketType' => $this->resolveTiketType(ECOMMERCE),
            'form_id' => "pre",
            'list' => $listId,
            'subject' => "#EMMS2025 - Compraste tu entrada vip!"
        ];
    }
}
