<?php

// https://stackoverflow.com/questions/1972712/how-to-generate-random-date-between-two-dates-using-php

function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s')
{
    // Convert the supplied date to timestamp
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);
    // Generate a random number from the start and end dates
    $fVal = mt_rand($fMin, $fMax);
    // Convert back to the specified date format
    return date($sFormat, $fVal);
}

$start_date = '-90 years';
$end_date = 'today';

$result = randomDate($start_date, $end_date, 'Y-m-d');
