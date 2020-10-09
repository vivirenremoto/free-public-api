<?php

// https://github.com/ronanguilloux/IsoCodes/blob/master/src/IsoCodes/SwiftBic.php

function validateSwift($swiftbic)
{
    $regexp = '/^[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}$/i';

    return (bool) preg_match($regexp, $swiftbic);
}

$result = validateSwift($value);
