<?php

// https://gist.github.com/nonsintetic/9adb5c4a07b43e098473bdc76ff259a6

if (!$key) {
    throw new Exception('api key (youtube data) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$api_response = @file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $value . '&fields=items/statistics/subscriberCount&key=' . $key);
$api_response_decoded = json_decode($api_response, true);

if (isset($api_response_decoded['items'][0]['statistics']['subscriberCount'])) {
    $result = $api_response_decoded['items'][0]['statistics']['subscriberCount'];
}
