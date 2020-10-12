<?php

// https://exchangeratesapi.io/

$amount = 1;
$precision = isset($_GET['precision']) ? $_GET['precision'] : false;

if (strstr($value, '-') && is_numeric($amount)) {

    list($from, $to) = explode('-', $value);

    if ($from == $to) {
        $result = $amount;

    } else {
        $url = 'https://api.exchangeratesapi.io/latest';
        $json = @file_get_contents($url);
        $output = json_decode($json);

        if (isset($output->date)) {

            $output->rates->{'EUR'} = 1;

            if (isset($output->rates->{$from}) && isset($output->rates->{$to})) {
                if ($from == 'EUR') {
                    $from_value = 1;
                    $to_value = $output->rates->{$to};
                } else if ($to == 'EUR') {
                    $from_value = $output->rates->{$from};
                    $to_value = 1;
                } else {
                    $from_value = $output->rates->{$from};
                    $to_value = $output->rates->{$to};
                }

                $result = ($amount / $from_value) * $to_value;

                if ($precision) {
                    $result = round($result, $precision);
                }
            }
        }
    }
}
