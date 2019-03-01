
<!DOCTYPE html>
<html lang="zxx">

<head>
	<?php include_once 'include/link.php'; ?>

</head>

<body>

	<!-----this is facebook comment option javascript ---------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=145387382778573&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-----this is facebook comment option javascript ---------->

<!-----this is facebook share and like option javascript ---------->
<script>
   function myFunction() {
   var x = document.URL;
   document.getElementById("jinu").src = 'https://www.facebook.com/plugins/share_button.php?href='+x+'&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId';
  }
  </script>

<!-----this is facebook share and like option javascript ---------->
	
	
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
					<li>Details Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Product Details
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->

		<?php 
		$id=$_GET['id'];
		$res= mysqli_query($con, "SELECT * FROM product WHERE approve='Approve' AND id = '$id'");
		while ($row=mysqli_fetch_array($res)){
			
			?>
		<form name="form1" action="" method="POST">
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul>
							<li style="list-style: none;">
								<div>
									<img style="width: 250px; " src="images/product/<?php echo $row['photo'] ?>" data-imagezoom="true" class="img-responsive" alt=""> 
								</div>
							</li>
						</ul>	
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Brand :<span class="item_price" style="font-size: 24px;"> </span>
					<?php  
				 			$brand=$row['brand'];
				 			echo ($brand);
				 	 ?>
                 </br></br>Model :<span class="item_price" style="font-size: 24px;"> 
				 </span>
				    <?php  $model=$row['model'];
				 			echo ($model);
				 			?></h4>
				 <p><span style="color: lightgreen;font-weight: 6px bold;">Details : </span></br></br> 
				 	<?php  
				 			$details=$row['details'];
				 			echo nl2br($details);
				 	 ?>
				 </p>
				
				<p>
					<span class="item_price">Tk <?php echo $row['present_price'] ?></span>
					<del>TK <?php echo $row['prev_price'] ?></del>
					<label>Free delivery</label>
				</p>
				<div class="single-infoagile">
					<ul>
						<li>
							Cash on Delivery Eligible.
						</li>
						
						
						
					</ul>
				</div>
				
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						
					
					<button pid="<?php echo $row['id']; ?>" id="product" class="in">Add to Cart</button>
						
					</div>

				</div>

			</div>

			</form>


	<?php
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
<div class="col-md-12">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<!-----this is facebook comment option javascript code---------->
					<div id="jinu" class="fb-comments" data-href="" data-width="" data-numposts="4"></div>

					<!-----this is facebook comment option javascript code---------->
				</div>
				<div class="col-md-2"></div>
			</div>
			
		</div>

			
			
			<div class="clearfix"> </div>
		</div>

		

	</div>
	


<!-- special offers -->
	<?php include_once 'include/special-offer.php'; ?>
	<!-- //special offers -->
	
	<!-- //copyright -->
	<?php include_once 'include/footer.php'; ?>















	
	<!-- //for bootstrap working -->
	<!-- //js-files -->



	<?php include_once 'include/single-page-script.php'; ?>

</body>

</html>