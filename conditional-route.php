<?php if (isset($_SESSION['loggedin'])) {
                        echo 'logout.php';
                    } else {
                        echo 'login.php';
                    }
