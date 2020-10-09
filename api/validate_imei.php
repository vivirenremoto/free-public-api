<?php

// https://stackoverflow.com/questions/4741580/imei-validation-function

function validate_imei($imei)
{
    if (!preg_match('/^[0-9]{15}$/', $imei)) {
        return false;
    }

    $sum = 0;
    for ($i = 0; $i < 14; $i++) {
        $num = $imei[$i];
        if (($i % 2) != 0) {
            $num = $imei[$i] * 2;
            if ($num > 9) {
                $num = (string) $num;
                $num = $num[0] + $num[1];
            }
        }
        $sum += $num;
    }
    if ((($sum + $imei[14]) % 10) != 0) {
        return false;
    }

    return true;
}

$result = validate_imei($value);
