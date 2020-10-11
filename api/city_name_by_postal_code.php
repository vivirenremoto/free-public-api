<?php

// http://www.geonames.org/export/web-services.html

if (!$key) {
    throw new Exception('api key is required on https://www.geonames.org/login');
}

$country = isset($_GET['country']) ? $_GET['country'] : 'ES';

$url = 'http://api.geonames.org/postalCodeSearchJSON?postalcode=' . $value . '&country=' . $country . '&maxRows=1&username=' . $key;

$output = @file_get_contents($url);
$json = json_decode($output);

if (isset($json->postalCodes[0]->placeName)) {
    $result = $json->postalCodes[0]->placeName;
}
