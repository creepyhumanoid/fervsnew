<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>

<div class="card" style="width: 100rem; margin-left:20em; border: none; margin-top: 2%;">
	<div class="card-block">
		<h3>List of Deleted Vehicles</h3><br>
		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Owner's Name</th>
					<th>Owner's Age</th>
					<th>Owner's Gender</th>
					<th>Vehicle Type</th>
					<th>Plate Number</th>
					<th>Date Registered</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
		            $vehicles = "SELECT * FROM tblvehicles WHERE `status_id`=2";
		            $vehiclesquery = mysqli_query($con,$vehicles);
		            while ($con=mysqli_fetch_assoc($vehiclesquery)) {
						$conx = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');

						$date = strtotime($con['registered_at']);
						$date_registered = date('M d, Y',$date);

						$typeid = $con['type_id'];
						$seltype = "SELECT * FROM tbltypes WHERE `ID`='$typeid'";
						$typequery = mysqli_query($conx,$seltype);
						$fetchtype = mysqli_fetch_assoc($typequery);
						$vtype = $fetchtype['type'];

						$genderid = $con['gender_id'];
						$selgender = "SELECT * FROM tblgender WHERE `ID`='$genderid'";
						$genderquery = mysqli_query($conx,$selgender);
						$fetchgender = mysqli_fetch_assoc($genderquery);
						$genders = $fetchgender['gender'];

						$statusid = $con['status_id'];
						$selstatus = "SELECT * FROM tblstatus WHERE `ID`='$statusid'";
						$statusquery = mysqli_query($conx,$selstatus);
						$fetchstatus = mysqli_fetch_assoc($statusquery);
						$status = $fetchstatus['status'];

						$fullname = $con['owner_fn']." ".$con['owner_mi']." ".$con['owner_ln'];

						echo "<tr>";
						echo "<td>".$con['ID']."</td>";
						echo "<td>".$fullname."</td>";
						echo "<td>".$con['owner_age']."</td>";
						echo "<td>".$genders."</td>";
						echo "<td>".$vtype."</td>";
						echo "<td>".$con['plate_number']."</td>";
						echo "<td>".$date_registered."</td>";
						echo "<td>".$status."</td>";
						echo "<td>"."<button type='button' class='btn btn-success' data-target='#restore-".$con['ID']."' data-toggle='modal'>RESTORE</button>"."</td>";
						echo "</tr>";
				?>
			<div class="modal fade" id="restore-<?php echo $con['ID']; ?>">
  				<div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h4 class="modal-title">RESTORE</h4>
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
      					</div>
      					<div class="modal-body" style="margin-top: 5%;">
         					<form role="form" id="contact-form" method="POST" action="restoreprocess.php">
            				<p>Do you really want this to restore?</p>
      						<div class="modal-footer">
						        <input type="hidden" name="id" id="id" value="<?php echo $con['ID']; ?>">
						        <button type="submit" class="btn btn-success">YES</button>
						        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
        						</form>
      						</div>
      					</div>
  					</div>
				</div>
			</div>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include 'footer.html'; ?>