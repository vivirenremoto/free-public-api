<?php

$url = 'https://apps.apple.com/us/app/' . $value;
$data = @file_get_contents($url);

$pattern = '/star-rating__count">([0-9\.]*) • ([A-Z0-9\.]*) Ratings/s';
preg_match($pattern, $data, $matches);

if (isset($matches[2])) {
    $result = $matches[2];
    if (strstr($result, 'M')) {
        $result = str_replace('M', '', $result);
        $result *= 1000000;
    } else if (strstr($result, 'K')) {
        $result = str_replace('K', '', $result);
        $result *= 1000;
    }
}
