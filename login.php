<?php
// source for login page help https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}


require_once "connectdb.php";


// Define variables and initialize with empty values
$full_name = $email = $password = $role = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Prepare a select statement

        $sql = "SELECT id, full_name, email, password, role FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);


                // Check if email exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $full_name, $email, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["full_name"] = $full_name;
                            $_SESSION["role"] = $role;


                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($mysqli);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./styles.css">
    <style>
        .wrapper {
            padding: 20px;
        }

<<<<<<< HEAD
        .center2 {
=======
        .center {
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
            margin: auto;
            width: 15%;
            padding: 10px;

        }

        input {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include('nav.php'); ?>
<<<<<<< HEAD
    <div class="wrapper center2">
=======
    <div class="wrapper center">
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
        <h2>Login</h2><br>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
<<<<<<< HEAD
                <div>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <span style="color: red;"><?php echo $email_err; ?></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password">
                    <span style="color: red;" class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div>
                    <input style="margin-top: 10px;" type="submit" class="banner-btn" value="Login">
                </div>

                <p>Don't have an account? <a style="color: var(--primaryColor);" href="register.php">Sign up now</a>.</p>
            </div>
=======
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <span><?php echo $email_err; ?></span>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div>
                <input style="margin-top: 10px;" type="submit" class="banner-btn" value="Login">
            </div>

            <p>Don't have an account? <a style="color: var(--primaryColor);" href="register.php">Sign up now</a>.</p>
>>>>>>> 44f55b0f7a12405a5001b6a366a27a24d735d34f
        </form>
    </div>
    <?php
    include("hidden-products.php");
    ?>
    <?php
    include("cart.php");
    ?>

    <script src="./app.js"></script>
    <?php include("footer.php"); ?>
</body>

</html>