<?php

// https://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php

function vincentyGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $lonDelta = $lonTo - $lonFrom;
    $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
    $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

    $angle = atan2(sqrt($a), $b);
    return $angle * $earthRadius;
}

list($from, $to) = explode('-', $value);
list($from_lat, $from_lon) = explode(',', $from);
list($to_lat, $to_lon) = explode(',', $to);

$result = (int) vincentyGreatCircleDistance($from_lat, $from_lon, $to_lat, $to_lon);
