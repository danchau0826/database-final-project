<?php
	session_start();

	require('db.php');

	if($_SERVER['REQUEST_METHOD'] != 'GET')
		die('Invalid HTTP method!');
	else
		$id = $_GET['bookid'];

	$user = $_SESSION['userid'];

	//query5
	$sql = "DELETE FROM list WHERE book_id = $id AND user_id = $user";

	mysqli_query($link, $sql);
	$_SESSION['confirm'] = "Delete from your list successfully.";

	header('Location: mylist.php');
?>