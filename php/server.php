<?php
session_start();

require('db.php');

$username = "";
$errors = array();

//Signup
if(isset($_POST['user_signup'])){
	//receive all input values
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);

	//validation
	if (empty($username)) {array_push($errors,"Username is required!");}
	if (empty($password_1)) {array_push($errors, "Password is required!");}
	if (empty($password_2)) {array_push($errors, "Confirm password is required!");}
	if (strlen($password_1) < 6) {array_push($errors, "Password at least 6 chracters!");}
	if ($password_1 != $password_2) {
		array_push($errors, "Passwords do not match!");
	}

	//check if username already exists or not
	$username_check = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($link, $username_check);
	$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

	//if username exists
	if ($user) {
		array_push($errors, "Sorry, that username already exists.");
	}

	//let user sign up if there is no error
	if (!count($errors)) {
		$password = md5($password_1); //encrypt the password

		$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

		mysqli_query($link, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are logged in successfully!";
		header('Location: mylist.php');
	}
}

//Login
if (isset($_POST['user_login'])) {
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	if (empty($username)) {array_push($errors,"Username is required.");}
	if (empty($password)) {array_push($errors, "Password is required.");}

	if (!count($errors)) {
		$password = md5($password); //encrypt the input password

		$check = "SELECT * FROM users WHERE username='$username'";

		$result = mysqli_query($link, $check);

		if (!mysqli_num_rows($result)) {
			array_push($errors, "This account does not exist. Please sign up first.");
		}
		else {
			$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

			$result = mysqli_query($link, $sql);

			if (mysqli_num_rows($result)) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are logged in successfully!";
				header('location: mylist.php');
			} else {
				array_push($errors, "Incorrect username or password. Try again!");
			}
		}
	}
}

//reset
if (isset($_POST['user_reset'])) {
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$password_1 = mysqli_real_escape_string($link, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($link, $_POST['password_2']);

	if (empty($username)) {array_push($errors,"Username is required.");}
	if (empty($password_1)) {array_push($errors, "Password is required.");}
	if (empty($password_2)) {array_push($errors, "Confirm password is required.");}
	if (strlen($password_1) < 6) {array_push($errors, "Password at least 6 characters.");}
	if ($password_1 != $password_2) {
		array_push($errors, "Passwords do not match.");
	}
	
	if (!count($errors)) {
		$password = md5($password_1); //encrypt the input password

		$check = "SELECT * FROM users WHERE username='$username'";

		$result = mysqli_query($link, $check);

		if (!mysqli_num_rows($result)) {
			array_push($errors, "This account does not exist. Please sign up first.");
		}
		else {
			$sql = "UPDATE users SET password = '$password' WHERE username = '$username'";

			mysqli_query($link, $sql);
			array_push($errors,"Reset password successfully! You can login now.");
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged in successfully!";
		}
	}
}
?>