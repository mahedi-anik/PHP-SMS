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
$sessionid=$_GET["sessionid"];
$courseid=$_GET["courseid"];
$studentid=$_GET["studentid"];

 if(isset($_POST['submit'])){
	$sessionid=$_POST['sessionid'];
	$courseid=$_POST['courseid'];
	$studentid=$_POST['studentid'];
	$exam=$_POST['exam'];
	$quiz=$_POST['quiz'];
	$project=$_POST['project'];
	$total=$_POST['total'];

  $sql = "UPDATE `exammarks` SET `sessionid`='$sessionid',`courseid`='$courseid',`studentid`='$studentid',`exam`='$exam',`quiz`='$quiz',`project`='$project',`total`='$total' WHERE exammarksid = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: marks.php?msg=Data updated successfully");
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
			<title>Grades page</title>

			<!-- custom css file link  -->
			<link rel="stylesheet" href="css/style.css">
			  <!-- Bootstrap -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		</head>
		<body>

			<div class="main-content">
				<form action="" method="post">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card" style="min-height:485px">
							<div class="card-header card-header-text">
								<h2 class="card-title" style="text-align: center;">Update Exam Marks Info</h2>
								<hr>
							</div>
							<div class="card-content">
								 <?php
    $sql = "SELECT session,course,name,exam,quiz,project,total,exammarks.sessionid,exammarks.studentid,exammarks.courseid,exammarksid from exammarks LEFT JOIN session on exammarks.sessionid=session.sessionid LEFT JOIN course on exammarks.courseid=course.courseid left join users on exammarks.studentid=users.id WHERE exammarks.exammarksid = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Session Name :</label>
	    <div class="col-sm-7">
		<select class="form-control" name="sessionid" id="session" required>
       <option value="">Select Session</option>
    <?php 
    $query ="SELECT CONCAT(session,'-',course) as session,sessionid FROM session left join course on session.courseid=course.courseid order by session asc";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['session'];
        $data =$optionData['sessionid'];
    ?>
    <?php
    //selected option
    if(!empty($session) && $session == $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>" <?php if($data == $sessionid) { ?> selected="selected"<?php } ?>><?php echo $option; ?> </option>
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
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Student Name :</label>
	    <div class="col-sm-7">
		<select class="form-control" name="studentid" required>
       <option value="">Select Course</option>
    <?php 
    $query ="SELECT name,id FROM users where role='student' order by name asc";
    $result = $conn->query($query);
    if($result->num_rows> 0){
        while($optionData=$result->fetch_assoc()){
        $option =$optionData['name'];
        $data =$optionData['id'];
    ?>
    <?php
    //selected option
    if(!empty($name) && $name == $option){
    // selected option
    ?>
    <option value="<?php echo $data; ?>" selected><?php echo $option; ?> </option>
    <?php 
continue;
   }?>
    <option value="<?php echo $data; ?>"<?php if($data == $studentid) { ?> selected="selected"<?php } ?> ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
    </select>
</div>
	  </div>
	  <div>&nbsp;</div>
	<div class="form-group row">
	    <label  class="col-sm-3 col-form-label" style="text-align:right;">Exam Marks :</label>
	    <div class="col-sm-7">
		<input class="form-control" name="exam" id="exam" value="<?php echo $row['exam'] ?>" required>
	  </div>
	</div>
	  
	  	  <div>&nbsp;</div>
	  	  <div class="form-group row">
	  	  	<label  class="col-sm-3 col-form-label" style="text-align:right;">Quiz marks :</label>
	    <div class="col-sm-7">
	    	<input class="form-control" name="quiz" id="quiz" value="<?php echo $row['quiz'] ?>" required>
	    </div>
	  	  </div>
	  	   <div>&nbsp;</div>
	  	  <div class="form-group row">
	  	  	<label  class="col-sm-3 col-form-label" style="text-align:right;">Project marks :</label>
	    <div class="col-sm-7">
	    	<input class="form-control" name="project" id="project" value="<?php echo $row['project'] ?>" required>
	    </div>
	  	  </div>
	  	  <div>&nbsp;</div>
	  	  <div class="form-group row">
	  	  	<label  class="col-sm-3 col-form-label" style="text-align:right;">Total marks :</label>
	    <div class="col-sm-7">
	    	<input type="number" class="form-control" name="total" id="total" value="<?php echo $row['total'] ?>" >
	    </div>
	  	  </div>
	  <div>&nbsp;</div>
	  
	  <div style="text-align:center;">
	               <button type="submit" class="btn btn-success" name="submit">Update</button>
	               <a href="marks.php" class="btn btn-danger">Cancel</a>
	            </div>
								</div>

							</div>
						</div>

						<div>
						</div>
					</form>
					</div>
					<script>
  $(function() {
    $("#exam, #quiz,#project").on("keydown keyup", sum);
	function sum() {
	$("#total").val(Number($("#exam").val()) + Number($("#quiz").val())+ Number($("#project").val()));
	}
});
    </script>
					   <!-- Bootstrap -->
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

				</body>
				<?php include_once('footer.php');?> 
				</html>

				




