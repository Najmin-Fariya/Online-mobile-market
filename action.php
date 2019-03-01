<?php 
session_start();
include_once 'db_connect.php';


if (isset($_POST['addToProduct'])) {

	if (isset($_SESSION['uid'])) {

	$p_id= $_POST['proId'];
	$user_id= $_SESSION['uid'];
	$sqll ="SELECT * FROM cart WHERE p_id = '$p_id' AND user_id='$user_id' ";
	$cart_res=mysqli_query($con, $sqll );
	$count= mysqli_num_rows($cart_res) ;

	if ($count > 0) {
		 echo "<div class='alert alert-danger'>
		 		<b>Product is already added into cart Continue Shopping..!</b>
		 		</div>";
	}else{
		$sql =mysqli_query($con, "SELECT * FROM product WHERE id = '$p_id'  ");
		$row =mysqli_fetch_array($sql);
		$id= $row['id'];
		$model= $row['model'];
		$photo= $row['photo'];
		$present_price= $row['present_price'];

		$sql ="INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `model`, `photo`, `qty`, `price`, `total_amount`) 
		VALUES (NULL, '$p_id', '0', '$user_id', '$model', '$photo', '1', '$present_price', '$present_price')";
		if (mysqli_query($con,$sql)) {
			
			echo "<div class='alert alert-success'> 
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b> Product is Added..!</b>
				</div>";
		}

	}


	}else{
		echo "<div class='alert alert-danger'> 
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b> Sory..! go and Sign Up First then you can add a Product your Cart</b>
				</div>";
	}
	

}




if (isset($_POST['get_cart_product']) || isset($_POST['cart_checkout']) ) {
	@$uid= $_SESSION['uid'];
	$sql=mysqli_query($con,"SELECT * FROM cart WHERE user_id= '$uid'");
	$count= mysqli_num_rows($sql);
	if ($count > 0) {
		$no= 1;
		$total_amt = 0;
		 while ($row=mysqli_fetch_array($sql)) {
		 	$id= $row['id'];
		 	$model= $row['model'];
		 	$photo= $row['photo'];
		 	$pro_id= $row['p_id'];
		 	$qty= $row['qty'];
		 	$price= $row['price'];
		 	$total= $row['total_amount'];

		 	$price_array= array($total);
		 	$total_sum = array_sum($price_array);
		 	$total_amt= $total_amt + $total_sum;




		 	if (isset($_POST['get_cart_product'])) {

		 		echo "
		 		<div class='row'>
					<div class='col-md-3'>$no </div>
					<div class='col-md-3'><img src='images/product/$photo' height='50px' width='60px'>
					</div>
					<div class='col-md-3'>$model</div>
					<div class='col-md-3'>TK : $price</div>
				</div>
		 		";
		 		 $no= $no+1;
		 	}else{

		 		echo "
		 			
					<div class='row' style='text-align: center; padding:10px; border-bottom:1.5px dotted gray'>
						<div class='col-md-1'>$no</div>
						<div class='col-md-2'>
						
							<div class='btn-group'>
								<a href='' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>

								<a href='' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
										
									</div>
						</div>
						<div class='col-md-2'><img src='images/product/$photo' style='width: 100px ;height: 100px'></div>
						<div class='col-md-1'> $model</div>
						
						<div class='col-md-1'>
							<input type='text' class='form-control qty'  pid='$pro_id' id='qty-$pro_id' value='$qty'  style='text-align: center;font-weight: bold;'>
						</div>
						<div class='col-md-2' >
							<input type='text' class='form-control price'  value='$price' pid='$pro_id' id='price-$pro_id' disabled style='text-align: center;font-weight: bold'>
						</div>
						<div class='col-md-2'>
							<input type='text' class='form-control total'  value='$total' pid='$pro_id' id='total-$pro_id' disabled style='text-align: center;font-weight: bold'>
						</div>
						
					</div>
		 		";
		 		$no= $no+1;

		 	}

		 	
		 }
		 if (isset($_POST['cart_checkout'])) {

		 	 echo "<div class='row' style='color: green;font-size:17px;'>
						<div class='col-md-9'></div>
						<div class='col-md-3'>
							<b> Total TK : $total_amt</b>
						</div>
						
					</div>";
		 }
	

			$x=0;
			$uid= $_SESSION['uid'];
			$sql=mysqli_query($con,"SELECT * FROM cart WHERE user_id='$uid'");
			while ($row= mysqli_fetch_array($sql)) {
				$x++;	
			

		 echo '
		 <input type="hidden" name="item_name_'.$x.'"
		  value="'.$row["model"].'">
		<input type="hidden" name="item_nnumber_'.$x.'" value="'.$x.'">
		<input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
		<input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
		';
		
			}


			$x=0;
			$uid= $_SESSION['uid'];
			$sql=mysqli_query($con,"SELECT * FROM cart WHERE user_id='$uid'");
			while ($row= mysqli_fetch_array($sql)) {
				$x++;	
			

		 echo '
		 <input type="hidden" name="item_name_'.$x.'"
		  value="'.$row["model"].'">
		<input type="hidden" name="item_nnumber_'.$x.'" value="'.$x.'">
		<input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
		<input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">
		';
		
			}

	}
}


if (isset($_POST['cart_count']) AND isset($_SESSION['uid'])) {
	@$uid= $_SESSION['uid'];
	$sql=mysqli_query($con,"SELECT * FROM cart WHERE user_id= '$uid'");
	$count =mysqli_num_rows($sql);
	echo $count;
}



if (isset($_POST['removeFromCart'])) {
	$pid=$_POST['removeId'];
	@$uid= $_SESSION['uid'];
	$sql= mysqli_query($con,"DELETE FROM cart WHERE user_id ='$uid' AND p_id='$pid'");
	if ($sql) {
		echo "<div class='alert alert-danger text-center'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		 		<b>Product is Remove from Cart Continue Shopping..!</b>
		 	</div>";
	}
}



if (isset($_POST['updateProduct'])) {
	$uid = $_SESSION['uid'];
	$pid = $_POST['updateId'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$total = $_POST['total'];
	

	$sql=mysqli_query($con," UPDATE cart SET qty='$qty', price=$price, total_amount='$total'  WHERE user_id='$uid' AND p_id='$pid'  ");

	if ($sql) {
		echo "<div class='alert alert-success text-center'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		 		<b>Product is Update from Cart Continue Shopping..!</b>
		 	</div>
		 	";
	}	
}















?>
