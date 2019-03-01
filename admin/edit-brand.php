<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Dashboard</title>
    <?php include 'includes/link.php';  ?>
</head>

<body>

    <div id="wrapper">
        <?php include 'includes/nav.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Category </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-6 col-lg-offset-3">
                                    <form action="" method="post" role="form" style="border: 1px dotted gray;padding: 50px 70px;border-radius: 8px;">
                                        <h3 style="color: green;text-align: center;">
                             <?php include '../db_connect.php';?>
                            

                             <?php

if (isset($_POST['submit'])) {
@$id= $_GET['id'];


mysqli_query($con,"UPDATE brand SET brand='$_POST[brand]'  WHERE id='$id' ");
              


                echo "Brand Update Succesfuly";
            }
            
            
         ?>
          <?php
  @$id= $_GET['id'];
                    $result = mysqli_query($con,"SELECT * FROM brand  WHERE id='$id' ");

                    while($row = mysqli_fetch_array($result))
                       {

                        @$brand= $row['brand'];
                        
                                               
                    }
                    ?>


                        </h3>
                                    
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <input type="text" name="brand" class="form-control" value="<?php  echo $brand ?>">
                                        </div>
                                       

                                   
                                        <input type="submit" name="submit" class="btn btn-default btn-success" value="Update Brand">
                                        
                                    </form>
                                </div>
                   
                </div>
                

            </div>
        </div>
    </div>


   <?php include 'includes/script.php' ?>

</body>

</html>
