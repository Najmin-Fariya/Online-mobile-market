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
					<li>contact Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Contact Us
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<?php include 'db_connect.php';?>

 
                        
    <?php
    $msg='';
       if (isset($_POST['submit'])) {
                        
@$name = ($_POST['name']);
@$email = ($_POST['email']);
@$subject = ($_POST['subject']);
@$message = ($_POST['message']);



@$seen = 'Unseen';



$query= mysqli_query($con,"INSERT INTO contact(name, email,subject, message,seen)
VALUES ('".$name."', '".$email."', '".$subject."', '".$message."','".$seen."')");
 $msg= '<h3 style="color:green;text-align:center;margin-bottom:15px;">Your valuable comment is recorded.</h3>';



}
?>  
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">

					<div class="contact-form wthree">

						<form action="" method="post">
							<?php echo $msg; ?>
							<div class="">
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="">
								<input class="text" type="text" name="subject" placeholder="Subject" required="">
							</div>
							<div class="">
								<input class="email" type="email" name="email" placeholder="Email" required="">
							</div>
							<div class="">
								<textarea placeholder="Message" name="message" required=""></textarea>
							</div>
							<input type="submit" name="submit" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>GET IN TOUCH :</h4>
							<p>
								<i class="fa fa-map-marker"></i> 123 Uttara , Dhaka, Bangladesh.</p>
							<p>
								<i class="fa fa-phone"></i> Phone : 0177777777</p>
							<!-- <p>
								<i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>
							<p> -->
								<i class="fa fa-envelope-o"></i> Email :
								<a href="mailto:example@mail.com">admin@gmail..com</a>
							</p>
						</div>
						<div class="col-xs-5 contact-agile">
							<img src="images/contact2.jpg" alt="">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
	<!-- map -->
	<div class="map w3layouts">
		
		    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7472102.873509243!2d90.16002180236818!3d23.872317781191715!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1525765422234"  allowfullscreen></iframe>
	</div>
	<!-- //copyright -->
	<?php include_once 'include/footer.php'; ?>

	<!-- js-files -->
	<?php include_once 'include/script.php'; ?>

	
</body>

</html>