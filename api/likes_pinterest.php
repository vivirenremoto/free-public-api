<?php

$url = 'https://api.pinterest.com/v1/urls/count.json?&url=' . urlencode($value);
$data = @file_get_contents($url);

$pattern = '/"count":([0-9]*)}/';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
