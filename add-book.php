<?php
//src: https://codewithawa.com/posts/image-upload-using-php-and-mysql-database
// Create database connection
include("connectdb.php");

// Initialize message variable
$success = $title_error = $price_error = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    //https://www.w3schools.com/php/php_file_upload.asp
    $image_name = $_FILES['image']['name'];
    // Get text
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);

    // image file directory
    $image_path = "../uploads/images/" . basename($image);
    //In any server, you cannot just upload files
    //You need to create a folder where you can save data
    //For CS IS server, we have defined two folder for you to save data 
    //Check ecampus

    $sql = "INSERT INTO books (title, price, image) VALUES ('$title', '$price', '$image_path')";


    // execute query
    // check to make sure that title and price are not empty before trying to send to the database
    if (!empty($_POST['title']) && !empty($_POST['price'])) {
        mysqli_query($mysqli, $sql);
        $success = "Successfully added a book.";
    } else {
        $title_error = "Please enter a book title.";
        $price_error = "Please enter a price.";
        return;
    }
}
