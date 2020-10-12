<?php

$tags = @get_meta_tags($value);

if (isset($tags['generator'])) {
    $result = $tags['generator'];
}
