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
$departmentid=$_GET["departmentid"];

if (isset($_POST["submit"])) {
  $userid = $_POST['userid'];
  $departmentid = $_POST['departmentid'];


  $sql = "UPDATE `admins` SET `userid`='$userid',`departmentid`='$departmentid' WHERE adminid = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: admins.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

		<?php include_once('sidebar.php');?>
		<?php include_once('top-header.php');?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Admins page</title>

			<!-- custom css file link  -->
			<link rel="stylesheet" href="css/style.css">
			  <!-- Bootstrap -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 

		</head>
		<body>

			<div class="main-content">
				<form action="" method="post">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card" style="min-height:485px">
							<div class="card-header card-header-text">
								<h2 class="card-title" style="text-align: center;">Update Departments Admin Info</h2>
								<hr>
							</div>
							<div class="card-content">
								 <?php
    $sql = "SELECT * from admins LEFT JOIN users on admins.userid=users.id LEFT JOIN department on admins.departmentid=department.departmentid WHERE admins.adminid = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
								<div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">User Name :</label>
	    <div class="col-sm-7">
	      <select class="form-control" name="userid" required>
       <option value="">Select User</option>
    <?php 
    $query ="SELECT * FROM users where role='department_admin' order by name asc ";
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
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Department Name :</label>
	    <div class="col-sm-7">
	      <select class="form-control" name="departmentid" required>
       <option value="">Select Department</option>
    <?php 
    $query ="SELECT * FROM department order by departmentname asc ";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['departmentname'];
        $data =$optionData['departmentid'];
    ?>
    <?php
    //selected option
    if(!empty($departmentname) && $departmentname== $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>"<?php if($data == $departmentid) { ?> selected="selected"<?php } ?> ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
    </select>
	    </div>
	  </div>
	  <div>&nbsp;</div>
	  <div style="text-align:center;">
	               <button type="submit" class="btn btn-success" name="submit">Update</button>
	               <a href="admins.php" class="btn btn-danger">Cancel</a>
	            </div>
								</div>

							</div>
						</div>

						<div>
						</div>
					</form>
					</div>
					   <!-- Bootstrap -->
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

				</body>
				<?php include_once('footer.php');?> 
				</html>

				




