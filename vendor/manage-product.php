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
                    <h1 class="page-header">Product List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                           Product List
                        </div>
                        <h3 style="color: green; text-align: center;">
   <?php
@$id= $_GET['id'];
  include_once '../db_connect.php';
if (isset($_GET['nonspecial'])) {   
 mysqli_query($con, "UPDATE product SET special='Non Special' WHERE id='$id' ");
        echo  '<span style="color:red">This Product Non Special</span>';
                
            }
            
            
         ?>
                                     <?php
@$id= $_GET['id'];
  include_once '../db_connect.php';
if (isset($_GET['special'])) {   
 mysqli_query($con, "UPDATE product SET special='Special' WHERE id='$id' ");
        echo  '<span style="color:green">This Product Special</span>';
                
            }
            
            
         ?>

    <?php
                        
                        @$id =  $_GET['id'];
                        include_once '../db_connect.php';
                         if (isset($_GET['delete'])) {

                    $query = mysqli_query($con,"SELECT * FROM product WHERE id='$id' ");

                    while ($delete = mysqli_fetch_array($query)) {
                            $image = $delete['photo'];

                             $file= '../images/product/'.$image;

                        unlink($file);

                       $sql = mysqli_query($con,"DELETE FROM product  WHERE id='$id' ");
                       echo '<span style="color:red">This product Info Delete </span>';

                   


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
                                       <th >Special</th>
                                       <th >Category</th>
                                        <th >Brand</th>
                                        <th >Model</th>
                                        <th >Present<br/> Price</th>
                                        <th >Previous<br/> Price</th>
                                        
                                        <th >Photo</th>
                                        <th >Keyword</th>
                                        <th >Details</th>
                                        
                                        
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                                    <?php
                    include_once '../db_connect.php';

                
        $i = 1;
        $result = mysqli_query($con,"SELECT * FROM product WHERE posted_email='$_SESSION[login_email]' ORDER BY id DESC ");

        while($row = mysqli_fetch_array($result))
                       
 {echo '<tr>
    <td class="text-center">&nbsp;</td> 
    <td style="width:110px">
       
        <a href="edit-product.php?id='.$row['id'].'" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="?delete=delete&id='.$row['id'].'" class="btn btn-danger btn-xs" title="Delete" id="delete" >
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
    <td style="color:red">'.$row['approve'].'</td> 
    <td >'.$row['special'].'<br>
        <a href="?nonspecial=nonspecial&id='.$row['id'].'" class="btn btn-warning  btn-xs" title="Non Special" id="nonspecial">
            <span class="glyphicon glyphicon-arrow-down"></span>
        </a>
        <a href="?special=special&id='.$row['id'].'" class="btn btn-success btn-xs" title="special" id="special">
            <span class="glyphicon glyphicon-arrow-up"></span>
        </a>

    </td>             
    <td >'.$row['category'].'</td>               
    <td >'.$row['brand'].'</td>
    <td >'.$row['model'].'</td>
    <td >'.$row['present_price'].'</td>
    <td >'.$row['prev_price'].'</td>
     <td > <img src="../images/product/'.$row['photo'].'" style="height: 150px;"></td>
     <td >'.$row['product_keyword'].'</td>
    <td style="width:200px;">'.nl2br($row['details']).' </td>
   

    
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
        return confirm("are you sure Non Approve this Product?");

});
         $("#delete").click(function(){
        return confirm("are you sure delete this Product?");
    });
    $("#approve").click(function(){
        return confirm("are you sure Approve this Product?");
    });


        $("#nonspecial").click(function(){
        return confirm("are you sure Non Special this Product?");

});


    $("#special").click(function(){
        return confirm("are you sure Special this Product?");

});
    
</script>  

</body>

</html>
