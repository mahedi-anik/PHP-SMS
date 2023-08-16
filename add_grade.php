<?php include_once('header.php');?>
<?php

		@include 'config.php';
		@include_once("response.php");
		session_start();

		if(!isset($_SESSION['user'])){
			header('location:login_form.php');
		}

	?>
<?php
	include('config.php');
 if(isset($_POST['submit'])){
	$studentid=$_POST['studentid'];
	$sectionid=$_POST['sectionid'];
	$marks=$_POST['marks'];

	$select = "SELECT * from grades LEFT JOIN users on grades.studentid=users.id LEFT JOIN section on grades.sectionid=section.sectionid  WHERE grades.studentid = '$studentid' and grades.sectionid= '$sectionid' and grades.marks= '$marks'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Enrollment already exist!';
 }else{
	mysqli_query($conn,"insert into enrollments (sectionid,studentid) values ('$sectionid','$studentid')");
	header('location:grades.php');
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
			<title>Enrollment page</title>

			<!-- custom css file link  -->
			<link rel="stylesheet" href="css/style.css">
			  <!-- Bootstrap -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		</head>
		<body>

			<div class="main-content">
				<form action="" method="post">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card" style="min-height:485px">
							<div class="card-header card-header-text">
								<h2 class="card-title" style="text-align: center;">Add New Exam Grade</h2>
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
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Section :</label>
	    <div class="col-sm-7">
<select class="form-control" name="sectionid" id="section" required>
       <option value="">Select Section</option>
    <?php 
    $query ="SELECT * FROM section order by sectionname asc ";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['sectionname'];
        $data =$optionData['sectionid'];
    ?>
    <?php
    //selected option
    if(!empty($sectionname) && $sectionname== $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>" ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
    </select>
	    </div>
	  </div>
	  <div>&nbsp;</div>
	<div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Student Name :</label>
	    <div class="col-sm-7">
		<select class="form-control" name="studentid" id="student" required>
<option value="">Select Student</option>
    </select>
	  </div>
	</div>
	  
	  	  <div>&nbsp;</div>
	  	  <div class="form-group row">
	  	  	<label  class="col-sm-3 col-form-label" style="text-align:right;">Marks :</label>
	    <div class="col-sm-7">
	    	<input class="form-control" name="marks" placeholder="marks" required>
	    </div>
	  	  </div>
	  <div>&nbsp;</div>
	  <div style="text-align:center;">
	               <button type="submit" class="btn btn-success" name="submit">Save</button>
	               <a href="grades.php" class="btn btn-danger">Cancel</a>
	            </div>
								</div>

							</div>
						</div>

						<div>
						</div>
					</div>
					    <script>
        $(document).ready(function() {
            $("#section").on('change', function() {
                var sectionid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        id: sectionid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#student").html(data);

                    }

                });
            });
        });
    </script>
					   <!-- Bootstrap -->
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

				</body>
				<?php include_once('footer.php');?> 
				</html>

				



