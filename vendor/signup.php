
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <?php include 'includes/link.php';  ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: -60px">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Vendor Sign Up</h3>
                    </div>
                     
                            

    <?php include '../db_connect.php';?>
                        
    <?php
       if (isset($_POST['signup'])) {
                        
@$name = ($_POST['name']);
@$email = ($_POST['email']);
@$brand = ($_POST['brand']);
@$phone = ($_POST['phone']);
@$password = md5($_POST['password']);
@$real_password = ($_POST['password']);

@$approve = 'Non Approve';


$sql = mysqli_query($con,"SELECT * FROM vendor WHERE  email = '$email' ");
$rowCount = mysqli_num_rows($sql); // count the output amount
if ($rowCount > 0) {
 echo '<h3 style="color: red;text-align: center;">Email already exist. </h3>';
}
else {
$query= mysqli_query($con,"INSERT INTO vendor(name, email,phone, brand, password, real_pass,   approve )
VALUES ('".$name."', '".$email."', '".$phone."', '".$brand."','".$password."', '".$real_password."', '".$approve."')");
 echo '<h3 style="color: green;text-align: center;">waiting for approval call </h3>';
}
}


?>                 


                       
                    <div class="panel-body">
                        <form  action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone" name="phone" type="text" autofocus required="">
                                </div>
                               <div class="form-group">
                            <select name="brand" class="form-control" required="">
                                <option value="">Select Brand</option>
                                 <?php include '../db_connect.php';?>
                                 <?php
                                     $i = 1;
                                     $result = mysqli_query($con,"SELECT * FROM brand ORDER BY id ASC ");

                                            while($row = mysqli_fetch_array($result))
                                               
                                            {
                                            echo'<option value="'.$row['brand'].'">'.$row['brand'].'</option>';
                                            }

                                          
                                            ?>
                            </select>


                        </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                
                            
                                <input type="submit" name="signup" class="btn btn-lg btn-success btn-block" value="Submit" >
                            </fieldset>
                            <span style="color: red;font-weight: bold;font-size: 18px;">
                               
                            </span>
                            <h5 style="color: green;font-weight: bold;font-size: 13.5px;text-align: center;padding-top: 20px;">If you have  account Please <a href="index.php">Sign In</a> at first</h5>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include 'includes/script.php' ?>

</body>

</html>
