<?php

header('Access-Control-Allow-Origin: *');

$request = $_SERVER['REQUEST_URI'];

//////////////////////////

if (strstr($request, '.test' || isset($_GET['test']))) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//////////////////////////

$t_request = explode('/', current(explode('?', $request)));

$action = $t_request[1] ? $t_request[1] : false;

$value = isset($_GET['value']) ? $_GET['value'] : null;
$callback = isset($_GET['callback']) ? $_GET['callback'] : null;
$format = isset($_GET['format']) ? $_GET['format'] : 'text';
$key = isset($_GET['key']) ? $_GET['key'] : null;
$default = isset($_GET['default']) ? $_GET['default'] : false;
$result = false;

$path = __DIR__ . '/api/' . $action . '.php';

if (file_exists($path)) {

    try {
        require $path;
    } catch (Exception $e) {

        http_response_code(400);

        if ($format == 'json') {
            header("Content-type: application/json");
            $data = array(
                'error' => $e->getMessage(),
            );
            echo json_encode($data);
        } else {

            header("Content-type: text/plain");

            echo $e->getMessage();
        }
        exit();
    }

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
        } else if (is_array($result)) {
            $result = json_encode($result);
        }

        echo $callback . "(" . $result . ")";

    } else if ($format == 'json') {
        header("Content-type: application/json");
        $data = array('result' => $result);
        echo json_encode($data);

    } else {

        header("Content-type: text/plain");

        // print as csv
        if (is_array($result)) {

            $result = '';
            $i = 0;
            foreach ($items[0] as $key => $item) {
                if ($i) {
                    $result .= ';';
                }

                $result .= $key;
                $i++;
            }

            foreach ($items as $key => $item) {

                $result .= "\n";

                $i = 0;
                foreach ($item as $data) {
                    if ($i) {
                        $result .= ';';
                    }

                    $result .= $data;
                    $i++;
                }

            }
        }

        echo $result;
    }

} else {
    $url = 'https://github.com/vivirenremoto/free-public-api';
    header("Location: " . $url);
}
