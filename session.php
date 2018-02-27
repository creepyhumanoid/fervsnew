<?php 
	session_start();
	if (!(isset($_SESSION['admin']))){
		$log = "You must be logged in first!";
		echo "<script type='text/javascript'>alert('$log'); window.location.href='login.php';</script>";
		exit();
	}
