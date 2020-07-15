<?php
	$server = "localhost";
	$user = "root";
	$password = "password";
	$database = "project";

	$link = mysqli_connect($server, $user, $password, $database);

	mysqli_set_charset($link, "utf8");
?>
