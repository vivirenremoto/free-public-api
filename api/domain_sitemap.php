<?php

// https://stackoverflow.com/questions/35044272/get-final-redirect-with-curl-php/35046466

if (!strstr($value, 'http')) {
    $value = 'https://' . $value;
}

if (substr($value, -1) != '/') {
    $value .= '/';
}

$url = $value . 'sitemap.xml';

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code == 200) {
    $result = curl_getinfo($handle, CURLINFO_EFFECTIVE_URL);
}

curl_close($handle);
