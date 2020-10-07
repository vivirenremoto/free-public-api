<?php

// https://stackoverflow.com/questions/6101956/generating-a-random-password-in-php/6101969

$length = isset($_GET['length']) ? $_GET['length'] : 8;

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i <= $length; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
$result = implode($pass); //turn the array into a string
