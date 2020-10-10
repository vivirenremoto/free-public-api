<?php

$path = __DIR__ . '/sources/spam_words.txt';

if (file_exists($path)) {
    $words = explode("\n", @file_get_contents($path));

    $found = false;
    $i = 0;
    $total = count($words);
    while (!$found && $i < $total) {
        if (stristr($value, trim($words[$i]))) {
            $found = true;
        }
        $i++;
    }

    $result = !$found;
}
