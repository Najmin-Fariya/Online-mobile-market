<?php include'include/link.php';?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>

<style type="text/css">
  

  body{
    background-color: #cce6ff; 
  }
</style>

<body >
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Forgot your password?</div>
      <div class="card-body">
        <form action="" method="post">
          
          <div class="form-group">
            <label >Enter your email address</label>
            <input class="form-control" name="email" type="email"  placeholder="example@gmail.com" required="please fill out this field">
          </div>
          

          <input class="btn btn-success " type="submit" name="submit" value="Submit">
          
          

        </form>
      </div>
    </div>
  </div>


<?php

  include 'db_connect.php';
    
    if(isset($_POST['submit']))
    {
    
      $email =  $_POST['email']; 

   $email_check=mysqli_query($con,"select * from user_info where email='".$email."'");
    $count=mysqli_num_rows($email_check);



    if ($count !=0) {
      $random=rand(72891,92729);
      $new_pass=$random;

      $email_pass=$new_pass;

      $sql = mysqli_query($con,"UPDATE user_info SET password='".$new_pass."' WHERE email='$email' ");

     
     $to = $email;


      $subject="Login information";
     

$message = 'Hello,
Your email and password is following:
E-mail: '.$email.'
Your new password : '.$email_pass.'
Now you can login with this email and password.';

      $from="From: bristibithi143@gmail.com";
      mail($to, $subject, $message, $from);
      








      echo $message ;
    
  }
    else
    {
      echo "This email does not exist";
    }

}
?>

 
</body>

</html>