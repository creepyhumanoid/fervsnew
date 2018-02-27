<?php
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username == "admin" || $password == "admin"){
			echo "<script type='text/javascript'> window.location.href='dashboard.php';</script>";
			session_start();
			$_SESSION['admin'] = $username['admin'];
		}
		else{
			$message = "Invalid Username or pass!";
			echo "<script type='text/javascript'>alert('$message'); window.location.href='login.php';</script>";
		}
	}