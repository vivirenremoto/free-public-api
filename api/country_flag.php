<?php

// https://www.flaticon.com/packs/countrys-flags?k=1602249208360

header("Content-type: image/png");

$path = __DIR__ . '/sources/flags/' . $value . '.png';
if (file_exists($path)) {
    readfile($path);

} else {
    http_response_code(404);
    readfile(__DIR__ . '/sources/blank_pixel.png');
}

exit();
