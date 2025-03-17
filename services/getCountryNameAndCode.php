<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/services/restrictOriginAccess.php');
require_once('../utils/GeoIp.php');

$countryGeoNameAndCode = GeoIp::getGeoLocalitationCountryNameAndCode();

echo json_encode($countryGeoNameAndCode);
