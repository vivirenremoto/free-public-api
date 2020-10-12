<?php

if (!$key) {
    throw new Exception('api key is required on https://www.scraperapi.com/');
}

$url = 'http://api.scraperapi.com/?api_key=' . $key . '&url=' . urlencode('https://www.instagram.com/p/' . $value . '/?hl=en');
$data = @file_get_contents($url);

$pattern = '/edge_media_preview_like":{"count":([0-9]*),/s';
preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
