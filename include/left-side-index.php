<div class="side-bar col-md-3">
				<!-- <div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div> -->

		<!-- <div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
		</div> -->
		<div class="left-side">
					<h3 class="agileits-sear-head" style="font-weight: bold;font-size: 30px; text-align: center;">Brand</h3>
					<ul>

<?php 
include_once 'db_connect.php';

	$brand_qyery= mysqli_query($con,"SELECT * FROM  brand");
		
		while ($row = mysqli_fetch_array($brand_qyery)) {
			$bid= $row['id'];
			$brand= $row['brand'];
			echo '<li>
					<span class="span"><a href="brand.php?brand='.$brand.'" style="font-size: 17px; text-align: center;">'.$brand.'</a></span>
					</li>';
		}

										?>

						<a href="" style=""></a>
						
					</ul>
				</div>
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						
				<form action="price.php" method="post" >
					<select name="range" class="black" id="range" style="padding: 3px;">
					<option value="0-5000">Less than TK5000</option>
					<option value="5001-10000">TK5001 - TK10000</option>
					<option value="10001-15000">TK10001-TK15000</option>
					<option value="15001-20000">TK15001 - TK20000</option>

					<option value="20001-25000">TK20001 - TK25000</option>
					<option value="25001-30000">TK25001 - TK30000</option>
					<option value="30001-35000">TK30001 - TK35000</option>
					<option value="35001-40000">TK35001 - TK40000</option>

					<option value="40001-999999">TK40001 +</option>
					<option value="0-999999" selected="selected">All</option>
				</select>
				<!-- <input type="submit" name="submit" value="Search" /> -->
				<button type="submit" name="submit" class="btn btn-default" aria-label="Left Align" style="background-color: lightgreen">
							<span class="fa fa-search" aria-hidden="true" style="color: white;"> </span>
						</button>
				</form>
				
					</ul>
		</div>
				
			
				
				
</div>