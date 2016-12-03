<?php

// I need to work out how to get the $title in here
// as the header is now image/gif it doesnt work with html
// just displays an image, so I can't get stuff in somehow
// only by a parameter.. hmm

header("Content-type:image/gif");
  
// make a canvas the size of the label
$img = imagecreate(1006,122);

// import the label template image as a basis?
$img = imagecreatefromgif("images/label.gif");

// setup some colour values, temp ones
$white = imagecolorallocate($img,255,255,255);
$black = imagecolorallocate($img,0,0,0);
$red = imagecolorallocate($img,255,0,0);


/// ? ?? I must be able to get it somehow
$title = $_GET['title'];
$title = "Wow - I can draw on the label image";
$title = strtoupper($title);
imagestring($img,60,503,60,$title,$black);
// this isnt very good? eh?, why is the font not growing?

// 'save' it out as a gif
imagegif($img);

// destroy the handle
imagedestroy($img);

?>
