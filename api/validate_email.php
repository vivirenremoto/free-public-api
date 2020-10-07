<?php

// https://www.w3schools.com/php/filter_validate_email.asp

$result = filter_var($value, FILTER_VALIDATE_EMAIL) ? true : false;
