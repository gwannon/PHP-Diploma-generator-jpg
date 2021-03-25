<?php
// Abrimos la imagen
$img = imagecreatefromjpeg('./diploma.jpg');

//NOMBRE ------------------------
//-------------------------------
$txt = mb_strtoupper($_REQUEST['name']);
$font = "./fonts/Dosis-Regular.ttf";

//Centramos Texto
$image_width = imagesx($img);  
$text_box = imagettfbbox(160, 0,$font,$txt);
$text_width = $text_box[2]-$text_box[0];
$x = ($image_width/2) - ($text_width/2);

//Escribimos texto
$black = imagecolorallocate($img, 0, 0, 0);
imagettftext($img, 160, 0, $x, 960, $black, $font, $txt);

//TÍTULO ------------------------
//-------------------------------
$txt = mb_strtoupper($_REQUEST['title']);
$font = "./fonts/Dosis-Regular.ttf";

//Centramos Texto
$text_box = imagettfbbox(80, 0,$font,$txt);
$text_width = $text_box[2]-$text_box[0];
$x = ($image_width/2) - ($text_width/2);

//Escribimos texto
$black = imagecolorallocate($img, 0, 0, 0);
imagettftext($img, 80, 0, $x, 1300, $black, $font, $txt);

//Mostramos imagen
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);

