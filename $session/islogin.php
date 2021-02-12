<?php
session_start();

if (isset($_POST['btn'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];


	if ($username != '' && $password != '') {
		if ($username == 'admin' && $password == '123') {
			$_SESSION['logged'] = $username;
			header('location:admin.php');
		}
		elseif ($username == 'manager' && $password == '123') {
			$_SESSION['logged'] = $username;
			header('location:manager.php');
		} elseif ($username == 'customer' && $password == '123') {
			$_SESSION['logged'] = $username;
			header('location:customer.php');
		} else {
			header('location:index.php?error=Invalid Username or Password');
		}
	} else {
		header('location:index.php?error=Username OR Password is Incorrect');
	}
}
