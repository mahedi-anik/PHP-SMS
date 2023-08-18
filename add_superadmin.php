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

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $role = mysqli_real_escape_string($conn, $_POST['role']);
   $status = mysqli_real_escape_string($conn, $_POST['status']);

   $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' && email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Super Admin already exist!';

   }else{

      if($password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(name, username,email,mobile, password, role,status) VALUES('$name','$username','$email','$mobile','$password','$role','$status')";
         mysqli_query($conn, $insert);
         header('location:superadmin.php');
      }
   }

};


?>

		<?php include_once('sidebar.php');?>
		<?php include_once('top-header.php');?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Project Idea page</title>

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
								<h2 class="card-title" style="text-align: center;">Add New Super Admin</h2>
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
								<div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Name :</label>
	    <div class="col-sm-7">
	    	<input type="text" class="form-control" name="name" required placeholder="enter your name">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  	
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">User Name :</label>
	    <div class="col-sm-7">
<input type="text" class="form-control" name="username" required placeholder="enter your username">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Email:</label>
	    <div class="col-sm-7">
<input type="text" class="form-control" name="email" required placeholder="enter your email">
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div class="form-group row">
	    <label  class="col-sm-3" style="text-align:right;">Mobile No:</label>
	    <div class="col-sm-7">
<input class="form-control" name="mobile" maxlength="11" required placeholder="enter your mobile no.">
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
	    <label class="col-sm-3" style="text-align:right;">Role :</label>
	    <div class="col-sm-7">
	    	<select class="form-control" name="role" required>
         <option value="super_admin">Super Admin</option>
      </select>
	  </div>
	</div>
	<div>&nbsp;</div>
	  	
	  <div class="form-group row">
	    <label class="col-sm-3" style="text-align:right;">Status :</label>
	    <div class="col-sm-7">
	    	<select class="form-control" name="status" required>
         <option value="Active">Active</option>
         <option value="Inactive">Inactive</option>
      </select>
	  </div>
	</div>
	  <div>&nbsp;</div>
	  <div style="text-align:center;">
	               <button type="submit" class="btn btn-success" name="submit">Save</button>
	               <a href="superadmin.php" class="btn btn-danger">Cancel</a>
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

					  

				




