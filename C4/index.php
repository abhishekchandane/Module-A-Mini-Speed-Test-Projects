<?php

$channel = $_GET['channel'] ?? '';

if (!in_array($channel, ['red', 'green', 'blue'])) {
    http_response_code(400);
    exit('Invalid channel');
}

$image = imagecreatefromjpeg('sample.jpg');

$width = imagesx($image);
$height = imagesy($image);

for ($y = 0; $y < $height; $y++) {

    for ($x = 0; $x < $width; $x++) {

        $rgb = imagecolorat($image, $x, $y);

        $red = ($rgb >> 16) & 255;
        $green = ($rgb >> 8) & 255;
        $blue = $rgb & 255;

        if ($channel === 'red') {
            $green = 0;
            $blue = 0;
        }

        if ($channel === 'green') {
            $red = 0;
            $blue = 0;
        }

        if ($channel === 'blue') {
            $red = 0;
            $green = 0;
        }

        $color = imagecolorallocate(
            $image,
            $red,
            $green,
            $blue
        );

        imagesetpixel($image, $x, $y, $color);
    }
}

header('Content-Type: image/jpeg');

imagejpeg($image);

imagedestroy($image);