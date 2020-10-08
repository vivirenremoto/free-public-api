<?php

// https://github.com/marcboquet/spanish-names

$names = array();

if (in_array($value, array('female', false))) {
    require 'sources/female_names.php';
}

if (in_array($value, array('male', false))) {
    require 'sources/male_names.php';
}

shuffle($names);

$result = $names[0];
