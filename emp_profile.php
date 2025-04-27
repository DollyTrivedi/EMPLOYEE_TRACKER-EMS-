<?php

session_start();
include ("connection.php");

	if(!isset($_SESSION['username']))
	{
		?> <script>
		alert("Please Login first.");
		window.location.replace('index.php');
		
		</script><?php	
	}
	else
	{
		$page_name="profile";
		include("include/sidebar-emp.php");
		include("ems_header.php");
		
$result=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
$row=mysqli_fetch_array($result);

$result1=mysqli_query($conn,"select * from salary where id='".$row[0]."'");
$row1=mysqli_fetch_array($result1);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"></div>
          <div class="row">
          </div>
          <center ><h2>My Profile</h2></center>
          <div class="gap"></div>
      <div class="modal-content">
        <div class="modal-header">
         
         
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-horizontal">
				
				<div class="form-group">
                   
						<label class="control-label col-sm-5">Profile Picture</label>
						<div class="col-sm-7">  
						<img src="images/<?php echo $row[11]; ?>" alt="Img" width="100">
						</div>
					</div>
				
                 <div class="form-group">
                    <label class="control-label col-sm-5">First Name</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row[1] ?>" placeholder="FirstName" id="task_title" name="fn" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
					  <div class="form-group">
                    <label class="control-label col-sm-5">Last Name</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row[2] ?>" placeholder="LastName" id="task_title" name="ln" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
                  
                  <div class="form-group">
                  <label class="control-label col-sm-5">Email</label>
                    <div class="col-sm-7">
                   	<input type="mail" value="<?php echo $row[3] ?>" placeholder="Enter Email" id="task_title" name="email" list="expense" class="form-control" id="default" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Date Of Birth</label>
                    <div class="col-sm-7">
					<input type="text" value="<?php echo $row[5] ?>" name="dob" id="dob" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Gender</label>
                    <div class="col-sm-7">
                        <input type="text" value="<?php echo $row[6] ?>" name="dob" id="dob" class="form-control" readonly>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label col-sm-5">Contact</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row[7] ?>" placeholder="Contact" id="task_title" name="con" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
				  
				    <div class="form-group">
                  <label class="control-label col-sm-5">Address</label>
                    <div class="col-sm-7">
                  <textarea name="addr" id="task_description" placeholder="Enter Address" class="form-control" rows="2" cols="10" readonly><?php echo $row[8] ?></textarea>
                    </div>
                  </div>
               
                 <div class="form-group">
                    <label class="control-label col-sm-5">Department</label>
                    <div class="col-sm-7">
                        <input type="text" value="<?php echo $row[9] ?>" name="dob" id="dob" class="form-control" readonly>
                    </div>
                  </div>
				  
				   <div class="form-group">
                    <label class="control-label col-sm-5">Designation</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row[10] ?>" placeholder="Designation" id="task_title" name="des" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
					
					<div class="form-group">
                    <label class="control-label col-sm-5">Salary</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row1[1] ?>" placeholder="Salary" id="task_title" name="salary" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
					
					<div class="form-group">
                    <label class="control-label col-sm-5">Bonus</label>
		                    <div class="col-sm-7">      
					<input type="text" value="<?php echo $row1[2] ?>" placeholder="Bonus" id="task_title" name="bonus" list="expense" class="form-control" id="default" readonly>
					</div>
					</div>
				   <div class="form-group">
                  </div>                 
                </div>
              </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	
include("include/footer.php");
	}
?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script type="text/javascript">
  flatpickr('#t_start_time', {
    enableTime: true
  });

  flatpickr('#t_end_time', {
    enableTime: true
  });

</script>
