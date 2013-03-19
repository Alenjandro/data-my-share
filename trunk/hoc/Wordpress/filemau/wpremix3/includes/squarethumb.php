<?php
/*
AUTHOR: Noah Winecoff (http://www.findmotive.com)
DATE: 8/29/2006
*/

function createThumb($source, $dest) {

	$thumb_size = 100;

	$size = getimagesize($source);
	$width = $size[0];
	$height = $size[1];

	if($width > $height) {
		$x = ceil(($width - $height) / 2 );
		$width = $height;
	} elseif($height > $width) {
		$y = ceil(($height - $width) / 2);
		$height = $width;
	}

	$new_im = ImageCreatetruecolor($thumb_size, $thumb_size);
	$im = imagecreatefromjpeg($source);
	imagecopyresampled($new_im, $im, 0, 0, $x, $y, $thumb_size, $thumb_size, $width, $height);
	imagejpeg($new_im, $dest, 100);
}
?>
