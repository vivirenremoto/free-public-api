<?php

if (!$key) {
    throw new Exception('api key is required on https://pixabay.com/api/docs/');
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$url = 'https://pixabay.com/api/videos/?q=' . urlencode($value) . '&key=' . $key . '&lang=' . $lang;
$data = json_decode(@file_get_contents($url));

if (isset($data->hits[0])) {
    shuffle($data->hits);
    $result = $data->hits[0]->videos->large->url;
}
