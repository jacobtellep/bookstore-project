<?php

// did not finish this page. Had trouble with deconstructing the json object properly to be used on the page.

session_start();

include("connectdb.php");
$customer_name = trim($_SESSION['full_name']);

$sql = "SELECT * FROM orders WHERE customer_name = '$customer_name'";

if (!empty($_SESSION['loggedin'])) {
    $result = mysqli_query($mysqli, $sql);
    $success = "Retrieved customers orders";
} else {
    $cart_content_err = "Error retrieving orders";
    return;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php include("nav.php"); ?>
    <?php
    $orderArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $orderArray[] = $row;
        foreach ($orderArray as $x => $x_value) {
            foreach ($x_value as $y => $y_value) {
                echo "<br>";
                //echo $y . "<br>";
                echo "<br>";
                echo $y_value . "<br>";
            }
        }
    }


    ?>
</body>

</html>