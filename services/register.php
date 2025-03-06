<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/GeoIp.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SecurityHelper.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Doppler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Validator.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DB.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SpreadSheetGoogle.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/Relay.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/SubscriptionErrors.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/services/functions.php');

date_default_timezone_set('America/Argentina/Buenos_Aires');




function isSubmitValid($ip)
{
    try {
        SecurityHelper::init($ip, SECURITYHELPER_ENABLE);
        SecurityHelper::isSubmitValid(ALLOW_IPS);
    } catch (Exception $e) {
        processError("isSubmitValid", $e->getMessage(), ['ip' => $ip]);
        exit('submits');
    }
}

function getFieldValue($field, $default = null)
{
    $_POST = json_decode(file_get_contents('php://input'), true);
    return isset($_POST[$field]) ? $_POST[$field] : $default;
}


function processEvents($events)
{
    $ecommerce = 0;
    $digital_trends = 0;

    if (is_array($events)) {
        if (in_array(ECOMMERCE, $events)) {
            $ecommerce = 1;
        }
        if (in_array(DIGITALTRENDS, $events)) {
            $digital_trends = 1;
        }
    }

    return ['ecommerce' => $ecommerce, 'digital_trends' => $digital_trends];
}


function setSponsorDataRequest($ip, $countryGeo)
{
    $firstname = getFieldValue('name');
    $email = getFieldValue('email');
    $phone     = getFieldValue('phone');
    $privacy = getFieldValue('acceptPolicies', false);
    $promotions = getFieldValue('acceptPromotions', false);
    $source_utm = getFieldValue('utm_source');
    $medium_utm = getFieldValue('utm_medium');
    $campaign_utm = getFieldValue('utm_campaign');
    $content_utm = getFieldValue('utm_content');
    $term_utm = getFieldValue('utm_term');
    $origin = getFieldValue('origin');
    $dataType = getFieldValue('dataType');
    $list = ($dataType === 'sponsor') ? LIST_SPONSORS : LIST_MEDIA_PARTNERS;
    $user = array(
        'register' => date("Y-m-d h:i:s A"),
        'firstname' => $firstname,
        'email' => $email,
        'phone' =>  $phone,
        'privacy' => $privacy,
        'promotions' => $promotions,
        'ip' => $ip,
        'country_ip' => $countryGeo,
        'source_utm' => $source_utm,
        'medium_utm' => $medium_utm,
        'campaign_utm' => $campaign_utm,
        'content_utm' => $content_utm,
        'term_utm' => $term_utm,
        'origin' => $origin,
        'dataType' => $dataType,
        'list' => $list,
    );
    try {
        Validator::validateEmail($email);
        Validator::validateBool('privacy', $privacy);
        Validator::validateBool('promotions', $promotions);
        return $user;
    } catch (Exception $e) {
        processError("setDataRequest (Captura datos)", $e->getMessage(), ['user' => $user]);
        die();
    }
}

function setDataRequest($ip, $countryGeo)
{
    $requestWithoutForm = false;
    $eventsData = processEvents(json_decode(getFieldValue('events')));
    $ecommerce = $eventsData['ecommerce'];
    $digital_trends = $eventsData['digital_trends'];
    $firstname = getFieldValue('name');
    if ($firstname === null) {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $firstname = $db->getUserNameByEmail(getFieldValue('email'))[0]['firstname'];
        $db->close();
        $requestWithoutForm = true;
    }
    $email = getFieldValue('email');
    error_log($email. " \n");
    $encode_email = getFieldValue('encodeEmail');
    $phone     = getFieldValue('phone');
    $privacy = getFieldValue('acceptPolicies', false);
    if ($requestWithoutForm) {
        $privacy = true;
    }
    $promotions = getFieldValue('acceptPromotions', false);
    $source_utm = getFieldValue('utm_source');
    $medium_utm = getFieldValue('utm_medium');
    $campaign_utm = getFieldValue('utm_campaign');
    $content_utm = getFieldValue('utm_content');
    $term_utm = getFieldValue('utm_term');
    $origin = getFieldValue('origin');
    $type = getFieldValue('type');
    $phase = getCurrentPhase($type);

    $list = ($type === ECOMMERCE) ? LIST_LANDING_ECOMMERCE : LIST_LANDING_DIGITALT;
    $subject = getSubjectEmail($type, $phase);
    $user = array(
        'register' => date("Y-m-d h:i:s A"),
        'firstname' => $firstname,
        'email' => $email,
        'phone' =>  $phone,
        'ecommerce' => $ecommerce,
        'digital_trends' => $digital_trends,
        'encode_email' => $encode_email,
        'privacy' => $privacy,
        'promotions' => $promotions,
        'ip' => $ip,
        'country_ip' => $countryGeo,
        'source_utm' => $source_utm,
        'medium_utm' => $medium_utm,
        'campaign_utm' => $campaign_utm,
        'content_utm' => $content_utm,
        'term_utm' => $term_utm,
        'origin' => $origin,
        'type' => $type,
        'form_id' => $phase,
        'list' => $list,
        'subject' => $subject
    );

    try {
        Validator::validateEmail($email);
        Validator::validateBool('privacy', $privacy);
        Validator::validateBool('promotions', $promotions);
        return $user;
    } catch (Exception $e) {
        processError("setDataRequest (Captura datos)", $e->getMessage(), ['user' => $user]);
        die();
    }
}

