<?php

$from = isset($_GET['from']) ? $_GET['from'] : false;
$to = isset($_GET['to']) ? $_GET['to'] : false;

if ($from && $to) {

    $url = 'https://www.bing.com/ttranslatev3';

    $post = array(
        'fromLang' => $from,
        'to' => $to,
        'text' => $value,
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.bing.com/translator');
    curl_setopt($curl, CURLOPT_POST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($curl);
    curl_close($curl);

    $output = json_decode($data);
    if (isset($output[0]->translations[0]->text)) {
        $result = $output[0]->translations[0]->text;
    }

}
