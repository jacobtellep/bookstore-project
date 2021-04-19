<?php

session_start();

if (isset($_SESSION['loggedin'])) {
    return;
}

// Include config file
require_once "connectdb.php";

// Define variables and initialize with empty values
$full_name = $email = $password = $confirm_password = $role = "";
$full_name_err = $email_err = $password_err = $confirm_password_err = $role_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //validate full name
    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Please enter your name.";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    // Validate username
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Error. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    //validate role
    if (empty(trim($_POST["role"]))) {
        $role_err = "Please select a role.";
    } else {
        $role = trim($_POST["role"]);
    }

    // Check input errors before inserting in database
    if (empty($full_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_full_name, $param_email, $param_password, $param_role);

            // Set parameters
            $param_full_name = $full_name;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_role = $role;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: login.php");
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
    <title>Book Store</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./styles.css">
    <style>
    .wrapper {
        width: 350px;
        padding: 20px;
    }

    input {
        display: flex;
        justify-content: center;
    }

    select {
        display: flex;
        justify-content: center;
        width: 172px;
    }
    </style>
</head>

<body>
    <?php include('nav.php'); ?>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name"
                    class="form-control <?php echo (!empty($full_name_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email"
                    class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"
                    class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option selected="selected" class="form-control">user</option>
                    <option class="form-control">admin</option>
                </select>
            </div>
            <div class="form-group">
                <input style="margin-top: 10px;" type="submit" class="banner-btn" value="Submit">
            </div>
            <p>Already have an account? <a style="color: var(--primaryColor);" href="login.php">Login here</a>.</p>
        </form>
    </div>

    <?php
    include("cart.php");
    ?>
    <script src="./app.js"></script>
</body>

</html>