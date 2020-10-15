<?php

// https://lab.fawno.com/2015/08/27/validacion-de-cif-nif/

function nif_validation($cif)
{
    $cif = strtoupper($cif);
    if (preg_match('~(^[XYZ\d]\d{7})([TRWAGMYFPDXBNJZSQVHLCKE]$)~', $cif, $parts)) {
        $control = 'TRWAGMYFPDXBNJZSQVHLCKE';
        $nie = array('X', 'Y', 'Z');
        $parts[1] = str_replace(array_values($nie), array_keys($nie), $parts[1]);
        $cheksum = substr($control, $parts[1] % 23, 1);
        return ($parts[2] == $cheksum);
    } elseif (preg_match('~(^[ABCDEFGHIJKLMUV])(\d{7})(\d$)~', $cif, $parts)) {
        $checksum = 0;
        foreach (str_split($parts[2]) as $pos => $val) {
            $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
        }
        $checksum = ((10 - ($checksum % 10)) % 10);
        return ($parts[3] == $checksum);
    } elseif (preg_match('~(^[KLMNPQRSW])(\d{7})([JABCDEFGHI]$)~', $cif, $parts)) {
        $control = 'JABCDEFGHI';
        $checksum = 0;
        foreach (str_split($parts[2]) as $pos => $val) {
            $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
        }
        $checksum = substr($control, ((10 - ($checksum % 10)) % 10), 1);
        return ($parts[3] == $checksum);
    }

    throw new BadRequestException();
}

$result = nif_validation($value);
