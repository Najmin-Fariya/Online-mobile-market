<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						    <?php include_once 'db_connect.php';?>
						<?php
						$div = "";
						$sql = mysqli_query($con,"SELECT * FROM slider where id='2'");
						$rowCount = mysqli_num_rows($sql); // count the output amount
						if ($rowCount > 0) 
						{
						while($row = mysqli_fetch_array($sql))
						{ 

						$title = $row["title"];
                         $details = $row["details"];
                        
                         $save=$row["save"];


						 $div .='


						 <h3><span>'.$title.'</span>
						</h3>
						<p>'.$details.'<span>'.$save.'%</span> </p>
						<a class="button2" href="product.html">Shop Now </a>';
			  		  	}

						} else {
								$div = "Here is no news yet";
							}
							


							 echo    "$div";  

					?>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">

                      


                            <?php include_once 'db_connect.php';?>
						<?php
						$div = "";
						$sqll = mysqli_query($con,"SELECT * FROM slider where id='1'");
						$rowCount = mysqli_num_rows($sqll); // count the output amount
						if ($rowCount > 0) 
						{
						while($row = mysqli_fetch_array($sqll))
						{ 

						$title = $row["title"];
                         $details = $row["details"];
                        
                         $save=$row["save"];


						 $div .='


						 <h3><span>'.$title.'</span>
						</h3>
						<p>'.$details.'<span>'.$save.'%</span> </p>
						<a class="button2" href="product.html">Shop Now </a>';
			  		  	}

						} else {
								$div = "Here is no news yet";
							}
						


							 echo    "$div";  

					?>
          
						
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						    <?php include_once 'db_connect.php';?>
						<?php
						$div = "";
						$sql = mysqli_query($con,"SELECT * FROM slider where id='3'");
						$rowCount = mysqli_num_rows($sql); // count the output amount
						if ($rowCount > 0) 
						{
						while($row = mysqli_fetch_array($sql))
						{ 

						$title = $row["title"];
                         $details = $row["details"];
                        
                         $save=$row["save"];


						 $div .='


						 <h3><span>'.$title.'</span>
						</h3>
						<p>'.$details.'<span>'.$save.'%</span> </p>
						<a class="button2" href="product.html">Shop Now </a>';
			  		  	}

						} else {
								$div = "Here is no news yet";
							}
							


							 echo    "$div";  

					?>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<?php include_once 'db_connect.php';?>
						<?php
						$div = "";
						$sq = mysqli_query($con,"SELECT * FROM slider where id='4'");
						$rowCount = mysqli_num_rows($sq); // count the output amount
						if ($rowCount > 0) 
						{
						while($row = mysqli_fetch_array($sq))
						{ 

						$title = $row["title"];
                         $details = $row["details"];
                        
                         $save=$row["save"];


						 $div .='


						 <h3><span>'.$title.'</span>
						</h3>
						<p>'.$details.'<span>'.$save.'%</span> </p>
						<a class="button2" href="product.html">Shop Now </a>';
			  		  	}

						} else {
								$div = "Here is no news yet";
							}
						


							 echo    "$div";  

					?>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>