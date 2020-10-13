<?php

// https://stackoverflow.com/questions/12553160/getting-visitors-country-from-their-ip

$url = 'http://api.hostip.info/country.php?ip=' . $value;
$result = @file_get_contents($url);

if ($result == "XX") {
    $result = false;
}
