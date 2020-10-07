<?php

if ($value) {
    if (strstr($value, '-')) {
        list($min, $max) = explode('-', $value);
    } else {
        $min = 1;
        $max = $value;
    }

    $result = rand($min, $max);
} else {
    $result = rand();
}
