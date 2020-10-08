<?php

$lang = isset($_GET['lang']) ? strtolower($_GET['lang']) : 'es';

$src = __DIR__ . '/sources/thesaurus_' . $lang . '.txt';

if (file_exists($src)) {
    $items = explode("\n", file_get_contents($src));
    $found = false;
    $i = 0;
    $total = count($items);
    while (!$found && $i < $total) {
        if ($found = stristr($items[$i], $value)) {
            $result = $items[$i];
            $result = str_replace($value . ';', '', $result);
            $result = str_replace(';' . $value, '', $result);
        }
        $i++;
    }
}
