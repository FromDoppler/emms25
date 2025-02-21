<?php
//session_start();
$ALLOW_IPS = array('::1', '200.5.229.58', '200.5.253.210', '127.0.0.1', '172.18.0.1');
$ACCOUNT_DOPPLER = getenv("ACCOUNT_DOPPLER");
$API_KEY_DOPPLER = getenv("API_KEY_DOPPLER");
$API_KEY_WIX = getenv("API_KEY_WIX");
$WIX_ACCOUNT_ID = getenv("WIX_ACCOUNT_ID");
$WIX_SITE_ID = getenv("WIX_SITE_ID");
$WIX_PLAN_INDIVIDUAL_ID = getenv("WIX_PLAN_INDIVIDUAL_ID");
$WIX_PLAN_INVITADO_ID = getenv("WIX_PLAN_INVITADO_ID");
$WIX_PLAN_PACK_EMPRESA_BASIC_ID = getenv("WIX_PLAN_PACK_EMPRESA_BASIC_ID");
$WIX_PLAN_PACK_EMPRESA_FULL_ID = getenv("WIX_PLAN_PACK_EMPRESA_FULL_ID");
$WIX_CLIENT_ID = getenv("WIX_CLIENT_ID");
$ACCOUNT_RELAY = getenv("ACCOUNT_RELAY");
$API_KEY_RELAY = getenv("API_KEY_RELAY");
$GOOGLE_CLIENT_ID = getenv("GOOGLE_CLIENT_ID");
$GOOGLE_CLIENT_SECRET = getenv("GOOGLE_CLIENT_SECRET");
$ID_SPREADSHEET =  getenv("ID_SPREADSHEET");
$ID_SPREADSHEET_VIP =  getenv("ID_SPREADSHEET_VIP");
$ID_SPREADSHEET_DT_VIP =  getenv("ID_SPREADSHEET_DT_VIP");
$DB_NAME = getenv("MYSQL_DATABASE");
$DB_USER = getenv("MYSQL_USER");
$DB_PASSWORD = getenv("MYSQL_PASSWORD");
$DB_HOST = getenv("MYSQL_HOST");
//$SECRET_REFRESH = getenv("SECRET_REFRESH");

$STRIPE_PUBLIC_KEY = getenv("STRIPE_PUBLIC_KEY");
$STRIPE_URL_SERVER = getenv("STRIPE_URL_SERVER");

if (!defined('STRIPE_PUBLIC_KEY')) define('STRIPE_PUBLIC_KEY', $STRIPE_PUBLIC_KEY);
if (!defined('STRIPE_URL_SERVER')) define('STRIPE_URL_SERVER', $STRIPE_URL_SERVER);

#ADMIN
$ADMIN_RESTRICTED_SERVERS = json_decode(getenv("ADMIN_RESTRICTED_SERVERS"));
$ADMIN_ALLOW_IPS = json_decode(getenv("ADMIN_ALLOW_IPS"));

if (!defined('VERSION')) define('VERSION', '1.0.0');
if (!defined('PRODUCTION')) define('PRODUCTION', false);
if (!defined('SECURITYHELPER_ENABLE')) define('SECURITYHELPER_ENABLE', false);
if (!defined('SITE_URL')) define('SITE_URL', 'http://localhost/');
if (!defined('ENABLE_DIGITALTRENDS_SPONSORS')) define('ENABLE_DIGITALTRENDS_SPONSORS', true);

if (!defined('CACHE_TIME')) define('CACHE_TIME', 60); // En segundos(60) (1 minuto)
if (!defined('CACHE_TIME_ID')) define('CACHE_TIME_ID', 1800); // En segundos(1800) (30 minutos)
if (!defined('CACHE_BACKUP_TIME')) define('CACHE_BACKUP_TIME', 3600); // En segundos (1 Hora)

#EVENTS NAMES

$ecommerce = 'ecommerce25';
$digitalTrends = 'digital-trends25';

if (!defined('ECOMMERCE')) define('ECOMMERCE', $ecommerce);
if (!defined('DIGITALTRENDS')) define('DIGITALTRENDS', $digitalTrends);

#IPS WHITE LIST

if (!defined('ALLOW_IPS')) define('ALLOW_IPS', $ALLOW_IPS);

#API DOPPLER

if (!defined('ACCOUNT_DOPPLER')) define('ACCOUNT_DOPPLER', $ACCOUNT_DOPPLER);
if (!defined('API_KEY_DOPPLER')) define('API_KEY_DOPPLER', $API_KEY_DOPPLER);
if (!defined('LIST_LANDING_ECOMMERCE')) define('LIST_LANDING_ECOMMERCE', 29037684);//QA
if (!defined('LIST_LANDING_ECOMMERCE_VIP')) define('LIST_LANDING_ECOMMERCE_VIP', 28868432);
if (!defined('LIST_LANDING_DIGITALT')) define('LIST_LANDING_DIGITALT', 28937711);
if (!defined('LIST_LANDING_DIGITALT_VIP')) define('LIST_LANDING_DIGITALT_VIP', 28979585);
if (!defined('LIST_LANDING_DIGITALT_WIX')) define('LIST_LANDING_DIGITALT_WIX', 28789885);

#SPONSORS LIST
if (!defined('LIST_SPONSORS')) define('LIST_SPONSORS', 28845743);
if (!defined('LIST_MEDIA_PARTNERS')) define('LIST_MEDIA_PARTNERS', 28876952);


