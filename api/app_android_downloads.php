<?php

$url = 'https://play.google.com/store/apps/details?id=' . urlencode($value) . '&hl=en';
$data = @file_get_contents($url);

$pattern = '/<div class="hAyfc"><div class="BgcNfc">Installs<\/div><span class="htlgb"><div class="IQ1z0d"><span class="htlgb">([0-9,+]*)<\/span>/s';
preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
    $result = str_replace(array('+', ','), '', $result);
}
