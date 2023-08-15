		<?php include_once('header.php');?>
			<?php

		@include 'config.php';

		session_start();

		if(!isset($_SESSION['user'])){
			header('location:login_form.php');
		}

	?>
<?php
include "config.php";
$id = $_GET["id"];
$userid=$_GET["userid"];
$status=$_GET["status"];



if (isset($_POST["submit"])) {
    $project=$_POST['project'];
    $studentid=$_POST['studentid'];
    $status=$_POST['status'];


  $sql = "UPDATE `projectidea` SET `project`='$project',`studentid`='$studentid',`status`='$status' WHERE projectideaid = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: project.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

		<?php include_once('sidebar.php');?>
		<?php include_once('top-header.php');?>

				</head>
		<body>

			<div class="main-content">
				<form action="" method="post">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card" style="min-height:485px">
							<div class="card-header card-header-text">
								<h2 class="card-title" style="text-align: center;">Update Project Idea Info</h2>
								<hr>
							</div>
							<div class="card-content">
								 <?php
    $sql = "SELECT * from projectidea LEFT JOIN users on projectidea.studentid=users.id WHERE projectidea.projectideaid = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
<div class="form-group row">
        <label  class="col-sm-3 col-form-label" style="text-align:right;">Project Idea :</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" name="project" value="<?php echo $row['project'] ?>" required>
        </div>
      </div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Student Name :</label>
	    <div class="col-sm-7">
<select class="form-control" name="studentid" required>
       <option value="">Select User</option>
    <?php 
    $query ="SELECT * FROM users where role='student' order by name asc ";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['name'];
        $data =$optionData['id'];
    ?>
    <?php
    //selected option
    if(!empty($name) && $name== $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>"<?php if($data == $userid) { ?> selected="selected"<?php } ?> ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
    </select>
	  </div>
    </div>
      <div>&nbsp;</div>
          <div class="form-group row">
        <label  class="col-sm-3 col-form-label" style="text-align:right;">Status :</label>
        <div class="col-sm-7">
            <select class="form-control" name="status" required>
         <option value="Active" 
         <?php 
         if($status == "Active")
            { 
                echo "selected";
            }
         ?>>Active</option>
         <option value="Inactive" 
         <?php 
         if($status == "Inactive")
            { 
                echo "selected";
            }
         ?>>Inactive</option>
      </select>
      </div>
    </div>
	  <div>&nbsp;</div>
	  <div style="text-align:center;">
	               <button type="submit" class="btn btn-success" name="submit">Update</button>
	               <a href="project.php" class="btn btn-danger">Cancel</a>
	            </div>
								</div>

							</div>
						</div>

						<div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- Bootstrap -->
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
			<?php include_once('footer.php');?> 
</html>

					  

				




