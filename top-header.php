<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <div class="top-navbar" >
		      <nav class="navbar  navbar-expand-sm">
			     <button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
				   <span class="material-icons">arrow_back_ios</span>
				 </button>
				 
				 
				 <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
				   data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
				    <span class="material-icons">more_vert</span>
				 </button>
				 <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"  id="navbarcollapse">
				    
					<ul class="nav navbar-nav" >				
				
					<li class="nav-item">
					  <a class="nav-link">hi, <?php echo $_SESSION['admin_name'] ?></a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="logout.php"><span class="material-icons">logout</span></a>
					</li>
					</ul>			 
				 </div>
				 
			  </nav>
		   </div>
		   
		   
		   