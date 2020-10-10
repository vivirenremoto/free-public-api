<?php

// https://es.stackoverflow.com/questions/155262/comprobar-que-el-valor-de-un-campo-cumpla-con-al-menos-una-de-3-condiciones

function validateNie($nie)
{
    return preg_match('/^([A-Z]){1}([0-9]){7}([A-Z]){1}$/', $nie) == 1;
}

$result = validateNie($value);
