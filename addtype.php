<?php
	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
	if (isset($_POST['type'])) {
		$type = $_POST['type'];

		$check = mysqli_query($con,"SELECT * FROM tbltypes WHERE `type`='$type'");
		$checkrows = mysqli_num_rows($check);
		if ($checkrows>0) {
			$exist = "Vehicle type already exists!";
			echo "<script type='text/javascript'> alert('$exist'); window.location.href='types.php';</script>";
		}
		else{
			$insert = "INSERT INTO `tbltypes`(`type`) VALUES ('$type')";
			$query = mysqli_query($con,$insert);
			$msg = "Vehicle Type already addded!";
			echo "<script type='text/javascript'> alert('$msg'); window.location.href='types.php';</script>";
		}
	}