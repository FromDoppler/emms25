<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/EmailService.php');
function sendEmail($user, $subject)
{
    try {
        EmailService::sendEmailRegister($user, $subject);
    } catch (Exception $e) {
        $errorMessage = json_encode(["sendEmail (Envia mail por Relay)", $e->getMessage(), ['user' => $user, 'subject' => $subject]]);
        http_response_code(500); // Error interno del servidor
        throw new Exception($errorMessage);
    }
}
