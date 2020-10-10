<?php

// https://developers.google.com/speed/docs/insights/v5/reference/pagespeedapi/runpagespeed

if (!$key) {
    throw new Exception('api key (pagespeed insights) and valid billing account are required on https://console.cloud.google.com/apis/');
}

$device = isset($_GET['device']) ? $_GET['device'] : 'desktop';

$url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . urlencode($value) . '&key=' . $key . '&strategy=' . $device;

$data = @file_get_contents($url);
$output = json_decode($data);

if (isset($output->lighthouseResult->categories->performance->score)) {
    $result = $output->lighthouseResult->audits->{'final-screenshot'}->details->data;

    $result = str_replace('data:image/jpeg;base64,', '', $result);
    $result = base64_decode($result);

    header('Content-Type: image/jpeg');
    die($result);
}
