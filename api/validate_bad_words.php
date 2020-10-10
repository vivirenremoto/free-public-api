<?php

// https://gist.githubusercontent.com/anonymous/e8e6798137b1ff4836d6ebcf73fef7dc/raw/415dfc8cbab13fa6033fbb4d4ce9eae7a9dbe7cd/Bad_Words.txt
// https://github.com/LDNOOBW/List-of-Dirty-Naughty-Obscene-and-Otherwise-Bad-Words/blob/master/es

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$path = __DIR__ . '/sources/bad_words_' . $lang . '.txt';

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
