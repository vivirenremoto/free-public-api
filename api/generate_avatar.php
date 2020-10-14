<?php

if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
} else {
    $genders = array('female', 'male');
    shuffle($genders);
    $gender = $genders[0];
}

$path = __DIR__ . '/sources/faces/' . $gender . '/';
$files = glob($path . '*.jpg');

shuffle($files);

header('Content-Type: image/jpeg');
readfile($files[0]);

exit();
