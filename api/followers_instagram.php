<?php

// instagram blocks my ip this doesnt work anymore

$url = 'https://www.instagram.com/' . $value . '/?__a=1';
$json = @file_get_contents($url);
$output = json_decode($json);

if (isset($output->graphql->user->edge_followed_by->count)) {
    $result = $output->graphql->user->edge_followed_by->count;
}
