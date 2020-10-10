<?php

header('Content-Type: image/png');

$size = isset($_GET['size']) ? $_GET['size'] : 200;

$url = 'https://chart.googleapis.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chl=' . urlencode($value);

echo @file_get_contents($url);

exit();
