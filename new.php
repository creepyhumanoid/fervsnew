<?php 
	include 'session.php';
	include 'header.html';
	include 'sidebar.php';
?>
<style type="text/css">
html,body{
	height: 100%;
}
#success_message{ display: none;}
</style>
<style type="text/css">
  @import "compass/css3";
body {
  background-color: white;
}
.form-box {
  width: 50%;
  margin: auto;
  padding-top: 20px;
}
.form-box h1 {
  text-align: center;
  font-weight: bold;
  text-transform: uppercase;
  color: tomato;
}
.form-box h1 span {
  font-weight: lighter;
}

</style>
  <div class="container">
  <div class="row">
    <div class="form-box">
        <h2 style="color: gray;">Registration Form</h2>
          <form role="form" id="contact-form" method="POST" action="addnew.php">
            <!-- name field -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="firstname" value="" placeholder="First Name" name="firstname">
                    </div>
                </div>
            <!-- email field -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="mi" value="" placeholder="Middle Initial" name="mi">
                    </div>
                </div>
            <!-- phone field -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" class="form-control" id="lastname" value="" placeholder="Last Name" name="lastname">
                    </div>
                </div>  
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="number" class="form-control" id="age" value="" placeholder="Age" name="age">
                    </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Select Gender:</label>
                  <select class="form-control" id="gender" name="gender" style="height: 10%;">
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
                    <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-automobile"></span></div>
                        <input type="text" class="form-control" id="plate" value="" placeholder="Plate Number" name="plate">
                    </div>
                </div>
                <div class="form-group">
                  <label for="sel1">Select Vehicle Type:</label>
                  <select class="form-control" id="type" name="type" style="height: 10%;">
                     <?php
                        $con = mysqli_connect("localhost","root","","dbregistration") or die('Error connecting to MySQL server.');
                        $seltypes = "SELECT * FROM tbltypes";
                        $typesquery = mysqli_query($con,$seltypes);
                        while ($con=mysqli_fetch_assoc($typesquery)){
                          echo "<option  value='".$con['ID']."'>".$con['type']."</option>";
                        }
                    ?>
                  </select>
                </div>   
            <button type="submit" class="btn btn-default">Submit</button>
            <div style="margin-top: 1em;"></div>
          </form>   
    </div>
  </div>
</div>
   

<?php include 'footer.html'; ?>