<?php 
	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
	if (isset($_POST['firstname'])) {
		$firstname = $_POST['firstname'];
		$mi = $_POST['mi'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$plate = $_POST['plate'];
		$type = $_POST['type'];
		$genderr = $_POST['genderr'];
		$id = $_POST['id'];

		$update = "UPDATE `tblvehicles` SET `owner_fn`='$firstname',`owner_mi`='$mi',`owner_ln`='$lastname',`owner_age`='$age',`gender_id`='$genderr',`type_id`='$type',`plate_number`='$plate'  WHERE `ID`='$id'";
		$query = mysqli_query($con, $update);
		$msg = "Vehicle already updated!";
		echo "<script>alert('$msg'); window.location.href='rvehicles.php'</script>";
		#var_dump($update);
	}