<?php

// https://phppot.com/php/search-videos-by-keyword-using-php-youtube-data-api/
// https://developers.google.com/youtube/v3/docs/search/list

if (!$key) {
    die('error - api key (youtube data) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$limit = 1;
$order = 'relevance';
$type = 'video';
$part = 'snippet';
$url = 'https://www.googleapis.com/youtube/v3/search?order=' . $order . '&part=' . $part . '&type=' . $type . '&q=' . urlencode($value) . '&maxResults=' . $limit . '&key=' . $key;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$json = curl_exec($ch);
curl_close($ch);

$output = json_decode($json);

if (isset($output->items[0]->id->videoId)) {
    $result = 'https://www.youtube.com/watch?v=' . $output->items[0]->id->videoId;
}
