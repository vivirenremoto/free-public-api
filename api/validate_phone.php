<?php

// https://gist.github.com/purcaholic/2314727

$pattern = '/^[0-9\-\(\)\/\+\s]*$/';

if (preg_match($pattern, $value)) {
    $result = true;
}
