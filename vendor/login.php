<?php
 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $error='';
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password']))
         { $error = "Email or Password is Empty"; }
        else
            {
               include_once '../db_connect.php';
                
            $email = $_POST['email'];
            $password = $_POST['password'];
           


            $query = mysqli_query( $con,"SELECT * from vendor where approve='Approve' AND  email='$email' AND password='".md5($password)."'   ");
                
                $rows = mysqli_num_rows($query);

                if ($rows == 1) {
                $_SESSION['login_email']=$email;
                $_SESSION['name']=$name;
                $_SESSION['password']=$password;

                header("location: manage-product.php");
                } else {
                $_SESSION['error'] = "Email or Password Do not Match";
                header("location: index.php");
                }
                mysqli_close($con);
        }
    }
     ?>