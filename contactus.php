<?php
include("include/login_header.php");

?>

<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
	<div class="row">
	<div class="col-md-4 col-md-offset-3">
	<!--<div>
	<nav style="font-family: Montserrat; font-size: 25px">
		<ul>
			<a class="btn btn-info pull-left" target="_blank" href="index.php">HOME</a>
			<a class="btn btn-info pull-left" target="_blank" href="aboutus.php">ABOUT US</a>
			<a class="btn btn-info pull-left" target="_blank" href="contactus.php">CONTACT</a>
		</ul>
	</nav>
	</div>-->
	<div class="well" style="position:relative;top:20vh;width:500px;">
		<img src="images/employeetracker.png" alt="" width="100%" height="110">
	</div>
	<div class="well" style="position:relative;top:20vh;width:500px;">
	<form class="form-horizontal form-custom-login" action="" method="POST">
	<div class="form-heading">
			    <h2 class="text-center">Contact Us</h2>
	</div></form><br>
		<div class="gmap_canvas"><iframe width="465" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Atmiya%20University&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
		<p style="font-family: Montserrat; font-size: 25px"><i class="fas fa-map-marked"></i> Employee Tracker Pvt. Ltd.</p>
    	<p style="font-family: Montserrat; font-size: 25px"><i class="fas fa-address-book"></i> +91 9878767654</p>
    	<p style="font-family: Montserrat; font-size: 25px"><i class="fas fa-envelope"></i> empTracker@gmail.com</p>
		<a href="index.php" name="index" class="btn btn-info" target="_blank">Login</a>
		<a href="aboutus.php" name="about" class="btn btn-info" target="_blank">About us</a>
		</div>
	</div>
	</div>
	</div>
	
	<div class="divider"></div>

</body>
</html>