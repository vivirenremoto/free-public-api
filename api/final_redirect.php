<?php

// https://stackoverflow.com/questions/35044272/get-final-redirect-with-curl-php/35046466

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $value);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
