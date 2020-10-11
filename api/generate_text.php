<?php

// https://stackoverflow.com/questions/58664912/problem-with-using-curl-in-php-for-deepai-api

if (!$key) {
    throw new Exception('api key is required on https://deepai.org/');
}

$url = "https://api.deepai.org/api/text-generator";
$ch = curl_init($url);
$data_string = array('text' => $value);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Api-Key: ' . $key));
$output = curl_exec($ch);
$json = json_decode($output);

if (isset($json->output)) {
    $result = $json->output;

} else if (isset($json->status)) {
    throw new Exception($json->status);
}
