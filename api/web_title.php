<?php

// https://stackoverflow.com/questions/399332/fastest-way-to-retrieve-a-title-in-php

$page = @file_get_contents($value);

if (preg_match('/<title>(.*?)<\/title>/', $page, $matches)) {
    $result = $matches[1];
}
