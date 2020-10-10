<?php

$country = isset($_GET['country']) ? $_GET['country'] : 'ES';
$subdomain = 'ws-eu';

$url = 'https://' . $subdomain . '.amazon-adsystem.com/widgets/q?MarketPlace=' . $country . '&Operation=GetResults&InstanceId=0&dataType=jsonp&TemplateId=MobileSearchResults&ServiceVersion=20070822&Keywords=' . urlencode($value) . '&SearchIndex=All&multipageStart=0&multipageCount=1';
$data = @file_get_contents($url);

$pattern = '/Rating : "(.*)" , TotalReviews/';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
}
