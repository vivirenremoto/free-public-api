<?php

// https://stackoverrun.com/es/q/2389329

$countryCode = substr($value, 0, 2);
$vatNo = substr($value, 2, strlen($value) - 2);

$client = new SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");
$data = $client->checkVat(array(
    'countryCode' => $countryCode,
    'vatNumber' => $vatNo,
));

$result = $data->valid == 1 ? true : false;
