<?php

header('Access-Control-Allow-Origin: *');

$request = $_SERVER['REQUEST_URI'];
$base_url = 'https://' . $_SERVER['HTTP_HOST'];

//////////////////////////

if (strstr($request, '.test' || isset($_GET['test']))) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//////////////////////////

$t_request = explode('/', current(explode('?', $request)));
$action = $t_request[1] ? $t_request[1] : false;

$callback = isset($_GET['callback']) ? $_GET['callback'] : null;
$format = isset($_GET['format']) ? $_GET['format'] : 'text';
$key = isset($_GET['key']) ? $_GET['key'] : null;
$default = isset($_GET['default']) ? $_GET['default'] : false;
$result = false;

if (isset($_GET['input'])) {
    $value = $_GET['input'];
} else if (isset($_GET['value'])) {
    $value = $_GET['value'];
} else {
    $value = null;
}

$path = __DIR__ . '/api/' . $action . '.php';

if (file_exists($path)) {

    try {
        require $path;
    } catch (Exception $e) {

        http_response_code(400);

        if ($format == 'json') {
            header("Content-type: application/json");
            $data = array(
                'status' => 400,
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
        $data = array(
            'status' => 200,
            'result' => $result,
        );
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

    if ($action) {
        http_response_code(404);

        if ($format == 'json') {
            header("Content-type: application/json");
            $data = array(
                'status' => 404,
                'error' => 'page not found',
            );
            echo json_encode($data);

        } else {
            header("Content-type: text/plain");
            echo 'error 404 - page not found';
        }

    } else {

        //http_response_code(301);
        //$url = 'https://github.com/vivirenremoto/free-public-api';
        //header('Location: ' . $url);
        require __DIR__ . '/home.html';

    }

}
