<?php

$output = @file_get_contents('https://www.rottentomatoes.com/napi/search/all?type=movie&searchQuery=' . urlencode($value));
$json = json_decode($output);

if (isset($json->movies->items[0])) {
    $result = $json->movies->items[0]->tomatometerScore->score;
}
