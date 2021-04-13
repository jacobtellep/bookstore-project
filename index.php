<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>

    <?php include("connection.php"); ?>
    <?php include("sqlToJSON.php"); ?>

    <?php
    include("nav.php");
    ?>

    <?php
    include("hero.php");
    ?>

    <?php
    include("products.php");
    ?>

    <?php
    include("cart.php");
    ?>



    <script src="./app.js"></script>
</body>

</html>