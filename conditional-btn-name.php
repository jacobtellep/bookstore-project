<?php
// check if the user is logged in or not and show either the login in button or logout button depending on if theyre logged in
if (isset($_SESSION['loggedin'])) {
    echo 'LOGOUT';
} else {
    echo 'LOGIN';
}
