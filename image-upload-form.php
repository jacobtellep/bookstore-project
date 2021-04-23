<?php
// Initialize the session
session_start();


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
            width: 15%;
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
        <h1>Manage Books</h1><br>
        <form method="POST" action="image-upload-form.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>

                <input class="inputfile" type="file" name="image">

            </div>

            <div style="margin-top: 20px;">
                <label>Book Title: </label>
                <input style="width: 195px;" type="text" name="title">
            </div>
            <div style="margin-top: 20px;">
                <label>Book Price: </label>
                <input style="width: 195px;" type="text" name="price">
            </div>
            <div>
                <button style="margin-top: 20px;" class="banner-btn" type="submit" name="upload">Add Book</button>
            </div>
            <br>
            <div>
                <?php include("delete-book.php"); ?>
            </div>

        </form>
    </div>
    <?php include("cart.php"); ?>
    <script src="./app.js"></script>
</body>

</html>