<?php

// https://stackoverflow.com/questions/408405/easy-way-to-test-a-url-for-404-in-php

$handle = curl_init($value);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($handle);
$result = curl_getinfo($handle, CURLINFO_HTTP_CODE);
curl_close($handle);
