<?php

// https://openweathermap.org/api/one-call-api

if (!$key) {
    die('error - api key is required https://openweathermap.org/');
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';
$units = isset($_GET['units']) ? $_GET['units'] : 'metric';

if (strstr($value, ',') && strstr($value, '.')) {

    list($lat, $lon) = explode(',', $value);

    $url = 'https://api.openweathermap.org/data/2.5/onecall?lat=' . $lat . '&lon=' . $lon . '&exclude=alerts,hourly,minutely&appid=' . $key . '&units=' . $units . '&lang=' . $lang;
    $json = file_get_contents($url);
    $output = json_decode($json);

    if (isset($output->daily[0])) {
        $day = $output->daily[0];
        $result = $day->weather[0]->description . ', ' . $day->temp->max . '°'; // . '-' . $weather->temp->min
    }

}
