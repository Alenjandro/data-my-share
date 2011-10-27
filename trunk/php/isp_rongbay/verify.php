<?php
session_start();
header("Content-Type: image/png");
$new_string = "";
$image_width = 80;
$image_height = 20;
$im = ImageCreate($image_width, $image_height);
$white = ImageColorAllocate($im, 255, 255, 255);
$gray = ImageColorAllocate($im, 192, 192, 192);
$red = ImageColorAllocate($im, 255, 0, 0);
srand((double)microtime()*1000000);
$string = md5(rand(0,9999));
$new_string = substr($string, 19, 6);
@$_SESSION['code'] = $new_string;
ImageFill($im, 0, 0, $white);
$i =0;
for ($i=0; $i <= $image_height; $i = $i + 10)
    ImageLine($im, 0, $i, $image_width, $i, $gray);
for ($i=0; $i <= $image_width; $i = $i + 10)
    ImageLine($im, $i, 0, $i, $image_height, $gray);

ImageLine($im, 0, $image_height-1, $image_width, $image_height-1, $gray);
ImageLine($im, $image_width-1, 0, $image_width-1, $image_height, $gray);
ImageString($im, 5, 15, 2, $new_string, $red);
ImagePNG($im);
?>