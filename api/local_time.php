<?php

// https://stackoverflow.com/questions/11176502/php-get-uk-local-time-from-server-in-different-time-zone

if (!$value) {
    $value = 'Europe/Madrid';
}

date_default_timezone_set($value);

$result = date("d-m-Y H:i:s");
