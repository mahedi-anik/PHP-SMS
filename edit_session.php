 
<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['sessionid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                	<h4 class="modal-title" id="myModalLabel" style="text-align: center;">Update Session Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$edit=mysqli_query($conn,"select * from session where sessionid='".$row['sessionid']."'");
					$erow=mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
				<form method="POST" action="edit.php?id=<?php echo $erow['sessionid']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label style="position:relative; top:7px;">Session:</label>
						</div>
						<div class="col-lg-10">
							<input type="text" name="session" class="form-control" value="<?php echo $erow['session']; ?>">
						</div>
					</div>
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>
				</form>
            </div>
        </div>
    </div>

    <?php
	include('config.php');
 
	$id=$_GET['id'];
	$session=$_POST['session'];

 
	mysqli_query($conn,"update session set session='$session' where sessionid='$id'");
	header('location:session.php');
 
?>