<?php

$url = 'https://www.fatsecret.com/calories-nutrition/search?q=' . urlencode($value);
$html = file_get_contents($url);

if (strstr($html, 'Calories: ')) {

    $pattern = '/Calories: (.*)cal/';

    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        $result = $matches[1] . 'cal';
    }

}
