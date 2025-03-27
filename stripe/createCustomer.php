<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

require_once 'controllers/StripeCustomersController.php';

try {
    $StripeCustomersController = new StripeCustomersController();
    $response = $StripeCustomersController->handleRequest();
    echo json_encode(["mensaje" => $response]);
} catch (Exception $e) {
    http_response_code(500); // Error interno del servidor
    print_r($e);
}
