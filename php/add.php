<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first.";
	header('location: login.php');
}
else {
	require('db.php');

	if($_SERVER['REQUEST_METHOD'] != 'GET')
		die('Invalid HTTP method!');
	else
		$bookid = $_GET['bookid'];

	$username = $_SESSION['username'];

	//query1
	$sql_id = "SELECT * FROM users WHERE username = '$username'";
	$result_id = mysqli_query($link, $sql_id);
	$row_id = mysqli_fetch_array($result_id, MYSQLI_ASSOC);

	$user = $row_id['id'];

	//query2
	$check = "SELECT * FROM list WHERE user_id = $user AND book_id = $bookid";

	$result = mysqli_query($link, $check);

	if (!mysqli_num_rows($result)) {

		//query3
		$add = "INSERT INTO list (user_id, book_id) VALUES ($user, $bookid)";
		
		mysqli_query($link, $add);
		$_SESSION['userid'] = $user;
		$_SESSION['confirm'] = "Add to your list successfully.";
	}
	else {
		$_SESSION['confirm'] = "This book is already in your list.";
	}
	header("location: mylist.php");
}
?>