<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

try {
    $session_id = $_GET['session_id'] ?? '';
    if (!$session_id) {
        http_response_code(400);
        echo json_encode(['error' => 'session_id requerido']);
        exit;
    }

    $node_url = STRIPE_URL_SERVER . "/session-status?session_id=" . urlencode($session_id);

    $ch = curl_init();
    if (!$ch) {
        throw new Exception("No se pudo inicializar curl");
    }

    curl_setopt($ch, CURLOPT_URL, $node_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        throw new Exception("Error en curl: $error");
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    http_response_code($http_code);
    echo $response;

} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500);
    echo json_encode([
        'error' => 'Error interno al obtener el estado de la sesión',
        'message' => $e->getMessage()
    ]);
}
