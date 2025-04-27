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
		$page_name="myprojects";
		include("include/sidebar-emp.php");
		include("ems_header.php");
		
	if (isset($_POST['add_task_post'])) 
	{
		$result=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."' ");
		$row=mysqli_fetch_array($result);
		
		$reason=$_POST['reason'];
		$st=$_POST['t_start_time'];
		$et=$_POST['t_end_time'];
		
		mysqli_query($conn,"insert into employee_leave (empid,start,end,reason,status) values('".$row[0]."','".$st."','".$et."','".$reason."','Pending')");
	}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"></div>
          <div class="row">
          </div>
          <center ><h2>Apply Leave Form</h2></center>
          <div class="gap"></div>
      <div class="modal-content">
        <div class="modal-header">
         
         
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="" method="post" autocomplete="off">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Reason</label>
                    <div class="col-sm-7">
                      <input type="text" placeholder="Reason" id="task_title" name="reason" list="expense" class="form-control" id="default" required>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="control-label col-sm-5">Start Time</label>
                    <div class="col-sm-7">
                      <input type="text" name="t_start_time" id="t_start_time" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">End Time</label>
                    <div class="col-sm-7">
                      <input type="text" name="t_end_time" id="t_end_time" class="form-control">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_task_post" class="btn btn-success-custom">Submit</button>
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
<div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"></div>
          <div class="row">
          </div>
          <center ><h3>Employee Leave Status </h3></center>
          <div class="gap"></div>
		  <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"></div>
		  <div class="gap"></div>
          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Emp id</th>
                  <th>Employee Name</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Reason</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

            <?php 
			
			$result2=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
			$row2=mysqli_fetch_array($result2);
			
			$result1=mysqli_query($conn,"select * from employee_leave where empid='".$row2[0]."'");
			//$row1=mysqli_fetch_array($result1);
			
			//$sql=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."' ");
			//$sq=mysqli_fetch_array($sql);
				
			while($row1=mysqli_fetch_array($result1))
			{					
              ?>
                <tr>
                  <td><?php echo $row1[1]; ?></td>
                  <td><?php echo $row2[1]; ?></td>
                  <td><?php echo $row1[2]; ?></td>
                  <td><?php echo $row1[3]; ?></td>
                  <td><?php echo $row1[4]; ?></td>
                  <td><?php echo $row1[5]; ?></td>
                </tr>
              <?php  }  ?>         
              </tbody>
            </table>
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
