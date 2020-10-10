<?php

$url = 'https://www.instagram.com/' . $value . '/?__a=1';
echo $json = @file_get_contents($url);
$output = json_decode($json);

if (isset($output->graphql->user->edge_followed_by->count)) {
    $result = $output->graphql->user->edge_followed_by->count;
}
