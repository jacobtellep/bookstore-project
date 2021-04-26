<?php
// check the role of the user. If the user is an admin show the admin button on the nav bar
// if the user is a user, show the orders button
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        echo "<a href=\"admin-options.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ADMIN</a>";
    } else if ($_SESSION['role'] === 'user') {
        echo "<a href=\"orders.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ORDERS</a>";
    }
}
