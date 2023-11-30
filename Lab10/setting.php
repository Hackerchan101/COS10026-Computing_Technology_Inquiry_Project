<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104487115"; // your user name
	$pwd = "cnffwvw4b2"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s104487115_db"; // your database

    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );
?>
	