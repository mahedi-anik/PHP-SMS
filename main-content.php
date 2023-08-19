
<div class="main-content">
		      <div class="row">
			     <div class="col-lg-4 col-md-6 col-sm-6">
				    <div class="card card-stats">
					   <div class="card-header">
					      <div class="icon icon-warning">
						     <span class="material-icons">people</span>
						  </div>
					   </div>
					   <div class="card-content">
					       <p class="category"><strong>Total Teachers</strong></p>
						   <h1 class="card-title">
						   	<?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT count(id) as id FROM `users` WHERE role='teacher'  ");
											while($row=mysqli_fetch_array($query)){
											?>
											<?php echo ucwords($row['id']); ?>
											<?php
											}

										?>
						    </h1>
					   </div>
	
					</div>
				 </div>
				 
				 <div class="col-lg-4 col-md-6 col-sm-6">
				    <div class="card card-stats">
					   <div class="card-header">
					      <div class="icon icon-rose">
						     <span class="material-icons">people</span>
						  </div>
					   </div>
					   <div class="card-content">
					       <p class="category"><strong>Total Students</strong></p>
						   <h1 class="card-title">
						   	<?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT count(id) as id FROM `users` WHERE role='student' ");
											while($row=mysqli_fetch_array($query)){
											?>
											<?php echo ucwords($row['id']); ?>
											<?php
											}

										?>

						   </h1>
					   </div>
					   
					</div>
				 </div>
				 
				 <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">equalizer</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Total Departments</strong></p>
                                    <h1 class="card-title">
                                    	<?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT count(departmentid) as id FROM `department` ");
											while($row=mysqli_fetch_array($query)){
											?>
											<?php echo ucwords($row['id']); ?>
											<?php
											}

										?>

                                    </h1>
                                </div>
                                
                            </div>
                        </div>
				  
			  </div>
			  
			  
			  
			  <!---row-second----->
			  
			  <div class="row">
			     <div class="col-lg-6 col-md-12">
				   <div class="card" >
				       <div class="card-header card-header-text">
					      <h1 class="card-title">Department Admin's List</h1>
					      <hr>
					   </div>
					   <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <th>Name</th>
								 <th>Department</th>
								 <th>Mobile</th>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * from users left join department on users.departmentid=department.departmentid left join course on users.courseid=course.courseid where users.role='department_admin' order by id desc,name asc limit 5 ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['departmentname']); ?></td>
												<td><?php echo ucwords($row['mobile']); ?></td>
												
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
		   
		   <div class="col-lg-6 col-md-12">
		      <div class="card" >
			     <div class="card-header card-header-text">
                   <h1 class="card-title">Teacher's List</h1>
                   <hr>
                 </div>				 
			 
			  <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <th>Name</th>
								 <th>Department</th>
								 <th>Course</th>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * from users left join department on users.departmentid=department.departmentid left join course on users.courseid=course.courseid where users.role='teacher' order by id desc,name asc limit 5 ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['departmentname']); ?></td>
												<td><?php echo ucwords($row['course']); ?></td>
												
											</tr>
											<?php
											}

										?>
							  </tbody>
						   </table>
					   </div>
		   </div> 
		</div>
	</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
		      <div class="card">
			     <div class="card-header card-header-text">
                   <h1 class="card-title">Student's List</h1>
                   <hr>
                 </div>				 
			 
			  <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <tr>
											<th>Name</th>
											<th>Department</th>
											<th>Session</th>
											<th>Section</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Status</th>
										</tr>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * from users left join department on users.departmentid=department.departmentid left join session on users.sessionid=session.sessionid left join section on users.sectionid=section.sectionid where users.role='student' order by id desc,name asc limit 10 ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>										
												<td><?php echo ucwords($row['departmentname']); ?></td>
												<td><?php echo ucwords($row['session']); ?></td>
												<td><?php echo ucwords($row['sectionname']); ?></td>
												<td><?php echo ucwords($row['email']); ?></td>
												<td><?php echo ucwords($row['mobile']); ?></td>
												<td><?php echo ucwords($row['status']); ?></td>
											</tr>
											<?php
											}

										?>
							  </tbody>
						   </table>
					   </div>
		   </div>
		</div>
		     </div>
			  </div>
			 
			 