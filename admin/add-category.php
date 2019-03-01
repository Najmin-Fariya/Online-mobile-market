<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Add Category</title>
    <?php include 'includes/link.php';  ?>
</head>

<body>

    <div id="wrapper">
        <?php include 'includes/nav.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Add</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-6 col-lg-offset-3">
                                    <form action="" method="post" role="form" style="border: 1px dotted gray;padding: 50px 70px;border-radius: 8px;">
                                        <h3 style="color: green;text-align: center;">
            <?php include 

            '../db_connect.php';
      
            if (isset($_POST['btn'])) {

            $category=$_POST['category'];
            
                
                
            
            
                

                mysqli_query($con,"INSERT into  category(category)
                    VALUES('".$category."')");
                echo "Category Save Succesfuly";
            }
            
            
         ?>


                        </h3>
                                    
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="category" class="form-control" placeholder="Category Name" required>
                                        </div>
                                       

                                   
                                        <input type="submit" name="btn" class="btn btn-default btn-success" value="Add Category">
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                   
                </div>
                

            </div>
        </div>
    </div>


   <?php include 'includes/script.php' ?>

</body>

</html>
