<?php
include ("connection.php");
if(isset($_POST['login_btn']))
	{
	$un = $_POST['username'];
	$pn = $_POST['admin_password'];
	$rs = mysqli_query($conn,"select * from  employee where firstName='".$un."' and password='".$pn."'");
	$cnt=mysqli_num_rows($rs);
	if($cnt >= 1)
	{
		session_start();
		$_SESSION['username']=$un;
		?><script>
		window.location.replace('home.php');
		</script><?php
	}
	else?>
		<script>
		alert("Incorrect username or password");
		</script><?php
	}

include("include/login_header.php");

?>

<div class="row">
	<div class="col-md-4 col-md-offset-3">
		<div class="well" style="position:relative;top:20vh;">
			<img src="images/employeetracker.png" alt="" width="100%" height="110">
		</div>
		<div class="well" style="position:relative;top:20vh;">
		<center><h2 style="margin-top:1px;">Employee Tracker</h2></center>
			<form class="form-horizontal form-custom-login" action="" method="POST">
			  <div class="form-heading">
			    <h2 class="text-center">Login</h2>
			  </div>
			  <?php if(isset($info)){ ?>
			  <h5 class="alert alert-danger"><?php echo $info; ?></h5>
			  <?php } ?>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Username" name="username" required/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required/>
			  </div>
			  <button type="submit" name="login_btn" class="btn btn-info pull-right">Login</button>
			</form>
			<a href="aboutus.php" name="about" class="btn btn-info pull-left" target="_blank">About us</a>
			<a href="contactus.php" name="contact" class="btn btn-info pull-right" target="_blank">Contact us</a>
		</div>
	</div>
</div>


</body>
</html>