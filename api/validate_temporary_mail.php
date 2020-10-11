<?php

// https://gist.github.com/duongthanhthai/6d8ec929889db2ad944abcd0742ab8fc

if (strstr($value, '@')) {
    $t_email = explode('@', $value);
    $domain = end($t_email);

    $path = __DIR__ . '/sources/temporary_mail_providers.txt';
    $items = explode("\n", file_get_contents($path));

    $result = in_array($domain, $items);
}
