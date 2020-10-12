<?php

$tags = @get_meta_tags($value);

if (isset($tags['description'])) {
    $result = $tags['description'];
}
