<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,  maximum-scale=1" />
<!-- <meta http-equiv="refresh" content="1" > -->
	<title></title>
</head>
<body>

	

	

	<div class="uploadform">

		<h1>Social network</h1>
		<form name="myform" action="model/uploadmob.php" method="post" enctype="multipart/form-data">
		

		<div class="display-item-form">
		<input type="file" accept="image/*"  name="fileToUpload" id="fileToUpload">
		</div>
		<br>
		<div class="display-item-form">
		<p id="showCase" value="1">location:</p>
		<input type="text" name="Location" id="myInput" value="1">
		</div>
		<br>
		<div class="display-item-form">
		<input type="text" name="Uploader" placeholder="Type your name" required="">
		</div>
		<br>
		<div class="display-item-form">
		<input type="text" name="Title" placeholder="Type your title" required="">
		</div>
		<br>

		<input type="submit" value="Upload Image" name="submit">

		</form>
	</div>
	<?php
	include 'model/retrieve.php';
	?>

	

	
	
</body>
</html>