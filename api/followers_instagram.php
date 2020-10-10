<?php

$url = 'https://www.instagram.com/' . $value . '/?__a=1';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
echo $json = curl_exec($ch);
curl_close($ch);

$output = json_decode($json);

if (isset($output->graphql->user->edge_followed_by->count)) {
    $result = $output->graphql->user->edge_followed_by->count;
}
