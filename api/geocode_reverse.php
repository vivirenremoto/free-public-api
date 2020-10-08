<?php

// https://stackoverflow.com/questions/16187219/reverse-geocoding-not-working-google-maps-api-v2/56558812

if (!$key) {
    die('error - api key (geocoding) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$url = 'https://maps.google.com/maps/api/geocode/json?latlng=' . urlencode($value) . '&key=' . $key;
$geocode = file_get_contents($url);

$output = json_decode($geocode);

if (isset($output->results[0])) {
    $result = $output->results[0]->formatted_address;
}
