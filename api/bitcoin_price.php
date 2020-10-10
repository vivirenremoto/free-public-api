<?php

$currency = isset($_GET['currency']) ? $_GET['currency'] : 'EUR';

$url = 'https://api.coindesk.com/v1/bpi/currentprice.json';
$json = @file_get_contents($url);
$output = json_decode($json);

if (isset($output->bpi->{$currency})) {
    $result = $output->bpi->{$currency}->rate_float;
}
