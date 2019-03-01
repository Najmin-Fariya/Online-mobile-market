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
                    $result = mysqli_query($con,"SELECT * FROM slider  WHERE id='$id' ");

                    while($row = mysqli_fetch_array($result))
                       {


                       
                        $photo= $row['photo'];
                       
                        
                                               
                    }
                    ?>
<?php include '../db_connect.php';?>





          <?php
          @$id= $_GET['id'];

if (isset($_POST['submit'])) {


                     
if(!empty($_FILES['file']['name'])) //new image uploaded
{











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
       
         $i=$photo;
            move_uploaded_file($_FILES["file"]["tmp_name"],
             "../images/slider/$i");
                                
        }
        }
        }
        else
        {
        echo "Invalid file";
        }





   //process your image and data
   $sql = mysqli_query($con,"UPDATE slider SET title='$_POST[title]' , save='$_POST[save]' ,details='$_POST[details]'   WHERE id='$id' ");//save to DB with new image name

   echo "Slider Update successfully";
}
else // no image uploaded
{
   // save data, but no change the image column in MYSQL, so it will stay the same value
   $sql = mysqli_query($con,"UPDATE slider SET title='$_POST[title]' , save='$_POST[save]' ,details='$_POST[details]'  WHERE id='$id' ");//save to DB but no change image column

   echo "Slider Update successfully";
}

    }
            
            
         ?>


 <?php include '../db_connect.php';?>
                 <?php
                    @$id= $_GET['id'];
                    $result = mysqli_query($con,"SELECT * FROM slider  WHERE id='$id' ");

                    while($row = mysqli_fetch_array($result))
                       {


                        $title = $row['title'];
                        $details= $row['details'];
                        $save= $row['save'];
                        $photo= $row['photo'];
                       
                        
                                               
                    }
                    ?>
      

           


                        </h3>
                       

                        <h4 style="color: red;text-align: center;font-weight: bold;">Image size Must be width: 1680px and height: 800px</h4>
                        
                        
                        <div class="form-group">
                          <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Save</label>
                            <input type="text" name="save" value="<?php echo $save; ?>" class="form-control" required>
                        </div>
                        


                        <div class="form-group">
                            <textarea name="details" class="form-control" placeholder="Write details here..." rows="8" required><?php echo $details ?></textarea>
                        </div>
                        <div>
                            <?php  echo '<img src="../images/slider/'.$photo.'" height="100px">'; ?>
                            <input type="file" name="file" "  value="<?php echo $photo ?>" />
                        </div>
                       
                        
                        <input type="submit" name="submit" class="btn btn-default btn-success" value="Update Product">
                        
                                       
                </div>
                

            </div>
        </div>
    </div>


   <?php include 'includes/script.php' ?>
   

</body>

</html>
