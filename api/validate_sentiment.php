<?php

// https://gist.github.com/mkulakowski2/4289437
// https://gist.github.com/rparatodxs/7055224448e170761451d683511a8b2c

$total = 0;

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

$path = __DIR__ . '/sources/positive_words_' . $lang . '.txt';

if (file_exists($path)) {

    $words = str_replace(array(',', '-', '_', '.', '?', '¿'), ' ', $value);
    $words = explode(' ', $words);
    $words = array_unique($words);

    $words_aux = explode("\n", @file_get_contents($path));
    foreach ($words_aux as $word) {
        $word = trim($word);
        if (in_array($word, $words)) {
            $total++;
        }
    }

    $path = __DIR__ . '/sources/negative_words_' . $lang . '.txt';
    $words_aux = explode("\n", @file_get_contents($path));
    foreach ($words_aux as $word) {
        $word = trim($word);
        if (in_array($word, $words)) {
            $total--;
        }
    }

    if ($total > 0) {
        $result = 'positive';
    } else if ($total < 0) {
        $result = 'negative';
    } else {
        $result = 'neutral';
    }

}
