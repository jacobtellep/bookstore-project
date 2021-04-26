<?php
// change padding of the buttons depending on what role is logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        echo "padding-right: 350px;";
    } else {
        echo "padding-right: 350px;";
    }
}
