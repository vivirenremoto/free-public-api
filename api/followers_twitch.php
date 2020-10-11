<?php

// https://dev.twitch.tv/docs/v5/reference/channels#get-channel-by-id

if (!$key) {
    throw new Exception('client id is required on https://dev.twitch.tv/');
}

$url = 'https://api.twitch.tv/kraken/channels/' . $value;

$ch = curl_init();
$headers = array(
    'Accept: application/vnd.twitchtv.v5+json',
    'Client-ID: ' . $key,
);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$body = json_decode($response);

if (isset($body->followers)) {
    $result = $body->followers;
}
