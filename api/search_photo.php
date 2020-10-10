<?php

if (!$key) {
    die('error - api key is required on https://pixabay.com/api/docs/');
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$url = 'https://pixabay.com/api/?q=' . urlencode($value) . '&key=' . $key . '&image_type=photo&lang=' . $lang;
$data = json_decode(@file_get_contents($url));

if (isset($data->hits[0])) {
    shuffle($data->hits);
    $result = $data->hits[0]->largeImageURL;
}
