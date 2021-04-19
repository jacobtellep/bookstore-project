<?php if(isset($_SESSION['role'])) {
include('conditional-padding-admin.php');
} else {
    echo "padding-right: 400px;";
}

?>