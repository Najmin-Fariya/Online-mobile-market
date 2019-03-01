
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
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					
					
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">
				 Price Range : <?php echo $_POST['range']; ?>
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<?php include_once 'include/left-side-index.php'; ?>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- second section (nuts special) -->
					
					<!-- //second section (nuts special) -->
					<!-- third section (oils) -->
					<div class="product-sec1">
						<div class="row">
							<div class="col-md-12" id="product_msg">
							</div>
								
						</div>


						<?php
include_once 'db_connect.php';
if(isset($_POST['submit'])) {
	
	
	$range = $_POST['range'];	
	$range = explode('-',$range);
	$query = mysqli_query($con,"SELECT * FROM product WHERE approve='Approve' AND present_price BETWEEN $range[0] AND $range[1] ORDER BY id DESC LIMIT 21");	
	$numrows = mysqli_num_rows($query);
	if($numrows <= 0) {
		echo '<h2 style="color: red;text-align: center;">There is no product in this price</h2>			
						';
	} else {
		while($row = mysqli_fetch_array($query)) {
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
</div>';
		}	
	}
}
?>

 <style type="text/css">
	button.in{
		padding: 7px 20px ; background-color: #1CDDFF; color: white; font-size: 20px;border-radius: 5px;margin-top: 15px
	}
	button.in:hover{
		background: #000000;
	}
</style>
			















						
						<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>

	<!-- special offers -->
	<?php include_once 'include/special-offer.php'; ?>
	<!-- //special offers -->
	
	<!-- //copyright -->
	<?php include_once 'include/footer.php'; ?>

	<!-- js-files -->
	<?php include_once 'include/script.php'; ?>

	

	

</body>

</html>