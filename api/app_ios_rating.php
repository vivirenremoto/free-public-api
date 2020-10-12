<?php

$url = 'https://apps.apple.com/us/app/' . $value;
$data = @file_get_contents($url);

$pattern = '/star-rating__count">([0-9\.]*) • ([A-Z0-9\.]*) Ratings/s';
preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
