<?php

// https://gist.github.com/rparatodxs/7055224448e170761451d683511a8b2c
// https://gist.github.com/larsyencken/1440509
// https://gist.github.com/danpariente/3860008

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$path = __DIR__ . '/sources/negative_words_' . $lang . '.txt';

if (file_exists($path)) {

    $words = str_replace(array(',', '-', '_', '.', '?', '¿', ':'), ' ', $value);
    $words = strtolower($words);
    $words = ' ' . $words . ' ';

    $path_aux = __DIR__ . '/sources/stop_words_' . $lang . '.txt';
    $stop_words = explode("\n", @file_get_contents($path_aux));
    $words = str_replace($stop_words, ' ', $words);
    $words = trim($words);

    $words = explode(' ', $words);
    $words = array_unique($words);
    $total_words = count($words);
    $words_found = 0;

    $negative_words = explode("\n", @file_get_contents($path));

    $path = __DIR__ . '/sources/spam_words.txt';
    $spam_words = explode("\n", @file_get_contents($path));

    $negative_words = array_merge($negative_words, $spam_words);
    foreach ($negative_words as $word) {
        $word = trim($word);
        if (in_array($word, $words)) {
            $words_found++;
        }
    }

    $result = round((($words_found * 100) / $total_words), 0);

}
