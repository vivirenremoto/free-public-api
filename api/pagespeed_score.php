<?php

// https://developers.google.com/speed/docs/insights/v5/reference/pagespeedapi/runpagespeed

$device = isset($_GET['device']) ? $_GET['device'] : 'desktop';

$url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . urlencode($value) . '&key=' . $key . '&strategy=' . $device;

$data = @file_get_contents($url);
$output = json_decode($data);

if (isset($output->lighthouseResult->categories->performance->score)) {
    $result = $output->lighthouseResult->categories->performance->score * 100;
}
