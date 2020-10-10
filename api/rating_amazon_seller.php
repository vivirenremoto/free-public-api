<?php

$domain = isset($_GET['domain']) ? $_GET['domain'] : 'amazon.es';

$url = 'https://www.' . $domain . '/sp?seller=' . $value;
$data = @file_get_contents($url);

$pattern = '/<b>([0-9]*)% positiv/';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
