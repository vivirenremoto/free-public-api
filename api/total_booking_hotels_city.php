<?php

$url = 'https://www.booking.com/searchresults.es.html?city=' . $value;
$html = @file_get_contents($url);

if (strstr($html, 'b_available_hotels:')) {

    $pattern = '/b_available_hotels: ([0-9]*),/';

    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        $result = $matches[1];
    }

}
