<?php if (isset($_SESSION['loggedin'])) {
    echo 'LOGOUT';
} else {
    echo 'LOGIN';
}
