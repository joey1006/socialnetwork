<?php
// $photosarray = array();
include "../db/connection.php";



$target_dir = "../photos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_FILES['file'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	// header('Location: http://www.example.com/');
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        // array_push($photosarray,$_FILES["fileToUpload"]["tmp_name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$photo = basename( $_FILES["fileToUpload"]["name"]);

$uploader = $_POST["Uploader"];
$uploadtime = date("Y-m-d-H-i-s");

$sql = "INSERT INTO photos (img,uploader,uploadtime)
VALUES ('$photo','$uploader','$uploadtime')";
$result = $mysqli->query($sql);

echo "<script>alert('Successfully Added!!!'); window.location='../index.php'</script>";



?>