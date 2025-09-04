<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SpreadSheetGoogle.php');

function saveSubscriptionSpreadSheet($user, $idSpread = ID_SPREADSHEET)
{
    try {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        SpreadSheetGoogle::write($idSpread, $user, $db);
        $db->close();
    } catch (Exception $e) {
        $errorMessage = json_encode(["saveSubscriptionSpreadSheet (Guarda en SpreadSheet)", $e->getMessage(), ['user' => $user]]);
        http_response_code(500); // Error interno del servidor
        throw new Exception($errorMessage);
    }
}
