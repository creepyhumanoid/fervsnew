<?php
$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
if (isset($_POST['firstname'])) {
	$firstname = $_POST['firstname'];
	$mi = $_POST['mi'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$plate = $_POST['plate'];
	$type = $_POST['type'];

	$check = mysqli_query($con,"SELECT * FROM tblvehicles WHERE `plate_number`='$plate'");
	$checkrows = mysqli_num_rows($check);
	if ($checkrows>0) {
		$exist = $plate." already exists!";
		echo "<script type='text/javascript'> alert('$exist'); window.location.href='new.php';</script>";
	}
	else{
		$insert = "INSERT INTO `tblvehicles`(`owner_fn`, `owner_mi`, `owner_ln`, `owner_age`, `type_id`, `plate_number`, `registered_at`,`status_id`,`gender_id`) VALUES ('$firstname','$mi','$lastname','$age','$type','$plate',CURDATE(),1,'$gender')";
		$query = mysqli_query($con, $insert);
		$msg = $plate." already added!";
		echo "<script>alert('$msg'); window.location.href='new.php'</script>";
	}
}