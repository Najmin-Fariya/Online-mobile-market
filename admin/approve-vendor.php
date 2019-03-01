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
                    <h1 class="page-header">Approve Vendor List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                           Vendor List
                        </div>
                        <h3 style="color: green; text-align: center;">
                             <?php
@$id= $_GET['id'];
  include_once '../db_connect.php';
if (isset($_GET['unpublished'])) {   
 mysqli_query($con, "UPDATE vendor SET approve='Non Approve' WHERE id='$id' ");
        echo  '<span style="color:red">Vendor Non Approved</span>';
                
            }
            
            
         ?>



    <?php
                        
                        @$id =  $_GET['id'];
                        include_once '../db_connect.php';
                         if (isset($_GET['delete'])) {

                    $query = mysqli_query($con,"SELECT * FROM vendor WHERE id='$id' ");

                    while ($delete = mysqli_fetch_array($query)) {
                            $image = $delete['photo'];

                             $file= '../images/admin/'.$image;

                        unlink($file);

                       $sql = mysqli_query($con,"DELETE FROM vendor  WHERE id='$id' ");
                       echo '<span style="color:red">Vendor Info Delete </span>';

                   


    }

                   }
                    ?>
                            
                        </h3>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>SL No</th>
                                       <th >Acction</th>
                                       <th >Approve</th>
                                       <th >Name</th>
                                       <th >Phone</th>
                                        <th >Email</th>
                                        <th >Password</th>
                                        <th >Photo</th>   
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                                    <?php
                    include_once '../db_connect.php';

                
        $i = 1;
        $result = mysqli_query($con,"SELECT * FROM vendor WHERE approve='Approve' ORDER BY id DESC ");

        while($row = mysqli_fetch_array($result))
                       
 {echo '<tr>
    <td class="text-center">&nbsp;</td> 
    <td style="width:110px">
        <a href="?unpublished=unpublished&id='.$row['id'].'" class="btn btn-warning  btn-xs" title="Non Approve" id="nonapprove">
            <span class="glyphicon glyphicon-arrow-down"></span>
        </a>
        
        <a href="edit-vendor.php?id='.$row['id'].'" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="?delete=delete&id='.$row['id'].'" class="btn btn-danger btn-xs" title="Delete" id="delete" >
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
    <td style="color:red">'.$row['approve'].'</td> 
    <td >'.$row['name'].'</td>
    <td >'.$row['phone'].'</td>             
    <td >'.$row['email'].'</td>               
    <td >'.$row['real_pass'].'</td>
     <td > <img src="../images/admin/'.$row['img'].'" style="height: 150px;"></td>
     
   

    
</tr>';

    }

?>

                                </tbody>
                            </table>       
                        </div>
                    </div>
                   
                </div>
                

            </div>
        </div>
    </div>
<style type="text/css">
    .css-serial {
 counter-reset: serial-number; 
}
.css-serial td:first-child:before {
 counter-increment: serial-number; 
 content: counter(serial-number); 
}
</style> 

   <?php include 'includes/script.php' ?>
       <script type="text/javascript">

    
    $("#nonapprove").click(function(){
        return confirm("are you sure Non Approve this Vendor?");

});
         $("#delete").click(function(){
        return confirm("are you sure delete this Vendor?");
    });
   

        
    
</script>  

</body>

</html>
