<?php 
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        echo "<a href=\"admin.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ADMIN</a>";
    } else if($_SESSION['role'] === 'user') {
        echo "<a href=\"orders.php\" style=\"text-decoration: none; font-weight: bold; color: black; padding-right: 10px;\">ORDERS</a>";
    }
}?>