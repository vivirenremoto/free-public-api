<?php

// https://www.adaweb.es/validar-dni-con-php/

$dni = $value;
$letra = substr($dni, -1);
$numeros = substr($dni, 0, -1);

$result = (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8);
