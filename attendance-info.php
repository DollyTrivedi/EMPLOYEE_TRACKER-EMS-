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
		
		$result = mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
		$result1 = mysqli_fetch_array($result);
		
		if (isset($_POST['add_punch_in']))
		{
			mysqli_query($conn,"insert into attendance_info (empid,in_time,status) values('".$result1[0]."','".$_POST["itime"]."','Clocked In')");
			echo "<script>window.location='attendance-info.php';</script>";
		}
		if (isset($_POST['add_punch_out']))
		{
			$last_id=mysqli_query($conn,"SELECT aten_id from attendance_info where empid='".$result1[0]."' order by aten_id DESC LIMIT 1");
			$lid = mysqli_fetch_array($last_id);
		
			mysqli_query($conn,"update attendance_info set out_time='".$_POST["outtime"]."', status='Clocked Out' where aten_id='".$lid[0]."'");
		
			echo "<script>window.location='attendance-info.php';</script>";
		}
	
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="row">
            <div class="col-md-8 ">
              <div class="btn-group">
                <?php 
				  
				  $emp=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
				  $row=mysqli_fetch_array($emp);
				  
				  
                  $sql = mysqli_query($conn,"SELECT * FROM attendance_info WHERE empid = '".$row[0]."' AND out_time IS NULL");
                  $row1=mysqli_fetch_array($sql);

                  //$info = $obj_admin->manage_all_info($sql);
				  $rowcount = mysqli_num_rows($sql);
                  //$num_row = rowCount($row1);
                  if($rowcount==0){
              ?>

                <div class="btn-group">
                  <form method="post" role="form">
					<input type="hidden" name="itime" value="<?php echo date("Y-m-d H:i a"); ?>">
                    <button type="submit" name="add_punch_in" class="btn btn-primary btn-lg rounded" >Clock In</button>
                  </form>
                  
                </div>

              <?php } else { ?>

				<div class="btn-group">
                  <form method="post" role="form">
                    <input type="hidden" name="outtime" value="<?php echo date("Y-m-d H:i a"); ?> ">
                    <button type="submit" name="add_punch_out" class="btn btn-primary btn-lg rounded" >Clock Out</button>
                  </form>
                  
                </div>

			  <?php } ?>

              </div>
            </div>
            
          </div>

          <center><h3>Manage Atendance</h3>  </center>
          <div class="gap"></div>

          <div class="gap"></div>

          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Name</th>
                  <th>In Time</th>
                  <th>Out Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

              <?php 
				$emp = mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
				$emp1 = mysqli_fetch_array($emp);
				
			
				$attd = mysqli_query($conn,"select * from attendance_info where empid='".$emp1[0]."'");
				$attd1 = mysqli_fetch_array($attd);
				
				while($attd1 = mysqli_fetch_array($attd))
				{
			  ?>
                <tr>
                  <td><?php echo $attd1[0]; ?></td>
                  <td><?php echo $emp1[1]; ?></td>
                  <td><?php echo $attd1[2]; ?></td>
                  <td><?php echo $attd1[3]; ?></td>
                  <td><?php echo $attd1[5]; ?></td>
                </tr>
				<?php } ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


<?php

include("include/footer.php");

	}

?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
