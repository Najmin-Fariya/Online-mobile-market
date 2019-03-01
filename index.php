<?php 
session_start(); 
 ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<?php  include_once 'include/link.php'; ?>
</head>

<body>
	
	
	<!-- header-bot-->
	<?php include_once 'include/header.php'; ?>
	<!-- header- end-->

	<!-- navigation -->
	<?php include_once 'include/nav.php'; ?>
	<!-- //navigation -->
	<!-- banner -->
	<?php include_once 'include/slider.php'; ?>
	<!-- //banner -->

	<!-- top Products -->
	
	<?php include_once 'include/product-index.php'; ?>
	<!-- //top products -->
	<!-- special offers -->
	<?php include 'include/special-offer.php'; ?>
	<!-- //special offers -->
	<!-- newsletter -->

	<!-- footer -->
	<?php include_once 'include/footer.php'; ?>

	
	<?php include_once 'include/script.php'; ?>


</body>

</html>