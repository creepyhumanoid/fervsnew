<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>

<div class="card" style="width: 100rem; margin-left:20em; border: none; margin-top: 2%;">
	<div class="card-block">
		<h3>List of Registered Vehicles</h3><br>
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
		            $vehicles = "SELECT * FROM tblvehicles WHERE `status_id`=1";
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
						echo "<td>"."<button type='button' class='btn btn-info' data-target='#edit-".$con['ID']."' data-toggle='modal'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button><button type='button' class='btn btn-danger' data-target='#archive-".$con['ID']."' data-toggle='modal'>ARCHIVE</button>"."</td>";
						echo "</tr>";
				?>
			<!--Archive modal-->
			<div class="modal fade" id="archive-<?php echo $con['ID']; ?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title">ARCHIVE</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body" style="margin-top: 5%;">
			         <form role="form" id="contact-form" method="POST" action="archiveprocess.php">
			            <p>Do you really want this to add in archive list?</p>
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
			<div class="modal fade" id="edit-<?php echo $con['ID']; ?>">
  			 <div class="modal-dialog">
    		  <div class="modal-content">
      			<div class="modal-header">
        			<h4 class="modal-title">EDIT</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
      			</div>
      			<div class="modal-body" style="margin-top: 5%;">
         			<form role="form" id="contact-form" method="POST" action="editprocess.php">
                	<div class="form-group">
                		<label for="firstname">First Name</label>
                   		<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $con['ID']; ?>">
                        		<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $con['owner_fn']; ?>">
                    		</div>
                		</div>

                	<div class="form-group">
                		<label for="firstname">Middle Initial</label>
                    	<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="mi" value="<?php echo $con['owner_mi']; ?>" placeholder="Middle Initial" name="mi">
                    		</div>
                		</div>
	                <div class="form-group">
	                	<label for="firstname">Last Name</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="text" class="form-control" id="lastname" value="<?php echo $con['owner_ln']; ?>" placeholder="Last Name" name="lastname">
	                    </div>
	                </div>  
	                <div class="form-group">
	                	<label for="firstname">Age</label>
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
	                        <input type="number" class="form-control" id="age" value="<?php echo $con['owner_age']; ?>" placeholder="Age" name="age">
	                    </div>
	                </div>
	                <div class="form-group">
                		<label for="plate">Plate Number</label>
                   		<div class="input-group">
                        	<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        		<input type="text" class="form-control" id="plate" placeholder="plate" name="plate" value="<?php echo $con['plate_number']; ?>">
                    		</div>
                		</div>
	                <div class="form-group">
	                  <label for="sel1">Select Gender:</label>
	                  <select class="form-control" id="genderr" name="genderr" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
	                      $selgender = "SELECT * FROM tblgender";
	                      $genderquery = mysqli_query($con,$selgender);
	                      while ($con=mysqli_fetch_assoc($genderquery)){
	                        echo "<option  value='".$con['ID']."'>".$con['gender']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div>  
	                <div class="form-group">
	                  <label for="sel1">Select Vehicle Type:</label>
	                  <select class="form-control" id="type" name="type" style="height: 10%;">
	                    <?php
	                      $con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
	                      $seltype = "SELECT * FROM tbltypes";
	                      $typequery = mysqli_query($con,$seltype);
	                      while ($con=mysqli_fetch_assoc($typequery)){
	                        echo "<option  value='".$con['ID']."'>".$con['type']."</option>";
	                      }
	                    ?>
	                  </select>
	                </div>
	            	 <button type="submit" class="btn btn-default">Submit</button>
	         		 </form>   
	      			</div>
				    <div class="modal-footer">
				    	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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