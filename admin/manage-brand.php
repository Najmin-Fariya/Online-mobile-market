<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Manage Brand</title>
    <?php include 'includes/link.php';  ?>
</head>

<body>


    <div id="wrapper">
        <?php include 'includes/nav.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Manage Brand </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                           Brand List
                        </div>
                        <h3 style="color: red; text-align: center;">
                             <?php
                        
                                @$id =  $_GET['id'];
                                include_once '../db_connect.php';
                              if (isset($_GET['id']))  {
                                   $sql = mysqli_query($con,"DELETE FROM  brand  WHERE id='$id' ");
                                   echo "Delete this  Brand";
                                   
                              }
                            ?>
                        </h3>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial " id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th class="text-center">Si No</th>
                                      
                                        <th class="text-center">Brand Name</th>
                                        <th class="text-center">Action</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php
                    include_once '../db_connect.php';

                    $result = mysqli_query($con, "SELECT * FROM   brand ORDER BY id ASC");

                    while($row = mysqli_fetch_array($result))
                        // $si_no=1;
                            
                    {echo '<tr class="odd gradeX">
                            <td class="text-center">&nbsp;</td>
                            
                            <td class="text-center">'.$row['brand'].'</td>
                           
                            
                            

                            <td class="text-center">

                            <a href="edit-brand.php?id='.$row['id'].'" class="btn btn-primary btn-xs" title="Edit">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="?id='.$row['id'].'" class="btn btn-danger btn-xs" title="Delete" id="delete" >
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            </td>
                            
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


   <?php include 'includes/script.php' ?>
   
<script type="text/javascript">
    $("#delete").click(function(){
        return confirm("Are you sure delete this Category?");
    });
</script>
<style type="text/css">
    .css-serial {
 counter-reset: serial-number; 
}
.css-serial td:first-child:before {
 counter-increment: serial-number; 
 content: counter(serial-number); 
}
</style>  

</body>

</html>
