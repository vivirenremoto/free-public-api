<?php

// https://stackoverflow.com/questions/3184284/count-all-html-tags-in-page-php

$html = @file_get_contents($value);

if ($html) {
    libxml_use_internal_errors(true);

    $dom = new DOMDocument;
    $dom->loadHTML($html);
    $allElements = $dom->getElementsByTagName('*');

    $result = $allElements->length;

} else {
    $result = 0;
}
