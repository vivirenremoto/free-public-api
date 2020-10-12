<?php

// https://stackoverflow.com/questions/14517094/aligning-php-generated-image-dynamic-text-in-center
// https://stackoverflow.com/questions/15202079/convert-hex-color-to-rgb-values-in-php

if (strstr($value, 'x')) {

    $background_color = isset($_GET['background_color']) ? $_GET['background_color'] : 'aaaaaa';
    $text_color = isset($_GET['text_color']) ? $_GET['text_color'] : '000000';
    $font_size = isset($_GET['font_size']) ? $_GET['font_size'] : 30;
    $text = isset($_GET['text']) ? $_GET['text'] : $value;

    list($r_background, $g_background, $b_background) = sscanf($background_color, "%02x%02x%02x");
    list($r_text, $g_text, $b_text) = sscanf($text_color, "%02x%02x%02x");
    list($image_width, $image_height) = explode('x', $value);

    $im = imagecreatetruecolor($image_width, $image_height);
    $background_color = imagecolorallocate($im, $r_background, $g_background, $b_background);
    imagefill($im, 0, 0, $background_color);

    $text_color = imagecolorallocate($im, $r_text, $g_text, $b_text);

    $font = __DIR__ . '/sources/verdana.ttf';
    $angle = 0;

    // Get Bounding Box Size
    $text_box = imagettfbbox($font_size, $angle, $font, $text);

    // Get your Text Width and Height
    $text_width = $text_box[2] - $text_box[0];
    $text_height = $text_box[7] - $text_box[1];

    // Calculate coordinates of the text
    $x = ($image_width / 2) - ($text_width / 2);
    $y = ($image_height / 2) - ($text_height / 2);

    // Add the text
    imagettftext($im, $font_size, 0, $x, $y, $text_color, $font, $text);

    header("Content-type: image/png");
    imagepng($im);
    imagedestroy($im);

    exit();

}
