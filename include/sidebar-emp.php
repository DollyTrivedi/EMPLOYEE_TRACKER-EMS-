<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker-custom.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="assets/bootstrap-datepicker/js/datepicker-custom.js"></script>
  <script type="text/javascript">
    
    function check_delete() {
      var check = confirm('Are you sure you want to delete this?');
        if (check) {
         
            return true;
        } else {
            return false;
      }
    }
  </script>
</head>
<body>

<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">
    <div class="container-fluid">
    <div>
		<img src="images/employeetracker.png" alt="" width="100%" height="70">
    </div>

    <?php
    $user_role = $_SESSION['username'];
    ?>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-nav-custom">
		
		<li <?php //if($page_name == "home" ){echo "class=\"active\"";} ?>><a href="Home.php">Home<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
		<li <?php //if($page_name == "profile" ){echo "class=\"active\"";} ?>><a href="emp_profile.php">My Profile<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
        <li <?php //if($page_name == "myprojects" ){echo "class=\"active\"";} ?>><a href="emp_project.php">My Projects<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
		<li <?php //if($page_name == "Attendance" ){echo "class=\"active\"";} ?>><a href="attendance-info.php">Attendance <span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
        <li <?php //if($page_name == "leave" ){echo "class=\"active\"";} ?>><a href="apply_leave.php">Apply Leave <span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-globe"></span></a></li>
        <li ><a href="logout.php">Logout<span style="font-size:16px; color:#d4ab3a;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="main">