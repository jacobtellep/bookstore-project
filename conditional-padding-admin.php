<?php 
 if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        echo "padding-right: 350px;";
    } else {
        echo "";
    }
}
?>