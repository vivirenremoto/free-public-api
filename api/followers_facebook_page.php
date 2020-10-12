<?php

$url = 'https://www.facebook.com/' . $value . '/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
curl_close($ch);

$pattern = '/<span id="PagesLikesCountDOMID"><span class="_52id _50f5 _50f7">([0-9]*) /';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
