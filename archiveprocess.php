<?php
	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$update = "UPDATE `tblvehicles` SET `status_id`=2 WHERE `ID`='$id'";
		$query = mysqli_query($con,$update);
		$msg = "Vehicle already added to archive list!";
		echo "<script>alert('$msg'); window.location.href='rvehicles.php'</script>";
	}