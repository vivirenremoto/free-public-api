<?php

$url = 'https://www.instagram.com/' . $value . '/';
$html = file_get_contents($url);

if (strstr($html, 'FollowAction')) {
    $pattern = '/FollowAction","userInteractionCount":"([0-9]*)"/';

    preg_match($pattern, $html, $matches);

    if (isset($matches[1])) {
        $result = $matches[1];
    }

}