#API WIX
if (!defined('API_KEY_WIX')) define('API_KEY_WIX', $API_KEY_WIX);
if (!defined('WIX_PLAN_INDIVIDUAL_ID')) define('WIX_PLAN_INDIVIDUAL_ID', $WIX_PLAN_INDIVIDUAL_ID);
if (!defined('WIX_PLAN_INVITADO_ID')) define('WIX_PLAN_INVITADO_ID', $WIX_PLAN_INVITADO_ID);
if (!defined('WIX_PLAN_PACK_EMPRESA_BASIC_ID')) define('WIX_PLAN_PACK_EMPRESA_BASIC_ID', $WIX_PLAN_PACK_EMPRESA_BASIC_ID);
if (!defined('WIX_PLAN_PACK_EMPRESA_FULL_ID')) define('WIX_PLAN_PACK_EMPRESA_FULL_ID', $WIX_PLAN_PACK_EMPRESA_FULL_ID);
if (!defined('WIX_CLIENT_ID')) define('WIX_CLIENT_ID', $WIX_CLIENT_ID);
if (!defined('WIX_ACCOUNT_ID')) define('WIX_ACCOUNT_ID', $WIX_ACCOUNT_ID);
if (!defined('WIX_SITE_ID')) define('WIX_SITE_ID', $WIX_SITE_ID);

#API RELAY

if (!defined('ACCOUNT_RELAY')) define('ACCOUNT_RELAY', $ACCOUNT_RELAY);
if (!defined('API_KEY_RELAY')) define('API_KEY_RELAY', $API_KEY_RELAY);

#EMAIL SUBJECT
## ECOMMERCE
if (!defined('SUBJECT_PRE_ECOMMERCE')) define('SUBJECT_PRE_ECOMMERCE', '¡Ya eres parte del #EMMS2024!');
if (!defined('SUBJECT_DURING_ECOMMERCE')) define('SUBJECT_DURING_ECOMMERCE', 'Te damos la bienvenida al #EMMS2024!');
if (!defined('SUBJECT_POST_ECOMMERCE')) define('SUBJECT_POST_ECOMMERCE', 'Ya puedes ver lo que fue el #EMMS2024');
## DT
if (!defined('SUBJECT_PRE_DIGITALT')) define('SUBJECT_PRE_DIGITALT', '¡Ya eres parte del #EMMSDT!');
if (!defined('SUBJECT_DURING_DIGITALT')) define('SUBJECT_DURING_DIGITALT', 'Te damos la bienvenida al #EMMSDT 2024!');
if (!defined('SUBJECT_POST_DIGITALT')) define('SUBJECT_POST_DIGITALT', 'Ya puedes ver lo que fue el EMMSDT 2024');

#GOOGLE SPREADSHEET
//https://docs.google.com/spreadsheets/d/1irsIKBdRzGlmeGpUlJjFcSJFaYZLN9ujvY-cTYpyeM8/edit#gid=0

if (!defined('GOOGLE_CLIENT_ID')) define('GOOGLE_CLIENT_ID', $GOOGLE_CLIENT_ID);
if (!defined('GOOGLE_CLIENT_SECRET')) define('GOOGLE_CLIENT_SECRET', $GOOGLE_CLIENT_SECRET);
if (!defined('ID_SPREADSHEET')) define('ID_SPREADSHEET', $ID_SPREADSHEET);
if (!defined('ID_SPREADSHEET_VIP')) define('ID_SPREADSHEET_VIP', $ID_SPREADSHEET_VIP);
if (!defined('ID_SPREADSHEET_DT_VIP')) define('ID_SPREADSHEET_DT_VIP', $ID_SPREADSHEET_DT_VIP);
if (!defined('GOOGLE_SPREAD_CALLBACK')) define('GOOGLE_SPREAD_CALLBACK', 'http://localhost/utils/spread/callback.php');

#DATABASE

if (!defined('DB_NAME')) define('DB_NAME', $DB_NAME);
if (!defined('DB_USER')) define('DB_USER', $DB_USER);
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', $DB_PASSWORD);
if (!defined('DB_HOST')) define('DB_HOST', $DB_HOST);

#ADMIN
if (!defined('ADMIN_RESTRICTED_SERVERS')) define('ADMIN_RESTRICTED_SERVERS', $ADMIN_RESTRICTED_SERVERS);
if (!defined('ADMIN_ALLOW_IPS')) define('ADMIN_ALLOW_IPS', $ADMIN_ALLOW_IPS);

#SERVER NODE SOCKET

if (!defined('URL_REFRESH')) define('URL_REFRESH', 'apisqa.fromdoppler.net');
if (!defined('PATH_REFRESH')) define('PATH_REFRESH', 'emms-socket');
//if (!defined('SECRET_REFRESH')) define('SECRET_REFRESH', $SECRET_REFRESH);

#MEMCACHED
if (!defined('MEMCACHED_SERVER')) define('MEMCACHED_SERVER', "memcached");

#During Days System
$dayDuring = 1;
if (!defined('DAY_DURING')) define('DAY_DURING', $dayDuring);
$duringDaysArray = array(
    "1" => array(
        "youtube" => "rhrLoHn3qmI",
        "twitch" => "fromdoppler"
    ),
    "2" => array(
        "youtube" => "3znU96iSNO4",
        "twitch" => "fromdoppler"
    ),
    "3" => array(
        "youtube" => "LjjXLpU_Kmg",
        "twitch" => "fromdoppler"
    )
);

//plan B
/*
$duringDaysArray = array(
    "1" => array(
        "youtube" => "Ng15Os_ojXg",
        "twitch" => "fromdoppler"
    ),
    "2" => array(
        "youtube" => "0rlts4I6pg4",
        "twitch" => "fromdoppler"
    ),
    "3" => array(
        "youtube" => "x-hGQmaZpq8",
        "twitch" => "fromdoppler"
    )
);
*/

