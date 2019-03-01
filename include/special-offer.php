<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					
	





					
					
					
					
					
					
					
<?php
include ('db_connect.php');
$product_quere=mysqli_query($con," SELECT *  FROM product WHERE  approve='Approve' AND special='Special' ORDER BY id DESC LIMIT 6 ");

	if (mysqli_num_rows($product_quere) > 0) {

		while ($row= mysqli_fetch_array($product_quere)) {

			echo '<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="details.php?id='.$row['id'].'">
									<img src="images/product/'.$row['photo'].'" alt="" style="width:160px;height:170px;">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									Model : <a href="details.php?id='.$row['id'].'">'.$row['model'].'</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>Price  Now  TK : '.$row['present_price'].'</h6>
									<p>Previous Price : '.$row['prev_price'].'</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									
								</div>
							</div>
						</div>
					</li>
			';
		}
	}

  ?>









				</ul>
			</div>
		</div>
	</div>