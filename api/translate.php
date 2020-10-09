<?php

$from = isset($_GET['from']) ? $_GET['from'] : false;
$to = isset($_GET['to']) ? $_GET['to'] : false;

if ($from && $to) {

    $domain = 'https://free-public-api.herokuapp.com';
    $content_url = '/decode_base64/?value=' . urlencode(base64_encode($value));

    $url = 'https://translate.googleusercontent.com/translate_c?depth=1&hl=' . $to . '&prev=search&pto=aue&rurl=translate.google.com&sl=' . $from . '&sp=nmt4&u=' . urlencode($content_url);

    $result = file_get_contents($url);

}
