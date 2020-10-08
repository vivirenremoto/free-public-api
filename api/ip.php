<?php

// https://stackoverflow.com/questions/18264304/get-clients-real-ip-address-on-heroku

function getIpAddress()
{
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim(end($ipAddresses));
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$result = getIpAddress();
