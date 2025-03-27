<?php
class EmailTemplateManager
{
    private const TEMPLATE_DIR = __DIR__ . '/relay-templates/';

    public static function getTemplate($templateType, $templateName, $encodeEmail, $userData = [])
    {
        $isLocalhost = ($_SERVER['HTTP_HOST'] === 'localhost' || substr($_SERVER['HTTP_HOST'], 0, 9) === '127.0.0.1');
        $domain = $_SERVER['HTTP_HOST'];
        $protocol = $isLocalhost ? 'http://' : 'https://';
        $url = $protocol . $domain;

        $templatePath = self::TEMPLATE_DIR . $templateType . '/' . $templateName;

        if (!file_exists($templatePath)) {
            die('Error: The template file could not be found.');
        }

        $html = file_get_contents($templatePath);
        $html = str_replace(['http://goemms.com', 'https://goemms.com'], $url, $html);

        foreach (array_merge(['$encodeEmail' => $encodeEmail], $userData) as $key => $value) {
            $html = str_replace('{' . $key . '}', $value, $html);
        }

        return $html;
    }

    public static function getTemplateForUser($user)
    {
        $type = $user['type'];
        $phase = processPhaseToShow($type)["phaseToShow"];

        $templateMappings = [
            ECOMMERCE => [
                'pre' => 'getEcommerceEmailTemplate',
                'during' => 'getEcommerceEmailTemplateDuring',
                'post' => 'getEcommerceEmailTemplatePost',
            ],
            DIGITALTRENDS => [
                'pre' => 'getDigitalTEmailTemplatePRE',
                'during' => 'getDigitalTEmailTemplateDuring',
                'post' => 'getDigitalTEmailTemplatePost',
            ],
            'ecommerceVip' => 'getEcommerceVipEmailTemplatePost',
            'ecommerceVipDuring' => 'getEcommerceVipEmailTemplateDuring',
            'ecommerceVipPost' => 'getEcommerceVipEmailTemplatePost',
            'digitalTrendsVipPre' => 'getDTVipEmailTemplatePre',
            'digitalTrendsVipDuring' => 'getDigitalTrendsVipEmailTemplateDuring',
            'digitalTrendsVipPost' => 'getDigitalTrendsVipEmailTemplatePost',
        ];

        if (isset($user['tiketType']) && isset($templateMappings[$user['tiketType']])) {
            $templateFunction = $templateMappings[$user['tiketType']];
            return self::$templateFunction($user['encode_email'], $user);
        } elseif (isset($templateMappings[$type][$phase])) {
            $templateFunction = $templateMappings[$type][$phase];
            return self::$templateFunction($user['encode_email']);
        } else {
            die('Error: Template not found.');
        }
    }

    public static function getEcommerceEmailTemplate($encodeEmail)
    {
        // $templateName = 'ecommerce-pre-template.html';
        $templateName = 'ecommerce-early-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getEcommerceEmailTemplateDuring($encodeEmail)
    {
        $templateName = 'ecommerce-during-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getEcommerceEmailTemplatePost($encodeEmail)
    {
        $templateName = 'ecommerce-post-template.html';
        return self::getTemplate('ecommerce', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePREEarlyBirds($encodeEmail)
    {
        $templateName = 'dt-earybirds-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePRE($encodeEmail)
    {
        $templateName = 'dt-pre-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplateDuring($encodeEmail)
    {
        $templateName = 'dt-during-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplatePost($encodeEmail)
    {
        $templateName = 'dt-post-template.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getDigitalTEmailTemplate($encodeEmail)
    {
        $templateName = 'dt-oldtemplate.html';
        return self::getTemplate('dt', $templateName, $encodeEmail);
    }

    public static function getEcommerceVipTemplate($encodeEmail, $user)
    {
        $templateName = 'ecommerce-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['tiketType'],
            'paymentMethod' =>  $user['payment_status'],
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('ecommerce', $templateName, $encodeEmail, $userData);
    }

    public static function getEcommerceVipEmailTemplateDuring($encodeEmail, $user)
    {
        $templateName = 'ecommerce-during-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['tiketType'],
            'paymentMethod' =>  $user['payment_status'],
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('ecommerce', $templateName, $encodeEmail, $userData);
    }

    public static function getEcommerceVipEmailTemplatePost($encodeEmail, $user)
    {
        $templateName = 'ecommerce-during-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['tiketType'],
            'paymentMethod' =>  $user['payment_status'],
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('ecommerce', $templateName, $encodeEmail, $userData);
    }

    public static function getDTVipEmailTemplatePre($encodeEmail, $user)
    {
        $templateName = 'dt-pre-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'name' => $user['firstname'],
            'type' => $user['tiketType'],
            'paymentMethod' => 'Tarjeta de Crédito',
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('dt', $templateName, $encodeEmail, $userData);
    }

    public static function getDigitalTrendsVipEmailTemplateDuring($encodeEmail, $user)
    {
        $templateName = 'dt-during-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['tiketType'],
            'paymentMethod' =>  $user['payment_status'],
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('dt', $templateName, $encodeEmail, $userData);
    }

    public static function getDigitalTrendsVipEmailTemplatePost($encodeEmail, $user)
    {
        $templateName = 'dt-post-vip-template.html';
        $userData = [
            '$encodeEmail' => $encodeEmail,
            'type' => $user['tiketType'],
            'paymentMethod' =>  $user['payment_status'],
            'date' => $user['register'],
            'amount' => $user['final_price'],
        ];
        return self::getTemplate('dt', $templateName, $encodeEmail, $userData);
    }


    public static function getTemplateForSponsor($sponsor)
    {
        $dataKeys = [
            'register' => 'Fecha de Registro',
            'firstname' => 'Nombre',
            'email' => 'Correo Electrónico',
            'company' => 'Empresa',
            'phone' => 'Teléfono',
            'ip' => 'Dirección IP',
            'country_ip' => 'País de la IP',
            'source_utm' => 'UTM Source',
            'medium_utm' => 'UTM Medium',
            'campaign_utm' => 'UTM Campaign',
            'content_utm' => 'UTM Content',
            'term_utm' => 'UTM Term',
            'origin' => 'Origen',
        ];

        $html = "<h3>Información del Sponsor</h3><ul>";

        foreach ($dataKeys as $key => $label) {
            if (isset($sponsor[$key])) {
                $html .= "<li><strong>$label:</strong> " . htmlspecialchars($sponsor[$key]) . "</li>";
            }
        }

        $html .= "</ul>";

        return $html;
    }

    public static function getTemplateForPartner($partner)
    {
        $dataKeys = [
            'register' => 'Fecha de Registro',
            'firstname' => 'Nombre',
            'email' => 'Correo Electrónico',
            'company' => 'Empresa',
            'phone' => 'Teléfono',
            'ip' => 'Dirección IP',
            'country_ip' => 'País de la IP',
            'source_utm' => 'UTM Source',
            'medium_utm' => 'UTM Medium',
            'campaign_utm' => 'UTM Campaign',
            'content_utm' => 'UTM Content',
            'term_utm' => 'UTM Term',
            'origin' => 'Origen',
        ];

        $html = "<h3>Información del Partner</h3><ul>";

        foreach ($dataKeys as $key => $label) {
            if (isset($partner[$key])) {
                $html .= "<li><strong>$label:</strong> " . htmlspecialchars($partner[$key]) . "</li>";
            }
        }

        $html .= "</ul>";

        return $html;
    }
}
