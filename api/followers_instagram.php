<?php

$url = 'https://www.instagram.com/' . $value . '/';

$tags = @get_meta_tags($url);

if (strstr($tags['description'], '@' . $value)) {
    $result = current(explode(' ', $tags['description']));
}
