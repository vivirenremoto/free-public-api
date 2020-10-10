<?php

if (!$key) {
    die('error - api key is required https://www.alphavantage.co/support/');
}

$url = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=' . $value . '&apikey=' . $key;
$json = file_get_contents($url);
$output = json_decode($json);

if (isset($output->{'Global Quote'}->{'05. price'})) {
    $result = $output->{'Global Quote'}->{'05. price'};
}