function getSubjectEmail($type, $phase)
{
    $subject = "";
    if ($type === ECOMMERCE) {
        if ($phase === 'pre') {
            $subject = SUBJECT_PRE_ECOMMERCE;
        } elseif ($phase === 'during') {
            $subject = SUBJECT_DURING_ECOMMERCE;
        } else {
            $subject = SUBJECT_POST_ECOMMERCE;
        }
    } else {
        if ($phase === 'pre') {
            $subject = SUBJECT_PRE_DIGITALT;
        } elseif ($phase === 'during') {
            $subject = SUBJECT_DURING_DIGITALT;
        } else {
            $subject = SUBJECT_POST_DIGITALT;
        }
    }


    return $subject;
}

function getCurrentPhase($type)
{
    try {
        $mem_var = new Memcached();
        $mem_var->addServer(MEMCACHED_SERVER, 11211);
        $settings_phase = $mem_var->get("settings_phase_" . $type);
        if (!$settings_phase) {
            $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $settings_phase = $db->getCurrentPhase($type)[0];
            $db->close();
            $mem_var->set("settings_phase_" . $type, $settings_phase, CACHE_TIME);
        }
        $phaseToShow = array_search(1, $settings_phase);
        return $phaseToShow;
    } catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        exit();
    }
}
function sendDobleOptin($user)
{
    try {
        Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
        Doppler::dobleOptin($user);
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        processError("saveSubscriptionDoppler (Almacena en Lista)", $errorMessage, ['user' => $user]);
    }
}

function saveSubscriptionDoppler($user)
{

    try {
        Doppler::init(ACCOUNT_DOPPLER, API_KEY_DOPPLER);
        Doppler::subscriber($user);
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        if (stripos($errorMessage, "Unsubscribed") !== false) {
            sendDobleOptin($user);
        } else {
            $subscriptionErrors = new SubscriptionErrors();
            $subscriptionErrors->saveSubscriptionErrors($user['email'], $user['list'], $errorMessage);
            processError("saveSubscriptionDoppler (Almacena en Lista)", $errorMessage, ['user' => $user]);
        }
    }
}
function saveSubscriptionDopplerTable($user)
{

    try {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $db->insertSubscriptionDoppler($user);
        $db->saveRegistered($user);
        $db->close();
    } catch (Exception $e) {
        processError("saveSubscriptionDopplerTable (Guarda en la BD subscriptions_doppler and registered)", $e->getMessage(), ['user' => $user]);
    }
}

function saveSubscriptionSpreadSheet($user)
{
    try {
        $db = new DB(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        SpreadSheetGoogle::write(ID_SPREADSHEET, $user, $db);
        $db->close();
    } catch (Exception $e) {
        processError("saveSubscriptionSpreadSheet (Guarda en SpreadSheet)", $e->getMessage(), ['user' => $user]);
    }
}

function sendEmail($user, $subject)
{
    try {
        Relay::init(ACCOUNT_RELAY, API_KEY_RELAY);
        Relay::sendEmailRegister($user, $subject);
    } catch (Exception $e) {
        processError("sendEmail (Envia mail por Relay)", $e->getMessage(), ['user' => $user, 'subject' => $subject]);
    }
}

function getIp()
{
    try {
        $ip = GeoIp::getIp();
        return $ip;
    } catch (Exception $e) {
        processError("getIp (Obtiene la IP)", $e->getMessage(), []);
    }
}

function getCountryName()
{
    try {
        $countryGeo = GeoIp::getCountryName();
        return $countryGeo;
    } catch (Exception $e) {
        processError("getCountryName (Obtiene el nombre del pais por geoIp de Cloudflare)", $e->getMessage(), []);
    }
}


error_log("Inicio de ejecución de register.php");

$ip = getIp();
$countryGeo = getCountryName();
isSubmitValid($ip);
$user = setDataRequest($ip, $countryGeo);
error_log("Datos del usuario: " . json_encode($user));
saveSubscriptionDoppler($user);
saveSubscriptionDopplerTable($user);
saveSubscriptionSpreadSheet($user);
sendEmail($user, $user['subject']);
$response = ['status' => 'success', 'message' => 'User registered successfully.'];
echo json_encode($response);
