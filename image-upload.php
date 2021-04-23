<?php
//src: https://codewithawa.com/posts/image-upload-using-php-and-mysql-database
// Create database connection
include("connectdb.php");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	// Get image name
	//https://www.w3schools.com/php/php_file_upload.asp
	$image = $_FILES['image']['name'];
	// Get text
	// $image_text = mysqli_real_escape_string($mysqli, $_POST['image_text']);

	// image file directory
	$target = "../uploads/images/" . basename($image);
	//In any server, you cannot just upload files
	//You need to create a folder where you can save data
	//For CS IS server, we have defined two folder for you to save data 
	//Check ecampus

	$sql = "INSERT INTO images (name) VALUES ('$image')";


	// execute query
	mysqli_query($mysqli, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "";
	} else {
		$msg = "Failed to upload image";
	}
	echo $msg;
}
