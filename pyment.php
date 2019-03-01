<?php 
 session_start();
	if(!isset($_SESSION['uid'])){

	header('Location: index.php');
	}

include 'db_connect.php';

if (isset($_POST['btn'])) {




$uid=$_SESSION['uid'];
mysqli_query($con, "INSERT INTO sub_cart ( p_id, ip_add, user_id, model,photo,qty,price,total_amount) 
SELECT p_id, ip_add, user_id, model,photo,qty,price,total_amount  from `cart` WHERE user_id='$uid' ");

$uid=$_SESSION['uid'];
$res= mysqli_query($con, "SELECT * FROM cart WHERE user_id= '$uid'");
		while ($row=mysqli_fetch_array($res)){
			$cart_id=$row['id'];

		}


mysqli_query($con, "UPDATE  sub_cart SET cart_id='$cart_id' WHERE user_id = '$uid'  ");


$uid=$_SESSION['uid'];
$date= date('d-M-Y');
$address2=$_POST['address2'];
mysqli_query($con,"INSERT INTO  order_id (user_id, delevery_status, datee,address)
    VALUES('".$uid."', 'Non Delevery', '$date','$address2')");



	
$uid=$_SESSION['uid'];
mysqli_query($con, "INSERT INTO order_product (cart_id, p_id, ip_add, user_id, model,photo,qty,price,total_amount) 
SELECT cart_id, p_id, ip_add, user_id, model, photo, qty, price, total_amount  from `sub_cart` WHERE user_id='$uid' ");


$uid=$_SESSION['uid'];
$res= mysqli_query($con, "SELECT * FROM order_id WHERE user_id= '$uid'");
		while ($row=mysqli_fetch_array($res)){
			$order_id=$row['id'];

		}

$uid=$_SESSION['uid'];
$res= mysqli_query($con, "SELECT * FROM sub_cart WHERE user_id= '$uid'");
		while ($row=mysqli_fetch_array($res)){
			$cart_id=$row['cart_id'];

		}


$date= date('d-M-Y');
mysqli_query($con, "UPDATE  order_product SET order_id='$order_id', datee = '$date' WHERE user_id = '$uid' AND cart_id='$cart_id' ");




 mysqli_query($con,"DELETE FROM cart  WHERE user_id='$uid' ");

 mysqli_query($con,"DELETE FROM sub_cart  WHERE user_id='$uid' ");


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

	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Order submit</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
				<div class="checkout-right">
					
					<div class="row">
						<center>
							<div class="col-md-2">
							</div>
							<div class="col-md-8">
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div class="panel-body">
										<h1>Thankyou</h1>
										<hr>
										<p> Hellow <?php echo $_SESSION['name'] ; ?>, Your Order Process is Successfull.
											<br/>  </p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shoping</a>
									</div>
									<div class="panel-footer"></div>
									
								</div>
							</div>
						</center>
						
					</div>
					
					

				</div>















			
		</div>
	</div>
	<!-- //checkout page -->

	

	<!-- //copyright -->
	<?php include_once 'include/footer.php'; ?>

	<!-- js-files -->
	<?php include_once 'include/script.php'; ?>









</body>

</html>