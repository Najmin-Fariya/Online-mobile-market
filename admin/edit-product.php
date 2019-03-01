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
                    <h1 class="page-header">Update News </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-8 col-lg-offset-2">
                                    <form id="demo-form2" action="" method="post" enctype="multipart/form-data" role="form" style="border: 1px dotted gray;padding: 20px 70px;border-radius: 8px;">
                                        <h3 style="color: green;text-align: center;">
<?php include '../db_connect.php';?>





          <?php
          @$id= $_GET['id'];

if (isset($_POST['submit'])) {


                     
if(!empty($_FILES['file']['name'])) //new image uploaded
{

$query = mysqli_query($con,"SELECT * FROM product WHERE id='$id' ");
while ($delete = mysqli_fetch_array($query))
 {
    $image = $delete['photo'];
     $file= '../images/product/'.$image;
     unlink($file);
  }









        if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] =="image/pjpeg"))
        && ($_FILES["file"]["size"] < 2000000))
        {
        if ($_FILES["file"]["error"] > 0)
         {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
         if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
        echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
         {
         @$t=uniqid();
         $i=$t.$_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"],
             "../images/product/$i");
                                
        }
        }
        }
        else
        {
        echo "Invalid file";
        }





   //process your image and data
   $sql = mysqli_query($con,"UPDATE product SET model='$_POST[model]' , brand='$_POST[brand]' ,category='$_POST[category]' , present_price='$_POST[present_price]', prev_price='$_POST[prev_price]' , details='$_POST[details]',product_keyword='$_POST[product_keyword]', photo='$i'  WHERE id='$id' ");//save to DB with new image name

   echo "Product Update successfully";
}
else // no image uploaded
{
   // save data, but no change the image column in MYSQL, so it will stay the same value
   $sql = mysqli_query($con,"UPDATE product SET model='$_POST[model]' , brand='$_POST[brand]' ,category='$_POST[category]' , present_price='$_POST[present_price]', prev_price='$_POST[prev_price]' , details='$_POST[details]',product_keyword='$_POST[product_keyword]'  WHERE id='$id' ");//save to DB but no change image column

   echo "Product Update successfully";
}

    }
            
            
         ?>



      <?php include '../db_connect.php';?>
                 <?php
                    @$id= $_GET['id'];
                    $result = mysqli_query($con,"SELECT * FROM product  WHERE id='$id' ");

                    while($row = mysqli_fetch_array($result))
                       {


                        $brand = $row['brand'];
                        $model= $row['model'];
                        $category= $row['category'];
                        $details= $row['details'];
                        $present_price= $row['present_price'];
                        $prev_price= $row['prev_price'];
                        $photo= $row['photo'];
                        $product_keyword= $row['product_keyword'];

                        
                                               
                    }
                    ?>

           


                        </h3>
                       
                         


                        <div class="form-group">
                             <label>Category</label>
                            <select name="category" class="form-control" required="">
                                <option value="">Select Category</option>
                                 <?php include '../db_connect.php';?>
                                 <?php
                                     $i = 1;
                                     $result = mysqli_query($con,"SELECT * FROM category ORDER BY category_id ASC ");

                                            while($row = mysqli_fetch_array($result))
                                               
                                            {
                                            echo'<option value="'.$row['category'].'">'.$row['category'].'</option>';
                                            }

                                          
                                            ?>
                            </select>


                        </div>
                        <div class="form-group">
                             <label>Brand</label>
                            <select name="brand" class="form-control" required="">
                                <option value="">Select Brand</option>
                                 <?php include '../db_connect.php';?>
                                 <?php
                                    
                                     $result = mysqli_query($con,"SELECT * FROM brand ORDER BY id ASC ");

                                            while($row = mysqli_fetch_array($result))
                                               
                                            {
                                            echo'<option value="'.$row['brand'].'">'.$row['brand'].'</option>';
                                            }

                                          
                                            ?>
                            </select>


                        </div>
                        


                        
                        
                        
                        <div class="form-group">
                          <label>Model</label>
                            <input type="text" name="model" value="<?php echo $model ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Present Price</label>
                            <input type="text" name="present_price" value="<?php echo $present_price; ?>" class="form-control" required>
                        </div>
                         <div class="form-group">
                          <label>Previous Price</label>
                            <input type="text" name="prev_price" value="<?php echo $prev_price; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Product Keywors</label>
                            <input type="text" name="product_keyword" value="<?php echo $product_keyword; ?>" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <textarea name="details" class="form-control" placeholder="Write details here..." rows="8" required><?php echo $details ?></textarea>
                        </div>
                        <div>
                            <?php  echo '<img src="../images/product/'.$photo.'" height="100px">'; ?>
                            <input type="file" name="file" "  value="<?php echo $photo ?>" />
                        </div>
                       
                        
                        <input type="submit" name="submit" class="btn btn-default btn-success" value="Update Product">
                        
                                       
                </div>
                

            </div>
        </div>
    </div>


   <?php include 'includes/script.php' ?>
   <script>
        document.forms['demo-form2'].elements['category'].value="<?php echo $category; ?>";
        document.forms['demo-form2'].elements['brand'].value="<?php echo $brand; ?>";
      
    </script>

</body>

</html>
