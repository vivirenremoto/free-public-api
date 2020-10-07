<?php

$key = '11210836-792643a4560f2fbd817b3a812';
$url = 'https://pixabay.com/api/?q=' . urlencode($value) . '&key=' . $key . '&image_type=photo';
$data = json_decode( file_get_contents($url) );

if( isset($data->hits[0]) ){
  shuffle($data->hits);
  $result = $data->hits[0]->largeImageURL;
}
