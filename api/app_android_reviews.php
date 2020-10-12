<?php

$url = 'https://play.google.com/store/apps/details?id=' . urlencode($value) . '&hl=en';
$data = @file_get_contents($url);

$pattern = '/aria-label="([0-9\,]*) ratings">/s';
preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
    $result = str_replace(',', '', $result);
}
