<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Options</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">

    <style>
        .center {
            margin: auto;
            width: 15%;
            padding: 10px;

        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>
    <div class="center" style="margin-top: 50px;">
        <h1>Admin Options</h1>

        <div style="margin-top: 50px;">
            <a href="image-upload-form.php" style="text-decoration: none; text-align:center;" class="clear-cart banner-btn">manage books</a>
        </div>

        <div style="margin-top: 50px;">
            <a href="add-admin.php" style="text-decoration: none; text-align:center; margin-top:220px;" class="clear-cart banner-btn">Add Admin</a>
        </div>
    </div>
    <?php
    include("hidden-products.php");
    ?>
    <?php
    include("cart.php");
    ?>
    <script src="./app.js"></script>
    <?php include("footer.php"); ?>
</body>

</html>