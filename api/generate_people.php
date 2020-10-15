<?php

$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 1;
if ($limit < 1) {
    $limit = 1;
} else if ($limit > 1000) {
    $limit = 1000;
}

require __DIR__ . '/generate_date.php';
$birthdate = $result;

require __DIR__ . '/sources/countries_en.php';

$gender_names = array();

$names = array();
require __DIR__ . '/sources/female_names.php';
$gender_names['female'] = $names;

$names = array();
require __DIR__ . '/sources/male_names.php';
$gender_names['male'] = $names;

unset($names);

$last_names = explode("\n", @file_get_contents(__DIR__ . '/sources/last_names.txt'));

$genders = array('female', 'male');
$email_providers = array('outlook.com', 'yahoo.com', 'gmail.com', 'hotmail.com', 'live.com', 'aol.com', 'icloud.com', 'mail.com', 'lycos.com');
$separators = array('.', '_', '');

$faces = array();
$gender = 'female';
$path = __DIR__ . '/sources/faces/' . $gender . '/';
$faces[$gender] = glob($path . '*.jpg');

$gender = 'male';
$path = __DIR__ . '/sources/faces/' . $gender . '/';
$faces[$gender] = glob($path . '*.jpg');

$items = array();

for ($i = 0; $i < $limit; $i++) {
    shuffle($email_providers);
    shuffle($separators);
    shuffle($genders);
    shuffle($last_names);
    $gender = $genders[0];

    shuffle($faces[$gender]);

    shuffle($gender_names[$gender]);
    $name = $gender_names[$gender][0];

    $last_name = trim($last_names[0]);
    $last_name .= ' ' . trim($last_names[1]);

    $country_code = array_rand($countries);
    $country = $countries[$country_code];

    $email = str_replace(' ', $separators[0], strtolower(current(explode(' ', $name)) . ' ' . current(explode(' ', $last_name)) . ' '));
    $email = str_replace('ñ', 'n', $email);
    $email .= rand(1, 1000) . '@' . $email_providers[0];

    $photo = $base_url . '/api/sources/faces/' . $gender . '/' . basename($faces[$gender][0]);

    $data = array();
    $data['first_name'] = $name;
    $data['last_name'] = $last_name;
    $data['gender'] = $gender;
    $data['email'] = $email;
    $data['country'] = $country;
    $data['country_code'] = $country_code;
    $data['birthdate'] = $birthdate;
    $data['photo'] = $photo;
    $items[] = $data;
}

$result = $items;
