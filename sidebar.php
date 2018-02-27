<?php 
	#include 'session.php';
	include 'header.html';
?>
<style type="text/css">
	 /* Toggle Styles */
 
 .nav-pills>li>a {
    border-radius: 0;
 }
 
 #wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    overflow: hidden;
 }
 
 #wrapper.toggled {
    padding-left: 250px;
    overflow: hidden;
 }
 
 #sidebar-wrapper {
    z-index: 1000;
    position: absolute;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background: #000;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
 }
 
 #wrapper.toggled #sidebar-wrapper {
    width: 250px;
 }
 
 #page-content-wrapper {
    position: absolute;
    padding: 15px;
    width: 100%;
    overflow-x: hidden;
 }
 
 .xyz {
    min-width: 360px;
 }
 
 #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0px;
 }
 
 .fixed-brand {
    width: auto;
 }
 /* Sidebar Styles */
 
 .sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
    margin-top: 2px;
 }
 
 .sidebar-nav li {
    text-indent: 15px;
    line-height: 40px;
 }
 
 .sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
 }
 
 .sidebar-nav li a:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    border-left: red 2px solid;
 }
 
 .sidebar-nav li a:active,
 .sidebar-nav li a:focus {
    text-decoration: none;
 }
 
 .sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
 }
 
 .sidebar-nav > .sidebar-brand a {
    color: #999999;
 }
 
 .sidebar-nav > .sidebar-brand a:hover {
    color: #fff;
    background: none;
 }
 
 .no-margin {
    margin: 0;
 }
 
 @media(min-width:768px) {
    #wrapper {
       padding-left: 250px;
    }
    .fixed-brand {
       width: 250px;
    }
    #wrapper.toggled {
       padding-left: 0;
    }
    #sidebar-wrapper {
       width: 250px;
    }
    #wrapper.toggled #sidebar-wrapper {
       width: 250px;
    }
    #wrapper.toggled-2 #sidebar-wrapper {
       width: 50px;
    }
    #wrapper.toggled-2 #sidebar-wrapper:hover {
       width: 250px;
    }
    #page-content-wrapper {
       padding: 20px;
       position: relative;
       -webkit-transition: all 0.5s ease;
       -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
       transition: all 0.5s ease;
    }
    #wrapper.toggled #page-content-wrapper {
       position: relative;
       margin-right: 0;
       padding-left: 250px;
    }
    #wrapper.toggled-2 #page-content-wrapper {
       position: relative;
       margin-right: 0;
       margin-left: -200px;
       -webkit-transition: all 0.5s ease;
       -moz-transition: all 0.5s ease;
       -o-transition: all 0.5s ease;
       transition: all 0.5s ease;
       width: auto;
    }
 }
</style>
<nav class="navbar navbar-default no-margin">
	<h1 style="text-align: center; color: gray">VEHICLE REGISTRATION SYSTEM</h1>
</nav>
   <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
            <li>
               <a href="dashboard.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
            </li>
            <li>
               <a href="new.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus-circle fa-stack-1x "></i></span>Register New Vehicle</a>
            </li>
            <li>
               <a href="rvehicles.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-automobile fa-stack-1x "></i></span>Registered Vehicles</a>
            </li>
            <li>
               <a href="dvehicles.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-trash-o fa-stack-1x "></i></span>Deleted Vehicles</a>
            </li>
            <li>
               <a href="types.php"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-truck fa-stack-1x "></i></span>Vehicle Types</a>
            </li>
            <li>
               <a href="logout.php"><span class="fa-stack fa-lg pull-left"><i class="fa fa-power-off fa-stack-1x "></i></span>Log-out</a>
            </li>
         </ul>
      </div>
   </div>
   <script type="text/javascript">
   	$("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled-2");
   $('#menu ul').hide();
});

function initMenu() {
   $('#menu ul').hide();
   $('#menu ul').children('.current').parent().show();
   //$('#menu ul:first').show();
   $('#menu li a').click(
      function() {
         var checkElement = $(this).next();
         if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
         }
         if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
         }
      }
   );
}
$(document).ready(function() {
   initMenu();
});
   </script>
<?php include 'footer.html'; ?>