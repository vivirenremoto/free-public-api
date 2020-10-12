<?php

if (!$key) {
    throw new Exception('api key is required on https://www.scraperapi.com/');
}

$url = 'http://api.scraperapi.com/?api_key=' . $key . '&url=' . urlencode('https://www.instagram.com/' . $value . '/?hl=en');
$data = @file_get_contents($url);

$pattern = '/content="([a-z0-9\.]*) Followers,/s';
preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
    if (strstr($result, 'm')) {
        $result = str_replace('m', '', $result);
        $result *= 1000000;
    } else if (strstr($result, 'k')) {
        $result = str_replace('k', '', $result);
        $result *= 1000;
    }
}

// instagram blocks my ip this doesnt work anymore

/*
$url = 'https://www.instagram.com/' . $value . '/?__a=1';
$json = @file_get_contents($url);
$output = json_decode($json);

if (isset($output->graphql->user->edge_followed_by->count)) {
$result = $output->graphql->user->edge_followed_by->count;
}
 */
