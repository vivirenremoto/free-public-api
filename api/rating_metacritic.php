<?php

$type = isset($_GET['type']) ? $_GET['type'] : 'all';

$url = 'https://www.metacritic.com/search/all/' . urlencode($value) . '/results';
$html = @file_get_contents($url);

if (strstr($html, 'metascore_w')) {

    $pattern = '/<div class="metascore_w ([A-Za-z ]*)">([0-9]*)<\/div>/';

    preg_match($pattern, $html, $matches);

    if (isset($matches[2])) {
        $result = (int) $matches[2];
    }

}
