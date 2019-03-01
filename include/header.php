	<?php
 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $error='';
    
    if (isset($_POST['signin'])) {
        if (empty($_POST['email']) || empty($_POST['password']))
         { $error = "Email or Password is Empty"; }
        else
            {
              include_once 'db_connect.php';
                
            $email = $_POST['email'];
            $password = $_POST['password'];



            $query = mysqli_query( $con,"SELECT * from user_info where  email='$email' AND password='".md5($password)."'   ");
                
                $rows = mysqli_num_rows($query);

                if ($rows == 1) {

                while ($session=mysqli_fetch_array($query)) {
                	$_SESSION['email']=$session['email'];
	                $_SESSION['password']=$session['password'];
	                $_SESSION['name']=$session['name'];
	                $_SESSION['phone']=$session['phone'];
	                $_SESSION['address1']=$session['address1'];
	                $_SESSION['address2']=$session['address2'];
               		$_SESSION['uid']=$session['id'];
                }

                header("location: index.php");
                } else {
                $_SESSION['error'] = "Email or Password Do not Match";
                header("location: index.php");
                }
               
        }
    }
     ?>

<!-- This is Share button Code -->
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ad8da0022309d0013d4ef7c&product=sticky-share-buttons"></script>
<!-- This is Share button Code -->


<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						<span>S</span>mart
						<span>T</span>ech
						<img src="images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li style="border-right:none;">
						
					</li>
					
					<li>
						<a href="tel:0177777777"><span class="fa fa-phone" aria-hidden="true" style="color: green"></span> 0177777777</a>	
					</li>
					
						 <?php 

							if (isset($_SESSION['email'])) {
								
                                        include_once 'db_connect.php';
                                        $a=$_SESSION['email'];
                                        
                                        $result2 = mysqli_query($con,"SELECT * FROM `user_info` WHERE email='$a' ");
                                        while($row2 = mysqli_fetch_array($result2)){
                                            $name= $row2['name'];
                                    echo '<li style="color:#FF6F4C">'.$name.'</li>
                                     <li><a href="logout.php" style="color:#FF6F4C">Log Out</a></li>';
                                            
                                        }
                                           
                                            
                                       
							} else {
								 echo '<li><a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In</a></li>
							<li>
								<a href="#" data-toggle="modal" data-target="#myModal2">
									<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
							</li>
							<li>
								<a href="vendor/index.php" >
									<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Vendor</a>
							</li>


					';
							}
							 ?>
					
					
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="search.php" method="post">
						<input name="keyword" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" name="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->


				 <?php  
				  	if (isset($_SESSION['uid'])) {
				  		echo '
				  		<li class="li">
						<a href="#" id="cart_container" data-toggle="modal" data-target="#myModal00">
							<span class="glyphicon  glyphicon-shopping-cart" aria-hidden="true"></span> Cart <span class="badge"> 0</span></a>
					</li>
				  		';
				  	}else{
				  		echo '
				  		<li class="li">
						<a href="#" id="cart_container" data-toggle="modal" data-target="#myModal000">
							<span class="glyphicon  glyphicon-shopping-cart" aria-hidden="true"></span> Cart </a>
					</li>
				  		';
				  	}

				 ?>
					

<style type="text/css">
	.li{
		list-style: none; margin-top: 20px;  text-align: center;font-size: 22px;
	}
	.li a{
		border: 1px solid blue; padding: 5px 10px; border-radius: 8px;background:  #ff3333;
	}
	.li a:hover{
		border: 1px solid #FF5722;background: none;border-radius: 8px;
	}
</style>







				















				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

