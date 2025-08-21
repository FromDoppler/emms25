<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

require_once 'controllers/StripeCustomersController.php';

$response = [
    'success' => false,
    'message' => '',
    'data' => null
];

try {
    $StripeCustomersController = new StripeCustomersController();
    $result = $StripeCustomersController->handleRequest();
    $response['success'] = true;
    $response['message'] = 'Subscription processed successfully';
    $response['data'] = $result;
    echo json_encode($response);
} catch (Exception $e) {
    http_response_code(500); // Error interno del servidor
    $response['message'] = $e->getMessage();
    echo json_encode($response);
}
