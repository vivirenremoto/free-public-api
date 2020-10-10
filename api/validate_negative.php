<?php

// https://gist.github.com/mkulakowski2/4289441
// https://gist.github.com/rparatodxs/7055224448e170761451d683511a8b2c

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$path = __DIR__ . '/sources/negative_words_' . $lang . '.txt';

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
    $result = $found;
}
