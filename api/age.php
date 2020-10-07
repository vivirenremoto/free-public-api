<?php

// https://thisinterestsme.com/php-calculate-age-date-of-birth/

//Get the current UNIX timestamp.
$now = time();

//Get the timestamp of the person's date of birth.
$dob = strtotime($value);

//Calculate the difference between the two timestamps.
$difference = $now - $dob;

//There are 31556926 seconds in a year.
$age = floor($difference / 31556926);

//Print it out.
$result = $age;
