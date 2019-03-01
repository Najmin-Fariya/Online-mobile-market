<?php
    include('session.php');
?>
<?php include '../db_connect.php';?>
<?php
          @$email=$login_session =$row['email'];
         $message= '';

if (isset($_POST['submit'])) {
                     
    if(!empty($_FILES['file']['name'])) //new image uploaded
    {
         $query = mysqli_query($con,"SELECT * FROM vendor WHERE email='$email' ");
         while ($delete = mysqli_fetch_array($query)) {
            $image = $delete['img'];
            $file= '../images/admin/'.$image;
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
             "../images/admin/$i");                        
        }
        }
        }
        else
        {
        echo "Invalid file";
        }

        $password=$_POST['password'];
        $password= md5($password);

   //process your image and data
   $sql = mysqli_query($con,"UPDATE vendor SET name='$_POST[name]' ,  password='$password' ,  phone='$_POST[phone]',real_pass='$_POST[password]', img='$i'  WHERE email='$email' ");//save to DB with new image name

   $message="Profile Update Successfully";
}
else // no image uploaded
{
   // save data, but no change the image column in MYSQL, so it will stay the same value

            $password=$_POST['password'];
        $password= md5($password);
        
   $sql = mysqli_query($con,"UPDATE vendor SET name='$_POST[name]' ,  password='$password' ,  phone='$_POST[phone]',  real_pass='$_POST[password]'   WHERE email='$email' ");//save to DB but no change image column

   $message="Profile Update Successfully";
}

    }
            
            
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
                    <h1 class="page-header">Update Profile </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-8 col-lg-offset-2">
                        <form id="demo-form2" action="" method="post" enctype="multipart/form-data" role="form" style="border: 1px dotted gray;padding: 20px 70px;border-radius: 8px;">
                            <h3 style="color: green;text-align: center;">
                                <?php echo $message; ?>
                            </h3>

<?php
 include '../db_connect.php';                
     @$email=$login_session =$row['email'];
     $result = mysqli_query($con,"SELECT * FROM vendor  WHERE email='$email' ");
    while($row = mysqli_fetch_array($result)){
        $name = $row['name'];
        $phone= $row['phone'];
        $real_pass= $row['real_pass'];
        $img = $row['img'];
                                   
         }
?>

                        <div class="form-group">
                            <label>Name</label>
                         <input name="name" placeholder="Name..." value="<?php echo $name; ?>" type="varchar" required class="form-control">


                        </div>
                      

                        
                        <div class="form-group">
                            <label>Mobile</label>
                           <input class="form-control"  name="phone"  placeholder="Mobile"  type="text" value="<?php echo $phone; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                           <input class="form-control" id="password" name="password" minlength="6" placeholder="**********"  type="text" value="<?php echo $real_pass; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label >Image</label>
                            <img   src="../images/admin/<?php  echo $img ; ?>" height="100px">
                           
                            <input  type="file" name="file" "  value="<?php echo $img ?>" />  
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-default btn-success" value="Add Location">
                        </div>
                    </form>
                                       
                </div>
                

            </div>
        </div>
    </div>


   <?php include 'includes/script.php' ?>
   <script>
        document.forms['demo-form2'].elements['user_type'].value="<?php echo $user_type; ?>";
        
    </script>

</body>

</html>
