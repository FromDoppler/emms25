<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/EmailTemplateManager.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Relay.php');

class EmailService
{
    public static function sendEmailRegister($user, $subject)
    {
        $html = EmailTemplateManager::getTemplateForUser($user);
        Relay::sendEmail($user['email'], $subject, $html);
    }

    public static function sendEmailSponsor($sponsor)
    {
        $html = EmailTemplateManager::getTemplateForSponsor($sponsor);
        $currentYear = date("Y");
        $subject = 'NUEVA SOLICITUD DE SPONSOR PARA EMMS -' . $currentYear;
        Relay::sendEmail(EMAIL_SPONSORS, $subject, $html);
    }

    public static function sendEmailPartner($partner)
    {
        $html = EmailTemplateManager::getTemplateForPartner($partner);
        $currentYear = date("Y");
        $subject = 'NUEVA SOLICITUD DE PARTNER PARA EMMS -' . $currentYear;
        Relay::sendEmail(EMAIL_PARTNERS, $subject, $html);
    }
}
