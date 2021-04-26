<?php
// Initialize the session
session_start();
<<<<<<< HEAD
// checks if the logged in user is not an admin, if this is true, then the user is routed to the welcome page
if ($_SESSION['role'] !== 'admin') {
    header("Location: welcome.php");
}
=======
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Upload</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
    <style type="text/css">
        .wrapper {
            padding: 20px;

        }

        .center {
            margin: auto;
<<<<<<< HEAD
            width: 100%;
=======
            width: 15%;
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
            /* border: .5px solid black; */
            padding: 10px;

        }

        input {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <?php include("nav.php"); ?>

    <div class="wrapper center">
        <?php include("image-upload.php"); ?>
        <?php include("add-book.php"); ?>

        <?php include("sqlToJSON.php"); ?>
<<<<<<< HEAD
        <h1 style="padding-right: 50px;">Manage Books</h1><br>
        <h4 style="padding-right: 50px;">Add Book</h4>
        <br>
=======
        <h1>Manage Books</h1><br>
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
        <form method="POST" action="image-upload-form.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>

                <input class="inputfile" type="file" name="image">
<<<<<<< HEAD
                <span style="color: red;"><?php echo $msg; ?></span>
=======
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f

            </div>

            <div style="margin-top: 20px;">
                <label>Book Title: </label>
                <input style="width: 195px;" type="text" name="title">
<<<<<<< HEAD
                <span style="color: red;"><?php echo $title_error; ?></span>
=======
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
            </div>
            <div style="margin-top: 20px;">
                <label>Book Price: </label>
                <input style="width: 195px;" type="text" name="price">
<<<<<<< HEAD
                <span style="color: red;"><?php echo $price_error; ?></span>
            </div>
            <div>
                <button style="margin-top: 20px; width: 195px;" class="banner-btn" type="submit" name="upload">Add</button>
            </div>
            <br>
            <div>
                <hr>
                <br>
            </div>
            <div>
                <h4 style="padding-left: 60px;">Delete Book</h4>
                <br>
=======
            </div>
            <div>
                <button style="margin-top: 20px;" class="banner-btn" type="submit" name="upload">Add Book</button>
            </div>
            <br>
            <div>
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
                <?php include("delete-book.php"); ?>
            </div>

        </form>
    </div>
<<<<<<< HEAD
    <?php
    // hidden products are included so that the cart functions properly
    include("hidden-products.php");
    ?>
    <?php include("cart.php"); ?>
    <script src="./app.js"></script>
    <?php include("footer.php"); ?>
=======
    <?php include("cart.php"); ?>
    <script src="./app.js"></script>
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
</body>

</html>