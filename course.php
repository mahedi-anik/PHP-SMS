	<?php include_once('header.php');?>
	<?php

		@include 'config.php';

		session_start();

		if(!isset($_SESSION['user'])){
			header('location:login_form.php');
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
		<title>course page</title>

		<!-- custom css file link  -->
		<link rel="stylesheet" href="css/style.css">
		  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
	</head>
	<body>

		<div class="main-content">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card" style="min-height:485px">
						<div class="card-header card-header-text">
							<h2 class="card-title" style="text-align: center;">Courses</h2>
							<hr>
							<a href="add_course.php" class="btn btn-primary mb-3">Add New</a>
						</div>
						<div class="card-content table-responsive">
							<?php
								if (isset($_GET["msg"])) {
									$msg = $_GET["msg"];
									echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
										' . $msg . '
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';
								}
							?>
							<table class="table table-hover">
								<thead class="text-primary">
									<tr><th>ID</th>
										<th>Course</th>
										<th>Department</th>
										<th>Marks</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										@include 'config.php';

										$query=mysqli_query($conn,"select * from `course` left join department on course.departmentid=department.departmentid order by course asc");
										while($row=mysqli_fetch_array($query)){
										?>
										<tr>
											<td><?php echo ucwords($row['courseid']); ?></td>
											<td><?php echo ucwords($row['course']); ?></td>
											<td><?php echo ucwords($row['departmentname']); ?></td>
											<td><?php echo ucwords($row['totalmarks']); ?></td>
											<td><?php echo ucwords($row['description']); ?></td>
											<td>
												 <a href="edit_course.php?id=<?php echo $row['courseid'] ?>&departmentid=<?php echo $row['departmentid'] ?>" ><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete_course.php?id=<?php echo $row['courseid'] ?>" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
											</td>
										</tr>
										<?php
										}

									?>

								</tbody>
							</table>
						</div>
					</div>
					<div>
					</div>
				</div>
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

			</body>
			<?php include_once('footer.php');?> 
			</html>

			




