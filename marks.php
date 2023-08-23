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
			<title>Enrollment page</title>

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
								<h2 class="card-title" style="text-align: center;">Exam Marks Entry</h2>
								<hr>
								<a href="add_marks.php" class="btn btn-primary mb-3">Add New</a>
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
											<th>Session</th>
											<th>Course</th>
											<th>Student</th>
											<th>Exam Marks</th>
											<th>Quiz Marks</th>
											<th>Project Marks</th>
											<th>Total Marks</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT session,course,name,exam,quiz,project,total,exammarks.sessionid,exammarks.studentid,exammarks.courseid,exammarksid from exammarks LEFT JOIN session on exammarks.sessionid=session.sessionid LEFT JOIN course on exammarks.courseid=course.courseid left join users on exammarks.studentid=users.id ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['exammarksid']); ?></td>
												<td><?php echo ucwords($row['session']); ?></td>
												<td><?php echo ucwords($row['course']); ?></td>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['exam']); ?></td>
												<td><?php echo ucwords($row['quiz']); ?></td>
												<td><?php echo ucwords($row['project']); ?></td>
												<td><?php echo ucwords($row['total']); ?></td>
												<td>
													 <a href="edit_marks.php?id=<?php echo $row['exammarksid'] ?>&sessionid=<?php echo $row['sessionid'] ?>&studentid=<?php echo $row['studentid'] ?>&courseid=<?php echo $row['courseid'] ?>" ><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
	              <a href="delete_marks.php?id=<?php echo $row['exammarksid'] ?>" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a>
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
				</div>
			</div>
	   <!-- Bootstrap -->
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

				</body>
				<?php include_once('footer.php');?> 
				</html>

				




