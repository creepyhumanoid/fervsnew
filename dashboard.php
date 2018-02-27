<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 <div class="card col-md-2" style="margin-left: 300px; margin-top: 10px; background-color: #6666ff;"><i class="fa fa-automobile fa-stack-1x" style="font-size: 50pt; text-align: right;"></i>
  <div class="card-block">
    <h3 class="card-title">All Vehicles</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles`");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: #00e600;"><i class="fa fa-check fa-stack-1x" style="font-size: 50pt; text-align: right;"></i>
  <div class="card-block">
    <h3 class="card-title">Registered</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `status_id`=1");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: #ffff33;"><i class="fa fa-trash-o fa-stack-1x" style="font-size: 50pt; text-align: right;"></i>
  <div class="card-block">
    <h3 class="card-title">Archived</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `status_id`=2");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-2" style="margin-left: 20px; margin-top: 10px; background-color: #bf40bf;"><i class="fa fa-truck fa-stack-1x" style="font-size: 50pt; text-align: right;"></i>
  <div class="card-block">
    <h3 class="card-title">Vehicle Types</h3>
    <?php  
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$result = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tbltypes`");
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		echo "<h1 class='card-subtitle mb-2 text-muted'>".$count."</h1>";
    ?>
  </div>
</div>
<div class="card col-md-4" style="width: 60em; margin-left: 300px; margin-top: 10px; background-color: white; height: 341px;">
  <div class="card-block">
    <h3 class="card-title">Vehicle Status</h3>
    <canvas id="pie-chart" width="400" height="250"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$aresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `status_id`=2");
		$arow = mysqli_fetch_array($aresult);
		$acount = $arow['count'];

		$rresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `status_id`=1");
		$rrow = mysqli_fetch_array($rresult);
		$rcount = $rrow['count'];
    ?>
	<script>
		var ar = "<?php echo $acount; ?>";
		var reg = "<?php echo $rcount; ?>";
		new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Registered", "Archived"],
      datasets: [{
        backgroundColor: ["#8e5ea2","#3cba9f"],
        data: [reg,ar]
      }]
    },
    options: {
      title: {
        display: true
      }
    }
});
	</script>
  </div>
</div>
<div class="card col-md-5" style="width: 35em; margin-left: 1px; margin-top: 10px; background-color: white;">
  <div class="card-block">
    <h3 class="card-title">Vehicle Owners</h3>
    <canvas id="pie-charta" width="400" height="250"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
    	$femresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `gender_id`=1");
		$femrow = mysqli_fetch_array($femresult);
		$femcount = $femrow['count'];

		$maleresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `gender_id`=2");
		$malerow = mysqli_fetch_array($maleresult);
		$malecount = $malerow['count'];
    ?>
	<script>
	var fem = "<?php echo $femcount; ?>";
	var male = "<?php echo $malecount; ?>";
	new Chart(document.getElementById("pie-charta"), {
    type: 'pie',
    data: {
      labels: ["Female","Male"],
      datasets: [{
        backgroundColor: ["#c45850","#3e95cd"],
        data: [fem,male]
      }]
    },
    options: {
      title: {
        display: true,
      }
    }
});
	</script>
  </div>
</div>
<div class="card col-md-9" style="width: 65.5em; margin-left: 300px; margin-top: 10px; background-color: white;">
  <div class="card-block">
    <h3 class="card-title">Vehicle Types</h3>
    <canvas id="bar" width="400" height="100"></canvas>
    <?php
    	$con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');

    	$carresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=1");
		$carrow = mysqli_fetch_array($carresult);
		$carcount = $carrow['count'];

		$jeepresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=2");
		$jeeprow = mysqli_fetch_array($jeepresult);
		$jeepcount = $jeeprow['count'];

		$motorresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=3");
		$motorrow = mysqli_fetch_array($motorresult);
		$motorcount = $motorrow['count'];

		$suvresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=4");
		$suvrow = mysqli_fetch_array($suvresult);
		$suvcount = $suvrow['count'];

		$trikeresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=5");
		$trikerow = mysqli_fetch_array($trikeresult);
		$trikecount = $trikerow['count'];

		$truckresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=6");
		$truckrow = mysqli_fetch_array($truckresult);
		$truckcount = $truckrow['count'];

		$vanresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=7");
		$vanrow = mysqli_fetch_array($vanresult);
		$vancount = $vanrow['count'];

		$ownresult = mysqli_query($con, "SELECT COUNT(*) AS `count` FROM `tblvehicles` WHERE `type_id`=8");
		$ownrow = mysqli_fetch_array($ownresult);
		$owncount = $ownrow['count'];
    ?>
	<script>
	var ctx = document.getElementById("bar").getContext('2d');
	var car = "<?php echo $carcount; ?>";
	var jeep = "<?php echo $jeepcount; ?>";
	var motor = "<?php echo $motorcount; ?>";
	var suv = "<?php echo $suvcount; ?>";
	var trike = "<?php echo $trikecount; ?>";
	var truck = "<?php echo $truckcount; ?>";
	var van = "<?php echo $vancount; ?>";
	var own = "<?php echo $owncount; ?>";
	var line = new Chart(ctx, {
	    type: 'bar',
	    data: {
	        labels: ["Car", "Jeep", "Motor", "SUV", "Trike", "Truck", "Van", "Owner"],
	        datasets: [{
	            data: [car, jeep, motor, suv, trike, truck, van, own],
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)',
	                'rgba(250, 159, 64, 0.2)',
	                'rgba(100, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)',
	                'rgba(250, 159, 64, 0.2)',
	                'rgba(100, 159, 64, 0.2)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	    	legend: {
            display: false
         },
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
	</script>
  </div>
</div>
<?php include 'footer.html'; ?>