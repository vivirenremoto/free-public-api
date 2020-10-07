<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//////////////////////////

$request = $_SERVER['REQUEST_URI'];

$t_request = explode('/', current(explode('?', $request)));

$action = $t_request[1] ? $t_request[1] : false;

$value = isset($_GET['value']) ? $_GET['value'] : null;
$callback = isset($_GET['callback']) ? $_GET['callback'] : null;
$format = isset($_GET['format']) ? $_GET['format'] : 'text';
$key = isset($_GET['key']) ? $_GET['key'] : null;
$default = isset($_GET['default']) ? $_GET['default'] : false;

$path = __DIR__ . '/api/' . $action . '.php';

if (file_exists($path)) {
    require $path;

    if (is_bool($result) && $result == false) {
        $result = $default;
    }

    if ($callback || $format == 'text') {
        if (is_bool($result)) {
            if ($result) {
                $result = 'true';
            } else {
                $result = 'false';
            }
        }
    }

    if ($callback) {
        if (is_string($result) && !in_array($result, array('true', 'false'))) {
            $result = "'" . $result . "'";
        }

        echo $callback . "(" . $result . ")";
    } else if ($format == 'json') {
        header("Content-type: application/json");
        $data = array('result' => $result);
        echo json_encode($data);
    } else {
        echo $result;
    }

} else {
    $url = 'https://github.com/vivirenremoto/free-public-api';
    header("Location: " . $url);
}
