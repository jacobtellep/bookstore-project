<?php
include('connectdb.php');

$sql = "CREATE TABLE IF NOT EXISTS users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, full_name VARCHAR(75), email VARCHAR (75), password VARCHAR(255), role VARCHAR(10));";
$res = mysqli_query($mysqli, $sql);
if ($res)
    echo "";
else
    echo "Cannot create table. <br>" . mysqli_error($mysqli);

// mysqli_close($mysqli);
