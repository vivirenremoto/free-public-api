<?php

$country = isset($_GET['country']) ? $_GET['country'] : 'es';

$url = 'https://db2.keywordsur.fr/keyword_surfer_keywords?country=' . $country . '&keywords=%5B%22' . urlencode($value) . '%22%5D';
$data = file_get_contents($url);
$output = json_decode($data);

if (isset($output->{$value}->search_volume)) {
    $result = $output->{$value}->search_volume;
} else {
    $result = 0;
}
