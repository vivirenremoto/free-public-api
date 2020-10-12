<?php

// https://stackoverflow.com/questions/12014196/get-facebook-meta-tags-with-php

$name = isset($_GET['name']) ? $_GET['name'] : false;

if ($name) {

    $html = @file_get_contents($value);

    if ($html) {

        $dom = new DOMDocument();
        @$dom->loadHTML($html);
        $metas = $dom->getElementsByTagName('meta');
        $i = 0;
        $total = count($metas);
        $found = false;
        while (!$found && $i < $total) {
            $meta = $metas[$i];

            if ($found = ($meta->getAttribute('property') == $name)) {
                $result = $meta->getAttribute('content');
            }

            $i++;
        }

    }

}
