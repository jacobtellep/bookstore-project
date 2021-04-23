<?php
//src: https://codewithawa.com/posts/image-upload-using-php-and-mysql-database
// Create database connection
include("connectdb.php");


// If upload button is clicked ...



$select = "SELECT * FROM books;";
// execute query
$books = mysqli_query($mysqli, $select);

if (isset($_POST['delete'])) {

    $choose_image = mysqli_real_escape_string($mysqli, $_POST['choose_delete']);

    $sql = "DELETE FROM books WHERE title='$choose_image'";


    // execute query
    mysqli_query($mysqli, $sql);
    echo "<h1>Book Deleted</h1>";
    $books = mysqli_query($mysqli, $select);
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Upload</title>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/a2ccfb5bd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles.css">
    <style type="text/css">
        .wrapper {
            padding: 20px;

        }

        .center {
            margin: auto;
            width: 15%;
            /* border: .5px solid black; */
            padding: 10px;

        }

        input {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <div>
        <select name="choose_delete">
            <?php
            while ($row = mysqli_fetch_array($books)) {
                echo "<option>" . $row['title'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <button style="margin-top: 20px;" class="banner-btn" type="submit" name="delete">Delete Book</button>
    </div>
    </form>
    </div>
    <?php include("cart.php"); ?>
    <script src="./app.js"></script>
</body>

</html>