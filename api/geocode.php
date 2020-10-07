<?php

// https://stackoverflow.com/questions/3807963/how-to-get-longitude-and-latitude-of-any-address/36447589

// geocoding api - google api console

$url = 'https://maps.google.com/maps/api/geocode/json?address=' . urlencode($value) . '&sensor=false&key=' . $key;
$geocode = file_get_contents($url);

$output = json_decode($geocode);

if (isset($output->results[0])) {
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;

    $result = $latitude . ',' . $longitude;
}
