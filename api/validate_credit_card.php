<?php

// http://www.learningaboutelectronics.com/Articles/How-to-validate-a-credit-card-number-using-PHP.php

function validatecard($number)
{
    $cardtype = array(
        "visa" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex" => "/^3[47][0-9]{13}$/",
        "discover" => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype["visa"], $number)) {
        return "visa";

    } else if (preg_match($cardtype["mastercard"], $number)) {
        return "mastercard";
    } else if (preg_match($cardtype["amex"], $number)) {
        return "amex";

    } else if (preg_match($cardtype["discover"], $number)) {
        return "discover";
    } else {
        return false;
    }
}

$value = str_replace(" ", "", $value);

$result = validatecard($value) != false;
