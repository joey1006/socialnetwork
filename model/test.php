<?php

$source = '../foto/clickmap.png';
function isitbase64($data)
{
	if ( base64_encode(base64_decode($data)) === $data){
  	  	return true;
	} else {
   		 return false;
	}
}

$data=file_get_contents($source);
if(isitbase64($data))
{
	$data = base64_decode($data);
}



$im = imagecreatefromstring($data);
if ($im !== false) {
    imagejpeg($im,"nieuwe.jpg");
    imagedestroy($im);
}
else {
    echo 'An error occurred.';
}
echo "alles is goed gegaan, je nieuwe jpg heet nieuwe.jpg";
?>