<?php

// https://github.com/paulfp/social-media-counter/blob/master/index.php

$url = 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=' . $value;
$output = file_get_contents($url);
$json = json_decode($output, true);

if (isset($json[0])) {
    $result = $json[0]['followers_count'];
}
