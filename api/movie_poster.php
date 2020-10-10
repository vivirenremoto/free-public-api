<?php

$value = strtolower($value);

$url = 'https://sg.media-imdb.com/suggests/' . $value[0] . '/' . urlencode($value) . '.json';
$json = @file_get_contents($url);
$json = str_replace('imdb$' . str_replace(' ', '_', $value) . '(', '', $json);
$json = str_replace('}]})', '}]}', $json);
$json = json_decode($json);

if (isset($json->d[0]->i[0])) {
    $result = $json->d[0]->i[0];
}
