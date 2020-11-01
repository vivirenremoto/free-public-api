<?php

$data = @file_get_contents('https://www.filmaffinity.com/es/search.php?stext=' . urlencode($value));

$pattern = '/<div class="avgrat-box">([0-9,]*)<\/div>/';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = str_replace(',', '.', $matches[1]);
} else {

    $pattern = '/<div id="movie-rat-avg" itemprop="ratingValue" content="([0-9\.]*)">/';
    preg_match($pattern, $data, $matches);

    if (isset($matches[1])) {
        $result = $matches[1];
    }
}
