<?php

session_start();
include ("connection.php");

	if(!isset($_SESSION['admin_name']))
	{
		?> <script>
		alert("Please Login first.");
		window.location.replace('index.php');
		
		</script><?php	
	}
	else
	{
		include("include/sidebar.php");
		include("ems_header.php");
		
		$page_name="Task_Info";
	if (isset($_POST['add_task_post'])) 
	{
	$fn=$_POST['fn'];
	$ln=$_POST['ln'];
	$eml=$_POST['email'];
	$day1 = strtotime($_POST["dob"]);
	$day = date('Y-m-d', $day1);
	$gender=$_POST['gender'];
	$con=$_POST['con'];
	$addr=$_POST['addr'];
	$department=$_POST['department'];
	$des=$_POST['des'];
	$salary=$_POST['salary'];
	$bonus=$_POST['bonus'];
	$add=($salary * $bonus) / 100;
	$total=$salary + $add;
	
	$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../images/" . $filename;
	
	if(empty($filename))
	{
		header("location: addemployee.php");
	}
	else
	{
	mysqli_query($conn,"insert into employee(firstName,lastName,email,password,birthday,gender,contact,address,dept,designation,pic) values('".$fn."','".$ln."','".$eml."','1234','".$day."','".$gender."','".$con."','".$addr."','".$department."','".$des."','".$filename."')");
	
	$sql=mysqli_query($conn,"select * from employee where firstName='".$fn."';");
	
	$row=mysqli_fetch_array($sql);
	
	$sq=mysqli_query($conn,"insert into salary(id,base,bonus,total) values('".$row[0]."','".$salary."','".$bonus."','".$total."')");
	
		if (move_uploaded_file($tempname, $folder)) 
		{
			echo "<h3>  Image uploaded successfully!</h3>";
		} else 
			echo "<h3>  Failed to upload image!</h3>";
    
			echo "<script>window.location='viewemployee.php';</script>";
	}
	}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"></div>
          <div class="row">            
          </div>
          <center ><h2>Add Employee</h2></center>
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
                    <label class="control-label col-sm-5">First Name</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="FirstName" id="task_title" name="fn" list="expense" class="form-control" id="default" required>
					</div>
					</div>
					  <div class="form-group">
                    <label class="control-label col-sm-5">Last Name</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="LastName" id="task_title" name="ln" list="expense" class="form-control" id="default" required>
					</div>
					</div>
                  
                  <div class="form-group">
                  <label class="control-label col-sm-5">Email</label>
                    <div class="col-sm-7">
                   	<input type="mail" placeholder="Enter Email" id="task_title" name="email" list="expense" class="form-control" id="default" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Date Of Birth</label>
                    <div class="col-sm-7">
                      <input type="Date" name="dob" id="dob" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Gender</label>
                    <div class="col-sm-7">
                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label col-sm-5">Contact</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="Contact" id="task_title" name="con" list="expense" class="form-control" id="default" required>
					</div>
					</div>
				  
				    <div class="form-group">
                  <label class="control-label col-sm-5">Address</label>
                    <div class="col-sm-7">
                  <textarea name="addr" id="task_description" placeholder="Enter Address" class="form-control" rows="2" cols="10"></textarea>
                    </div>
                  </div>
               
                 <div class="form-group">
                    <label class="control-label col-sm-5">Department</label>
                    <div class="col-sm-7">
                        <select name="department">
                                            <option disabled="disabled" selected="selected">Select Department</option>
                                            <option value="IT">IT</option>
                                            <option value="Security">Security</option>
                                            <option value="Finance">Finance</option>
											<option value="HR">HR</option>
											<option value="Management">Management</option>
                                        </select>
                    </div>
                  </div>
				  
				   <div class="form-group">
                    <label class="control-label col-sm-5">Designation</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="Designation" id="task_title" name="des" list="expense" class="form-control" id="default" required>
					</div>
					</div>
					
					<div class="form-group">
                    <label class="control-label col-sm-5">Salary</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="Salary" id="task_title" name="salary" list="expense" class="form-control" id="default" required>
					</div>
					</div>
					
					<div class="form-group">
                    <label class="control-label col-sm-5">Bonus</label>
		                    <div class="col-sm-7">      
					<input type="text" placeholder="Bonus" id="task_title" name="bonus" list="expense" class="form-control" id="default" required>
					</div>
					</div>
					
					 <div class="form-group">
                   
						<label class="control-label col-sm-5">Profile Picture</label>
						<div class="col-sm-7">  
							<input style="margin-left=200px;" class="input--style-1" type="file" placeholder="file" name="file">
						</div>
					</div>
					
				   <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_task_post" class="btn btn-success-custom">Add Employee</button>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-danger-custom" data-dismiss="modal">Cancel</button>
                    </div>
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
