<?php

require __DIR__ . '/sources/countries_en.php';

$country_code = array_rand($countries);
$country = $countries[$country_code];

$result = $country;
