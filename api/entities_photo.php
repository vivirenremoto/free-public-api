<?php

$secret = isset($_GET['secret']) ? $_GET['secret'] : null;

if (!$key || !$secret) {
    throw new Exception('api key and secret are required on https://imagga.com/');
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.imagga.com/v2/tags?image_url=' . urlencode($value) . '&language=' . $lang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERPWD, $key . ':' . $secret);

$response = curl_exec($ch);
curl_close($ch);

$json_response = json_decode($response);

if (isset($json_response->result->tags[0])) {

    $result = '';
    foreach ($json_response->result->tags as $k => $tag) {
        if ($k) {
            $result .= ';';
        }

        $result .= $tag->tag->{$lang};
    }
}
