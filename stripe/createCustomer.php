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
    $errorDetails = [
        'timestamp' => date('Y-m-d H:i:s'),
        'error_message' => $e->getMessage(),
        'error_file' => $e->getFile(),
        'error_line' => $e->getLine(),
        'stack_trace' => $e->getTraceAsString(),
        'request_data' => file_get_contents('php://input'),
        'server_info' => [
            'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'] ?? 'unknown',
            'HTTP_HOST' => $_SERVER['HTTP_HOST'] ?? 'unknown',
            'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? 'unknown'
        ]
    ];
    error_log("Stripe Integration Error: " . json_encode($errorDetails));

    http_response_code(500);
    $response['message'] = 'Internal server error: ' . $e->getMessage();
    $response['error_details'] = $errorDetails;
    echo json_encode($response);
}
