<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/EmailTemplateManager.php');

class Relay
{
    private static $apiKey;
    private static $account;

    private const urlBase = 'https://api.dopplerrelay.com/accounts/';
    private const fromName = 'EMMS 2025';
    private const fromEmail = 'info@goemms.com';

    private static function executeCurl($url, $data, $headers, $method)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        return curl_exec($ch);
    }

    public static function init($account, $apiKey)
    {
        self::$apiKey = $apiKey;
        self::$account = $account;
    }

    private static function ensureInitialized()
    {
        if (!self::$apiKey || !self::$account) {
            self::$account = defined('ACCOUNT_RELAY') ? ACCOUNT_RELAY : null;
            self::$apiKey = defined('API_KEY_RELAY') ? API_KEY_RELAY : null;

            if (!self::$apiKey || !self::$account) {
                throw new Exception("Relay API Key o Account no configurados.");
            }
        }
    }

    public static function sendEmail($toEmail, $subject, $html)
    {
        self::ensureInitialized();

        $data = [
            'from_name' => self::fromName,
            'from_email' => self::fromEmail,
            'reply_to' => ["email" => self::fromEmail],
            'recipients' => [['type' => 'to', 'email' => $toEmail]],
            'subject' => $subject,
            'html' => $html
        ];
        $dataJson = json_encode($data);
        $headers = [
            'Content-Type: application/json',
            'Authorization: token ' . self::$apiKey,
            'Content-Length: ' . strlen($dataJson),
        ];

        $endPointSendEmail = self::urlBase . self::$account . "/messages";
        $response = json_decode(self::executeCurl($endPointSendEmail, $dataJson, $headers, 'POST'));

        if (isset($response->errorCode)) {
            throw new Exception(json_encode($response->errors));
        }
    }

}
