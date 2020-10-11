<?php

$url = 'https://www.tiktok.com/@' . $value . '?lang=es';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$html = curl_exec($ch);
curl_close($ch);

if ($html) {
    $json = explode('<script id="__NEXT_DATA__" type="application/json" crossorigin="anonymous">', $html);
    $json = end($json);
    $json = current(explode('</script>', $json));
    $json = json_decode($json);

    $result = $json->props->pageProps->videoData->itemInfos->diggCount;
}
