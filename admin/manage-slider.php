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
                             
                            
                        </h3>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>Si No</th>
                                       <th >Acction</th>
                                       <th >Title</th>
                                       <th >Save</th>
                                       <th >Details</th>
                                      <th >Slider Image</th>
                                        
                                        
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                                    <?php
                    include_once '../db_connect.php';

                
        $i = 1;
        $result = mysqli_query($con,"SELECT * FROM slider  ORDER BY id DESC ");

        while($row = mysqli_fetch_array($result))
                       
 {echo '<tr>
    <td class="text-center">&nbsp;</td> 
    <td style="width:110px">
       
     
        <a href="edit-slider.php?id='.$row['id'].'" class="btn btn-primary btn-xs" title="Edit">
            <span class="glyphicon glyphicon-edit"></span>
        </a>
        
    </td>
    <td >'.$row['title'].'</td> 
    <td >'.$row['save'].' % </td>             
    <td >'.nl2br($row['details']).'</td>               
    
     <td > <img src="../images/slider/'.$row['photo'].'" style="height: 150px;"></td>

   

    
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
       

</body>

</html>
