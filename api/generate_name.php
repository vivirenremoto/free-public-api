<?php

// https://github.com/marcboquet/spanish-names

$names = array();

if (in_array($value, array("female", false))) {
    require __DIR__ . "/sources/female_names.php";
}

if (in_array($value, array("male", false))) {
    require __DIR__ . "/sources/male_names.php";
}

shuffle($names);

$result = $names[0];
