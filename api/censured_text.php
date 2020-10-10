<?php

// https://gist.githubusercontent.com/anonymous/e8e6798137b1ff4836d6ebcf73fef7dc/raw/415dfc8cbab13fa6033fbb4d4ce9eae7a9dbe7cd/Bad_Words.txt
// https://github.com/LDNOOBW/List-of-Dirty-Naughty-Obscene-and-Otherwise-Bad-Words/blob/master/es

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$path = __DIR__ . '/sources/bad_words_' . $lang . '.txt';

$result = $value;

if (file_exists($path)) {
    $words = explode("\n", @file_get_contents($path));
    rsort($words);

    foreach ($words as $word) {
        $silence = str_repeat('*', strlen($word));
        $result = str_ireplace(trim($word), $silence, $result);
    }

}
