<?php

// https://exchangeratesapi.io/

$from = isset($_GET['from']) ? strtoupper($_GET['from']) : false;
$to = isset($_GET['to']) ? strtoupper($_GET['to']) : false;
$precision = isset($_GET['precision']) ? $_GET['precision'] : 2;

if ($from == $to) {
    $result = $value;

} else {
    $url = 'https://api.exchangeratesapi.io/latest';
    $json = file_get_contents($url);
    $output = json_decode($json);

    if (isset($output->date)) {
        if (in_array('EUR', array($from, $to)) || (isset($output->rates->{$from}) && isset($output->rates->{$to}))) {
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

            $result = ($value / $from_value) * $to_value;
            $result = round($result, $precision);
        }
    }
}
