<?php

$tags = @get_meta_tags($value);

if (isset($tags['robots'])) {
    $result = $tags['robots'];
}
