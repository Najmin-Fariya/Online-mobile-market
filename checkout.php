<?php

     session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<?php include_once 'include/link.php'; ?>
</head>

<body>
	     														
		
	<!-- header-bot-->
	<?php include_once 'include/header.php'; ?>
	<!-- header- end-->

	<!-- navigation -->
	<?php include_once 'include/nav.php'; ?>
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
		<div class="checkout-right">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="cart_msg">
					<!-- Cart message -->
				</div>
				<div class="col-md-2"></div>
				
			</div>
			
			
			<div class="panel panel-Primary">
				<!-- <div class="panel-heading"><h2 class="text-center" style="background-color: black">Cart Checkout</h2></div> -->
				<div class="panel-body">
					<div class="row" style="background-color: black; padding: 10px; color: white;font-size: 17px;font-weight: bold;text-align: center;">
						<b >
						<div class="col-md-1">SL.NO</div>
						<div class="col-md-2">Action</div>
						<div class="col-md-2">Prodduct Image</div>
						<div class="col-md-1"> Model</div>
						<div class="col-md-1">Quantity</div>
						<div class="col-md-2">Price</div>
						
						<div class="col-md-2"> Total Price in TK </div>
						</b>
						
					</div>
					<div id="cart_checkout">
						
					</div>
				</div>
				<div class="panel-footer">
					
					
				</div>
				
			</div>

		</div>


				<form action="pyment.php" method="post" class="">
						<div class="controls">
							<textarea style="width: 100%"  rows="5" name="address2" placeholder="Please Enter Your Delivery  Address..."></textarea>
							

										
						</div>
					
						<button class="submit check_out" type="submit" name="btn" style="float: left;">
						Order Now  </button>
						<h2 style="width: 30%;float: left;margin-left: 60px;margin-top: 20px;">Cash on delivery</h2>
						
					</form>



			
		</div>
	</div>
	<!-- //checkout page -->

	

	<!-- //copyright -->
	<?php include_once 'include/footer.php'; ?>

	<!-- js-files -->
	<?php include_once 'include/script.php'; ?>









</body>

</html>