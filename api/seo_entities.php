<?php

if (!$key) {
    die('error - api key is required https://dandelion.eu/docs/api/datatxt/nex/getting-started/');
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : '';

$url = 'https://api.dandelion.eu/datatxt/nex/v1?text=' . urlencode($value) . '&lang=' . $lang . '&token=' . $key;
$json = file_get_contents($url);
$output = json_decode($json);

if (isset($output->annotations[0])) {
    $entities = array();

    foreach ($output->annotations as $annotation) {
        $entities[] = $annotation->title;
    }

    $result = implode(';', $entities);
}
