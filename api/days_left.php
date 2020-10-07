<?php

// https://stackoverflow.com/questions/1735252/php-countdown-to-date

$date = strtotime($value);
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
//$hours_remaining = floor(($remaining % 86400) / 3600);

if ($days_remaining < 0) {
    $days_remaining = 0;
}

$result = $days_remaining;
