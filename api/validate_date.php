<?php

$t_date = explode('-', $value);

if (count($t_date) == 3) {
    list($year, $month, $day) = $t_date;
    $result = checkdate($month, $day, $year);
}
