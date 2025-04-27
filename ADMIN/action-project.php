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
	if (isset($_GET['pid']))
	{
	$no=$_GET['pid'];
	
	if (isset($_POST['add_task_post']))
	{
		mysqli_query($conn,"update project set status='".$_POST["status"]."' where pid='".$no."'");
		
		echo "<script>window.location='projectstatus.php';</script>";
	}
	
	if (isset($_POST['cancel']))
	{
		echo "<script>window.location='projectstatus.php';</script>";
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
          <center ><h2>Task Details</h2></center>
          <div class="gap"></div>
      <div class="modal-content">
        <div class="modal-header">
		<?php
			$sql=mysqli_query($conn,"select * from project where pid='".$no."'");
			$sq=mysqli_fetch_array($sql);

			$sql1=mysqli_query($conn,"select * from employee where id='".$sq[1]."'");
			$sq1=mysqli_fetch_array($sql1);
         ?>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="" method="post" autocomplete="off">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-5">Project Title</label>
                    <div class="col-sm-7">
                      <input type="text" value="<?php echo $sq[2]; ?>" placeholder="Task Title" id="task_title" name="task_title" list="expense" class="form-control" id="default" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Project Description</label>
                    <div class="col-sm-7">
                      <textarea name="task_description" id="task_description" placeholder="Text Deskcription" class="form-control" rows="5" cols="5" required><?php echo $sq[2]; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Start Date</label>
                    <div class="col-sm-7">
                      <input type="text" value="<?php echo $sq[3]; ?>" name="t_start_time" id="t_start_time" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">End Date</label>
                    <div class="col-sm-7">
                      <input type="text" value="<?php echo $sq[4]; ?>" name="t_end_time" id="t_end_time" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-5">Tasks</label>
                    <div class="col-sm-7">
					<?php 
						$sql1 = mysqli_query($conn,"select * from tasks");
						$pro = mysqli_query($conn,"select * from project where pid='".$_GET['pid']."'");
						$pro1=mysqli_fetch_array($pro);
						$xyz = explode(",",$pro1[5]);
						
						while($row1=mysqli_fetch_array($sql1)) 
						{	?>
						<input type="checkbox" id="aassign_to" name="assign_to" value="<?php echo $row1[1]; ?>" 
						<?php 
						for($i=0;$i<count($xyz);$i++){
						if($row1[1] == $xyz[$i]) echo 'checked';}	?> >
						<label class="control-label"><?php echo $row1[1]; ?></label>
					<?php } ?>
                    </div>
                   
                  </div>
				  <div class="form-group">
                    <label class="control-label col-sm-5">Assign To</label>
                    <div class="col-sm-7">
					
                      <select class="form-control" name="assign_to" id="aassign_to" >
                        <option value=""><?php echo $sq1[1]; ?></option>
                      </select>
                    </div>
                   
                  </div>
				  <div class="form-group">
                    <label class="control-label col-sm-5">Status</label>
                    <div class="col-sm-7">
					
                      <select class="form-control" name="status" id="aassign_to" >
                        <option value=""><?php echo $sq[6]; ?></option>
						<option value="Scheduled">Scheduled</option>
                        <option value="In Progress">In Progress</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Completed">Completed</option>
                      </select>
                    </div>
                   
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_task_post" class="btn btn-success-custom">Update</button>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" name="cancel" class="btn btn-danger-custom" data-dismiss="modal">Cancel</button>
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
