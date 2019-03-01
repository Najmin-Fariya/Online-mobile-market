
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
					<li>Category <i>|</i> </li>
					<li><?php 
						$category = $_GET['category'];
						 echo $category;
					 ?></li>

				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l"><?php 
						$category = $_GET['category'];
						 echo $category;
					 ?>
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
include ('db_connect.php');

								
?>

						<?php
include ('db_connect.php');

$category = $_GET['category'];

$product_quere=mysqli_query($con," SELECT *  FROM product WHERE  approve='Approve'  ORDER BY id  LIMIT 0,2 ");

	if (mysqli_num_rows($product_quere) > 0) {

		while ($row= mysqli_fetch_array($product_quere)) {

			echo '<div class="col-md-4 product-men">
	<div class="men-pro-item simpleCart_shelfItem">
		<div class="men-thumb-item">
			<img src="images/product/'.$row['photo'].'" alt="">
			<div class="men-cart-pro">
				<div class="inner-men-cart-pro">
					<a href="single.php?id='.$row['id'].'" class="link-product-add-cart">Quick View</a>
				</div>
			</div>
			<span class="product-new-top">New</span>
		</div>
		<div class="item-info-product ">
			<h4>
				<a href="single.php?id='.$row['id'].'"></a>
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

 <style type="text/css">
	button.in{
		padding: 7px 20px ; background-color: #1CDDFF; color: white; font-size: 20px;border-radius: 5px;margin-top: 15px
	}
	button.in:hover{
		background: #000000;
	}
</style>
						



						
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12">

								<center>
									<ul class="pagination" id="pageno">
										<!-- <li><a href="#">1</a></li> -->
										
									</ul>
								</center>
								
							</div>
		
						</div>
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