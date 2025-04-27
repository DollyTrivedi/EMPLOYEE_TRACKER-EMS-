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
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

            <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="gap"> 
          
          <center ><h3>My Projects </h3></center>
                <div class="gap"></div>
          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Project id</th>
				  <th>Emp id</th>
                  <th>Project Name</th>
                  <th>Start Date</th>
                  <th>Due Date</th>
                  <th>Status</th>
                  <th>Action</th>
                
                </tr>
              </thead>
              <tbody>

            <?php 
				
				$sql=mysqli_query($conn,"select * from employee where firstName='".$_SESSION['username']."'");
				$sq=mysqli_fetch_array($sql);
				
				$result=mysqli_query($conn,"select * from project where eid='".$sq[0]."'");
				while($row=mysqli_fetch_array($result))
				{
              ?>
                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>
                  <td><?php echo $row[4]; ?></td>
                  <td><?php echo $row[6]; ?></td>
                  <td><a title="Action Project" href="action-project.php?pid=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                </tr>                
              <?php  }  ?>
              </tbody>
            </table>
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
