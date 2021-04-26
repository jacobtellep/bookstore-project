<?php
// check the role of the user. If the user is an admin show the admin button on the nav bar
// if the user is a user, show the orders button
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
<<<<<<< HEAD
        echo "<a href=\"admin-options.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ADMIN</a>";
    } else if ($_SESSION['role'] === 'user') {
=======
        echo "<a href=\"image-upload-form.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ADMIN</a>";
    } else if($_SESSION['role'] === 'user') {
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
        echo "<a href=\"orders.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ORDERS</a>";
    }
}
