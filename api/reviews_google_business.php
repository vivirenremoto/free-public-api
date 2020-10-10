<?php

// get place id - https://developers.google.com/places/web-service/place-id
// docs https://developers.google.com/places/web-service/details

if (!$key) {
    die('error - api key (geocoding) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$url = 'https://maps.googleapis.com/maps/api/place/details/json?place_id=' . $value . '&key=' . $key;

$output = @file_get_contents($url);
$json = json_decode($output);

if (isset($json->result->user_ratings_total)) {
    $result = $json->result->user_ratings_total;
}
