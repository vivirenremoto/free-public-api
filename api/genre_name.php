<?php

// https://github.com/marcboquet/spanish-names

$value = ucwords(strtolower($value));

$names = array();
require __DIR__ . "/sources/female_names.php";
if (in_array($value, $names)) {
    $result = "female";
}

if (!$result) {
    $names = array();
    require __DIR__ . "/sources/male_names.php";
    if (in_array($value, $names)) {
        $result = "male";
    }
}
