<?php

$url = 'https://api.github.com/users/' . $value;

$ch = curl_init();
$headers = array(
    'Accept: application/json',
    'User-Agent: Awesome-Octocat-App',
);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response);

if (isset($json->followers)) {
    $result = $json->followers;
}
