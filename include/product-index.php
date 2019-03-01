<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			
				<!-- price range -->
				<?php include_once 'left-side-index.php'; ?>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- second section (nuts special) -->
					<div class="product-sec1 product-sec2">
						<div class="col-xs-7 effect-bg">
							<h3 class="">Pure Energy</h3>
							<h6>Enjoy our all healthy Products</h6>
							<!-- <p>Get Extra 10% Off</p> -->
						</div>
						<h3 class="w3l-nut-middle">Mobile &  Tablet</h3>
						<div class="col-xs-5 bg-right-nut">
							<img src="images/nut1.png" alt="">
						</div>
						<div class="clearfix"></div>
					</div>


					<!-- //second section (nuts special) -->
					<!-- third section (oils) -->
					
					<div class="product-sec1" >
						<h3 class="heading-tittle">Latest</h3>
						
						<div class="row">
							<div class="col-md-12" id="product_msg">
							</div>
								
						</div>

 <?php
include ('db_connect.php');
$product_quere=mysqli_query($con," SELECT *  FROM product WHERE  approve='Approve' AND special='Non Special' ORDER BY id DESC LIMIT 6 ");

	if (mysqli_num_rows($product_quere) > 0) {

		while ($row= mysqli_fetch_array($product_quere)) {

			echo '<div class="col-md-4 product-men">
	<div class="men-pro-item simpleCart_shelfItem">
		<div class="men-thumb-item">
			<img src="images/product/'.$row['photo'].'" alt="" style="width:160px;height:190px;">
			<div class="men-cart-pro">
				<div class="inner-men-cart-pro">
					<a href="details.php?id='.$row['id'].'" class="link-product-add-cart">Quick View</a>
				</div>
			</div>
			<span class="product-new-top">New</span>
		</div>
		<div class="item-info-product ">
			<h4>
				<a href="details.php?id='.$row['id'].'"></a>
			</h4>
			<div class="info-product-price">
			<h4  style="color: orange"> Model : <span style="color: red">'.$row['model'].'</span></h4>
			<h3  style="margin:5px 0px 7px 0px"> Brand : <span style="color: orange">'.$row['brand'].'</span></h3>
				<span class="item_price">TK: '.$row['present_price'].'</span>
				<del>'.$row['prev_price'].'</del>
			</div>
			<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
				
					
						
						
			<button pid="'.$row['id'].'" id="product" class="in">Add to Cart</button>
						
					
				
			</div>
		</div>
	</div>
</div>
			';
		}
	}

  ?>




						
						<div class="clearfix"></div>
					</div>
					
					
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>


<style type="text/css">
	button.in{
		padding: 7px 20px ; background-color: #1CDDFF; color: white; font-size: 20px;border-radius: 5px;margin-top: 15px
	}
	button.in:hover{
		background: #000000;
	}
</style>