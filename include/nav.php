

<div class="ban-top">
		<div class="container">
			
		
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list" >
								<li>
									<a class="nav-stylehead" href="index.php">Home
										
									</a>
								</li>
								
								
								
								
								<!-- 
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Brand
										
									</a>
									<ul class="dropdown-menu agile_short_dropdown">

									
									</ul>
								</li> -->



<?php 
include_once 'db_connect.php';


	$cat_qyery= mysqli_query($con,"SELECT * FROM  category");
		
		while ($rows = mysqli_fetch_array($cat_qyery)) {
			$cid= $rows['category_id'];
			$category= $rows['category'];
			echo '<li>
					<a class="nav-stylehead" href="category.php?category='.$category.'">'.$category.'</a>
					</li>';
		}

										?>






								<li>
									<a class="nav-stylehead" href="contact.php">Contact
										
									</a>
								</li>








								
							</ul>
						</div>
					</div>
				</nav>
		





















		</div>
	</div>




<script type="text/javascript">
$(document).ready(function() 
{
 $('#nav li').hover(function() 
 {
  $('ul', this).slideDown('fast');
 }, function() 
 {
  $('ul', this).slideUp('fast');
 });
});
</script>