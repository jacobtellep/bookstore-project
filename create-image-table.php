<?php

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
    $sql="CREATE TABLE IF NOT EXISTS `images` (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(200) NOT NULL,
        `image` longtext NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	//$sql = "CREATE TABLE imageTable (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, testField VARCHAR (75))";
	$res = mysqli_query($mysqli, $sql);

	if ($res === TRUE) {
	   	echo "";
	} else {
		printf("Could not create table: %s\n", mysqli_error($mysqli));
	}
}
?>