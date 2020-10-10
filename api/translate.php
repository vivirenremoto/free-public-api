<?php

if (!$key) {
    throw new Exception('api key is required on https://www.deepl.com/pro');
}

$from = isset($_GET['from']) ? $_GET['from'] : false;
$to = isset($_GET['to']) ? $_GET['to'] : false;

if ($from && $to) {

    $post = array(
        "auth_key" => $key,
        "text" => $value,
        "source_lang" => $from,
        "target_lang" => $to,
    );

    $url = "https://api.deepl.com/v2/translate";

    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($post),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    $json = json_decode($response);

    if (isset($json->translations[0])) {
        $result = $json->translations[0]->text;

    } else if (isset($json->message)) {
        $result = "error - " . $json->message;

    }
}
