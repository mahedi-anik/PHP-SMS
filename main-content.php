
<div class="main-content">
		      <div class="row">
			     <div class="col-lg-3 col-md-6 col-sm-6">
				    <div class="card card-stats">
					   <div class="card-header">
					      <div class="icon icon-warning">
						     <span class="material-icons">equalizer</span>
						  </div>
					   </div>
					   <div class="card-content">
					       <p class="category"><strong>Total Teachers</strong></p>
						   <h3 class="card-title">
						   	<?php
@include 'config.php';

$sql = "SELECT COUNT(*) as count FROM users where role='teacher' ";
$result = $conn->query($sql);
$my=$result['count'];
echo $my;
?>
						    </h3>
					   </div>
	
					</div>
				 </div>
				 
				 <div class="col-lg-3 col-md-6 col-sm-6">
				    <div class="card card-stats">
					   <div class="card-header">
					      <div class="icon icon-rose">
						     <span class="material-icons">shopping_cart</span>
						  </div>
					   </div>
					   <div class="card-content">
					       <p class="category"><strong>Total Students</strong></p>
						   <h3 class="card-title">102</h3>
					   </div>
					   
					</div>
				 </div>
				 
				 <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                        <span class="material-icons">attach_money</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Total Departments</strong></p>
                                    <h3 class="card-title">$23,100</h3>
                                </div>
                                
                            </div>
                        </div>
				  <div class="col-lg-3 col-md-6 col-sm-6">
				    <div class="card card-stats">
					   <div class="card-header">
					      <div class="icon icon-info">
						     <span class="material-icons">follow_the_signs</span>
						  </div>
					   </div>
					   <div class="card-content">
					       <p class="category"><strong>Total Sections</strong></p>
						   <h3 class="card-title">+245</h3>
					   </div>
					</div>
				 </div>
				 
				 
			  </div>
			  
			  
			  
			  <!---row-second----->
			  
			  <div class="row">
			     <div class="col-lg-6 col-md-12">
				   <div class="card" style="min-height:300px">
				       <div class="card-header card-header-text">
					      <h4 class="card-title">Admins Stats</h4>
					   </div>
					   <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <th>Name</th>
								 <th>Email</th>
								 <th>Mobile</th>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * FROM `users` WHERE role='department_admin' order by name asc ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['email']); ?></td>
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
		      <div class="card" style="min-height:300px">
			     <div class="card-header card-header-text">
                   <h4 class="card-title">Teacher Status</h4>
                 </div>				 
			 
			  <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <th>Name</th>
								 <th>Email</th>
								 <th>Mobile</th>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * FROM `users` WHERE role='teacher' order by name asc ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['email']); ?></td>
												<td><?php echo ucwords($row['mobile']); ?></td>
												
											</tr>
											<?php
											}

										?>
							  </tbody>
						   </table>
					   </div>
		   </div> 
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12">
		      <div class="card" style="min-height:300px">
			     <div class="card-header card-header-text">
                   <h4 class="card-title">Student Status</h4>
                 </div>				 
			 
			  <div class="card-content table-responsive">

					       <table class="table table-hover">
						      <thead class="text-primary">
								 <th>Name</th>
								 <th>Email</th>
								 <th>Mobile</th>
								 </tr>
							  </thead>
							  <tbody>
							     <?php
											@include 'config.php';

											$query=mysqli_query($conn,"SELECT * FROM `users` WHERE role='student' order by name asc ");
											while($row=mysqli_fetch_array($query)){
											?>
											<tr>
												<td><?php echo ucwords($row['name']); ?></td>
												<td><?php echo ucwords($row['email']); ?></td>
												<td><?php echo ucwords($row['mobile']); ?></td>
												
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
			 
			 