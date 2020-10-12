<?php

$url = 'http://cloud.feedly.com/v3/feeds/feed%2F' . urlencode($value);
$output = @file_get_contents($url);
$json = json_decode($output);

if (isset($json->subscribers)) {
    $result = $json->subscribers;
}
