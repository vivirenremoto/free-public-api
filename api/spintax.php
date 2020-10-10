<?php

$lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : 'es';

$path = __DIR__ . '/sources/thesaurus_' . $lang . '.txt';

$result = $value;

if (file_exists($path)) {
    $items = explode("\n", @file_get_contents($path));

    $value_aux = str_replace(array(',', '.'), ' ', $value);
    $words_text = explode(' ', $value_aux);
    $words_text = array_unique($words_text);

    foreach ($words_text as $word) {
        $word_aux = ';' . $word . ';';
        $found = false;
        $i = 0;
        $total = count($items);
        while (!$found && $i < $total) {
            $item_aux = ';' . $items[$i] . ';';

            if ($found = stristr($item_aux, $word_aux)) {
                $result = str_ireplace($word, '{' . str_replace(';', '|', $items[$i]) . '}', $result);
            }
            $i++;
        }

    }
}
