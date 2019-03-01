<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
include('login.php');

if(isset($_SESSION['login_email'])){
header("location: dashbord.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <?php include 'includes/link.php';  ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form  action="login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email" autofocus required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                            
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login" >
                            </fieldset>
                            <span style="color: red;font-weight: bold;font-size: 18px;">
                                <?php
                                    if(isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-primary"><?php echo $_SESSION['error'];unset($_SESSION['error'])?>
                                            
                                        </div>
                                    <?php }
                                    ?>
                            </span>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include 'includes/script.php' ?>

</body>

</html>
