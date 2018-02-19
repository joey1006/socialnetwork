

<?php
// $photosarray = array();
include "../db/connection.php";



$target_dir = "../photos/";
$target_file = $target_dir . sha1(time()."JOEYszout").'.jpg'; //$_

	echo "<pre>";
var_dump($_FILES);
	echo "</pre>";
if (isset($_FILES["fileToUpload"]["error"]) ) {
	$source = $_FILES["fileToUpload"]["tmp_name"];
		function isitbase64($data)
		{
			if ( base64_encode(base64_decode($data)) === $data){
		  	  	return true;
			} else {
		   		 return false;
			}
		}
		echo " <br> werkt 1 <br>";
		$data=file_get_contents($source);
		if(isitbase64($data))
		{
			$data = base64_decode($data);
		}
		echo " <br> werkt 2 <br>";
		$im = imagecreatefromstring($data);
		if ($im !== false) {
		    imagejpeg($im,$target_file);
		    imagedestroy($im);
		    echo " <br> werkt 3 <br>";
		}
		else {
		    echo 'An error occurred.';
		}
		echo "alles is goed gegaan, je nieuwe jpg heet new" . $target_file;
	}

$photo = basename($target_file);

$location = $_POST["Location"];
$uploader = $_POST["Uploader"];
$title 	  = $_POST["Title"];
$uploadtime = date("Y-m-d-H-i-s");

$sql = "INSERT INTO photos (img,uploader,title,uploadtime,location)
VALUES ('$photo','$uploader','$title','$uploadtime','$location')";
$result = $mysqli->query($sql);

echo "<script> window.location='../index.php'</script>";

?>