<!---------------- Sign In fade start ------------------>



		 <?php
        if (isset($_POST['signup'])) {
        
   include 'db_connect.php';
                        

      
                        
           		$name=$_POST['name'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$address1= $_POST['address1'];
				$address2= $_POST['address2'];

$sql = mysqli_query($con,"SELECT * FROM user_info WHERE  email ='$email'");
$rowCount = mysqli_num_rows($sql); // count the output amount
if ($rowCount > 0) {
 echo '<h4 style="color: red;text-align: center;background: lightgray;width: 35%;margin-left: 32%;padding: 8px;border-radius:4px;margin-bottom:15px; ">This Email Id is already used.</h4>';
}
else {
mysqli_query($con,"INSERT into   user_info (name, phone, email, address1, address2, password )
	VALUES('".$name."','".$phone."','".$email."','".$address1."','".$address2."','".md5($password)."')");
	echo '<h4 style="color: green;text-align: center;background: lightgray;width: 35%;margin-left: 32%;padding: 8px;border-radius:4px;margin-bottom:15px; ">Your Account is  Create 	</h4>';
}


}
?>  
<!---------------- add to cart non loging fade End ------------------>

<div class="modal fade" id="myModal000" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					
					
						
						<div class="panel-success" style="min-height: 100px;min-width: 70%;padding-bottom: 20px;">
							<div class="panel-heding">
								<div class="row">
									<div class="col-md-12">
										<h2 style="text-align: center;color: orange;">
										Plese At First Sign In

									</h2> 
									<h3 style="text-align: center;color: gray;margin-top: 10px">
										Then you can continue to add to cart

									</h3>
								<span style="float: right;margin-top: 25px;font-size: 17px;">
									<a  href="#" data-toggle="modal" data-target="#myModal1">
								Sign In </a> Now
								</span>
								</div>
									
								</div>
							</div>
							
							
						
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
<!---------------- Sign In fade start ------------------>

	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Smart Tech. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" placeholder="Email " name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<a href="forgot-password.php"> Forgot Password?</a><br/>
							<input type="submit" name="signin" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>

<!---------------- Sign In fade End ------------------>



<!---------------- Sign Up fade start ------------------>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Smart Tech! Let's set up your Account.
						</p>
		
						<form action="" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="name" required="">
							</div>
							<div class="styled-input">
								<input type="text" placeholder="Phone" name="phone" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<div class="styled-input">
								<textarea style="width: 100%;max-height: 70px;" name="address1" placeholder="Address Line 1" required=""></textarea>
								
							</div>
							<div class="styled-input" style="margin-top: 10px;">
								<textarea style="width: 100%;max-height: 70px;" name="address2" placeholder="Address Line 2" ></textarea>
								
							</div>
							<input type="submit" name="signup" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>



<!---------------- Sign Up fade End ------------------>



<div class="modal fade" id="myModal00" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						
						<div class="panel-success" style="min-height: 200px;min-width: 70%;padding-bottom: 20px;">
							<div class="panel-heding">
								<div class="row">
									<div class="col-md-3">Si.No </div>
									<div class="col-md-3">Image</div>
									<div class="col-md-3">Model</div>
									<div class="col-md-3">Price</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
									<!-- <div class="row">
										<div class="col-md-3">Si.No </div>
										<div class="col-md-3">Image</div>
										<div class="col-md-3">Model</div>
										<div class="col-md-3">Price</div>
									</div> -->
									
								</div>
							</div>
							<div class="panel-footer">
								<div class="row">	
									<div class="col-md-12">
										<u style="color:green"><a href="checkout.php" style="color: red;float: right;font-weight: bold;font-size: 17px;">Check out</a></u>
									</div>
								</div>
								
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>



<!---------------- Vendor Sign In fade start ------------------>

	<!-- <div class="modal fade" id="myModal222" tabindex="-1" role="dialog">
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Vendor Sign In </h3>
						<p>
							Sign In now, Let's start your Smart Tech. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="vendor/login.php" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" placeholder="Email " name="email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<a href=""> Forgot Password?</a><br/>
							<input type="submit" name="signin" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			
		</div>
	</div> -->

<!---------------- Vendor Sign In fade End ------------------>
	