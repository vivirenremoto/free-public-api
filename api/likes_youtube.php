<?php

// https://stackoverflow.com/questions/25826571/get-comment-or-likes-count-for-youtube-video-using-api-3-0

if (!$key) {
    throw new Exception('api key (youtube data) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$api_response = @file_get_contents('https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' . $value . '&key=' . $key);
$api_response_decoded = json_decode($api_response, true);

if (isset($api_response_decoded['items'][0]['statistics']['likeCount'])) {
    $result = $api_response_decoded['items'][0]['statistics']['likeCount'];
}
