<?php

$stop_words = isset($_GET['stop_words']) ? $_GET['stop_words'] : false;
$delimeter = isset($_GET['delimeter']) ? $_GET['delimeter'] : '-';
$domain = isset($_GET['domain']) ? $_GET['domain'] : '';

if ($domain) {
    if (substr($domain, -1) != '/') {
        $domain .= '/';
    }
}

function url_title($str, $delimiter = '-', $stop_words = true)
{
    if (!$stop_words) {
        $replace = array(' con ', ' de ', ' para ', ' y ', ' en ', ' of ', ' with ', ' for ', ' and ', ' in ');
        $str = str_replace($replace, ' ', $str);
    }

    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = trim($clean, '-');
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    $clean = str_replace('--', '-', $clean);
    $clean = strtolower($clean);

    return $clean;
}

$result = $domain . url_title($value, $delimeter, $stop_words);
