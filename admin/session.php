<?php
	 
    include_once '../db_connect.php';
	session_start(); 

	
	$user_check=$_SESSION['login_email'];
	$ses_sql=mysqli_query($con, "SELECT  email from login where email='$user_check'");
	$row = mysqli_fetch_assoc($ses_sql);
	// $_SESSION['email']=
	$login_session =$row['email'];
	if(!isset($login_session)){
	mysqli_close($con);
	header('Location: index.php');
	}
?>