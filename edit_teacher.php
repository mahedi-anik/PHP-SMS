<?php include_once('header.php');?>
<?php

		@include 'config.php';

		session_start();

		if(!isset($_SESSION['user'])){
			header('location:login_form.php');
		}

	?>
<?php

@include 'config.php';

$id = $_GET["id"];
$roleid=$_GET["roleid"];
$status=$_GET["status"];
$departmentid=$_GET["departmentid"];
$courseid=$_GET["courseid"];


if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $roleid = mysqli_real_escape_string($conn, $_POST['roleid']);
	$status=$_POST['status'];
	$departmentid = $_POST['departmentid'];
	$address = $_POST['address'];
   $courseid = $_POST['courseid'];


   if($password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`mobile`='$mobile',`password`='$password',`role`='$roleid',`status`='$status',`departmentid`='$departmentid',`address`='$address',`courseid`='$courseid' WHERE id = $id";
         mysqli_query($conn, $insert);
         header('location:teacher.php');
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
			<title>Register page</title>

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
								<h2 class="card-title" style="text-align: center;">Update Teacher Info </h2>
								<hr>
							</div>
							<div class="card-content">
								<?php
      if(isset($error)){
         foreach($error as $error){
            echo '<div class="alert alert-danger alert-dismissible fade show" style="text-align:center;" role="alert">
										' . $error . '
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';
         };
      };
      ?>
<?php
    $sql = "SELECT * from users WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
 </div>
								<div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Name :</label>
	    <div class="col-sm-7">
	    	<input type="text" class="form-control" name="name" required value="<?php echo $row['name'] ?>">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  	
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">User Name :</label>
	    <div class="col-sm-7">
<input type="text" class="form-control" name="username" required value="<?php echo $row['username'] ?>">
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
	  	<div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Course Name :</label>
	    <div class="col-sm-7">
		<select class="form-control" name="courseid" required>
       <option value="">Select Course</option>
    <?php 
    $query ="SELECT course,courseid FROM course order by course asc";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['course'];
        $data =$optionData['courseid'];
    ?>
    <?php
    //selected option
    if(!empty($course) && $course == $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>"<?php if($data == $courseid) { ?> selected="selected"<?php } ?> ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
    </select>
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Email:</label>
	    <div class="col-sm-7">
<input type="text" class="form-control" name="email" required value="<?php echo $row['email'] ?>">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Mobile No:</label>
	    <div class="col-sm-7">
<input class="form-control" name="mobile" mamaxlength="11" minlength="11" 
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="<?php echo $row['mobile'] ?>">
	  </div>
	</div>
	<div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Address:</label>
	    <div class="col-sm-7">
<input type="text" class="form-control" name="address" required value="<?php echo $row['address'] ?>">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Password</label>
	    <div class="col-sm-7">
<input type="password" class="form-control" name="password" required placeholder="enter your password">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Confirm Password</label>
	    <div class="col-sm-7">
<input type="password" class="form-control" name="cpassword" required placeholder="confirm your password">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  	
	  <div class="form-group row">
	    <label class="col-sm-3" style="text-align:right;">Status :</label>
	    <div class="col-sm-7">
	    	<select class="form-control" name="roleid" required>
         <option value="super_admin" 
         <?php 
         if($roleid == "super_admin")
            { 
                echo "selected";
            }
         ?>>Super Admin</option>
         <option value="department_admin" 
         <?php 
         if($roleid == "department_admin")
            { 
                echo "selected";
            }
         ?>>Department Admin</option>
         <option value="teacher" 
         <?php 
         if($roleid == "teacher")
            { 
                echo "selected";
            }
         ?>>Teacher</option>
         <option value="student" 
         <?php 
         if($roleid == "student")
            { 
                echo "selected";
            }
         ?>>Student</option>
      </select>
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
	               <a href="teacher.php" class="btn btn-danger">Cancel</a>
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

					  

				




