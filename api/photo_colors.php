<?php

// https://stackoverflow.com/questions/10290259/detect-main-colors-in-an-image-with-php

// EXAMPLE PICTURE
//$url = 'https://res.cloudinary.com/prestige-gifting/image/fetch/fl_progressive,q_95,e_sharpen:50,w_480/e_saturation:05/t_free_chocs_overlay/https://www.prestigeflowers.co.uk/images/bd155c90d88e4af1c87b6ff2e4d1901d.jpg';

//var_dump(getColorPallet($url));

//echoColors(getColorPallet($url, [5, 5]));

function echoColors($pallet)
{ // OUTPUT COLORSBAR
    foreach ($pallet as $key => $val) {
        echo '<div style="display:inline-block;width:50px;height:20px;background:#' . $val . '"> </div>';
    }
}

function getColorPallet($imageURL, $palletSize = [16, 8])
{ // GET PALLET FROM IMAGE PLAY WITH INPUT PALLET SIZE
    // SIMPLE CHECK INPUT VALUES
    if (!$imageURL) {
        return false;
    }

    // IN THIS EXEMPLE WE CREATE PALLET FROM JPG IMAGE
    $img = @imagecreatefromjpeg($imageURL);

    if (!$img) {
        return false;
    }

    // SCALE DOWN IMAGE
    $imgSizes = getimagesize($imageURL);

    $resizedImg = imagecreatetruecolor($palletSize[0], $palletSize[1]);

    imagecopyresized($resizedImg, $img, 0, 0, 0, 0, $palletSize[0], $palletSize[1], $imgSizes[0], $imgSizes[1]);

    imagedestroy($img);

    //GET COLORS IN ARRAY
    $colors = [];

    for ($i = 0; $i < $palletSize[1]; $i++) {
        for ($j = 0; $j < $palletSize[0]; $j++) {
            $colors[] = dechex(imagecolorat($resizedImg, $j, $i));
        }
    }

    imagedestroy($resizedImg);

    //REMOVE DUPLICATES
    $colors = array_unique($colors);

    return $colors;

}

$pallet = getColorPallet($value, [5, 5]);

if ($pallet) {
    $result = '';

    foreach ($pallet as $key => $val) {
        if ($key) {
            $result .= ';';
        }

        $result .= '#' . $val;
    }
}
