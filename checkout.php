<?php


include("connectdb.php");

if (isset($_POST['checkout-btn'])) {
    $cart_empty_error = "";
    if (empty($_POST['checkout-info'])) {
        $cart_empty_error = "Your Cart is empty.";
        return;
    }
    $string_checkout_info = $_POST['checkout-info'];
    // //var_dump($checkout_info);
    // // $checkout_info = trim($checkout_info, '[]');
    // // $checkout_info = "{" . $checkout_info . "}";
    // echo $string_checkout_info;
    // $checkout_info = json_decode(trim($string_checkout_info), true);
    // //var_dump($checkout_info);
    // foreach ($checkout_info as $i => $i_value) {
    //     foreach ($i_value as $j => $j_value) {
    //         echo $j . " : " . $j_value . "<br>";
    //     }
    // }

    $cart_content = $string_checkout_info;
    $customer_name = trim($_SESSION['full_name']);

    $sql = "INSERT INTO orders (cart_content, customer_name) VALUES ('$cart_content', '$customer_name')";

    if (!empty($_SESSION['loggedin'])) {
        mysqli_query($mysqli, $sql);
        $success = "successful order creation";
    } else {
        $cart_content_err = "Cart is empty";
        return;
    }
}



mysqli_close($mysqli);
