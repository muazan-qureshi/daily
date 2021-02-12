<?php
session_start();
if (isset($_SESSION['logged'])) {
	if ($_SESSION['logged'] == 'admin') {
		header('location:admin.php');
	} elseif ($_SESSION['logged'] == 'manager') {
		header('location:manager.php');
	} elseif ($_SESSION['logged'] == 'customer') {
		header('location:customer.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<form class="form" method="POST" action="islogin.php">
		<label>Username</label>
		<input type="text" name="username">
		<br>
		<label>Password</label>
		<input type="password" name="password">
		<br>
		<button type="submit" name="btn">
			Login
		</button>
	</form>
	
</body>

</html>
<?php

if (isset($_GET['error'])) {
	// $error =  $_GET['error'];
	echo '<span style="color:crimson;">'.$_GET['error'].'</span>';
	

}
?>