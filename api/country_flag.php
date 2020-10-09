<?php

$path = __DIR__ . '/sources/flags/' . $value . '.png';
if (file_exists($path)) {
    header("Content-type: image/png");
    readfile($path);

} else {
    header("HTTP/1.0 404 Not Found");
}

exit();
