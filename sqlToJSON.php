<?php

//fetch table rows from mysql db
$sql = "select * from books";
$result = mysqli_query($mysqli, $sql) or die("Error in Selecting " . mysqli_error($mysqli));

//create an array
$bookarray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $bookarray[] = $row;
}

//write to json file
$fp = fopen('../uploads/documents/books.json', 'w');
fwrite($fp, json_encode($bookarray));
fclose($fp);

//close the db connection
mysqli_close($mysqli);
