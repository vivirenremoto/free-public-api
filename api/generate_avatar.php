<?php

header('Content-Type: image/jpeg');

$url = 'https://thispersondoesnotexist.com/image';

echo file_get_contents($url);

exit();
