<?php

// https://www.codexworld.com/how-to/get-number-of-days-between-two-dates-php/

if (strstr($value, ',')) {
    list($from, $to) = explode(',', $value);

    $date1 = date_create($from);
    $date2 = date_create($to);

    //difference between two dates
    $diff = date_diff($date1, $date2);

    //count days
    $result = $diff->format("%a");
} else {
    $result = 0;
}
