<?php

$data = @file_get_contents('https://www.booking.com' . $value);

$pattern = '/"ratingValue" : ([0-9\.]*),/';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
