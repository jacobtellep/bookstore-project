<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
    <style>
        .wrapper {
            padding: 20px;
        }

        .center {
            margin: auto;
            width: 15%;
            padding: 10px;

        }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>

<<<<<<< HEAD

    <div class="wrapper center">

        <h1><?php echo "Hello " . $_SESSION["full_name"] . ".<br>" . " Your role is " . $_SESSION["role"] . "." ?></h1>

=======

    <div class="wrapper center">

        <h1><?php echo "Hello " . $_SESSION["full_name"] . ".<br>" . " Your role is " . $_SESSION["role"] . "." ?></h1>

>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
        <div style="margin-top: 40px;">
            <a href="./logout.php" class="banner-btn">Logout</a>
        </div>


    </div>
<<<<<<< HEAD
    <?php
    include("hidden-products.php");
    ?>
    <?php include("cart.php"); ?>
    <?php include("footer.php"); ?>
=======

    <?php include("cart.php"); ?>
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
    <script src="./app.js"></script>
</body>

</html>