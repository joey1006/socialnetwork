<?php

include "../db/connection.php";

$photoid = $_POST['photoid'];
$datum = date("Y-m-d-H-m");
$author = "you";
$comment = htmlentities($_POST['comment']);

echo $photoid;
echo $comment;


$sql = "INSERT INTO comments (comment,author,datum,photoid)
        VALUES ('$comment','$author','$datum','$photoid')";

$result = $mysqli->query($sql);

echo "<script> window.location='../index.php'</script>";

?>

