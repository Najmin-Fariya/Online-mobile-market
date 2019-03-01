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
                    <h1 class="page-header">Product Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                           Product Order List
                        </div>
                        <h3 style="color: green; text-align: center;">
                             <?php
@$id= $_GET['id'];
  include_once '../db_connect.php';
if (isset($_GET['delevery'])) {   
 mysqli_query($con, "UPDATE order_id SET delevery_status='Non Delevery' WHERE id='$id' ");

        echo  '<span style="color:red">This Product order is Now Non delevery</span>';
                
            }
            
            
         ?>


    <?php
                        
                        @$id =  $_GET['id'];
                        include_once '../db_connect.php';
                         if (isset($_GET['delete'])) {

                 

                       $sql = mysqli_query($con,"DELETE FROM order_id  WHERE id='$id' ");
                        $sql = mysqli_query($con,"DELETE FROM order_product  WHERE order_id='$id' ");

                       echo '<span style="color:red">This order Info Delete </span>';

                   


    }

               
                    ?>
                            
                        </h3>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>Si No</th>
                                       
                                       <th >Order Date</th>
                                       <th >Delevery Status</th>

                                      
                                        <th >Acction</th>
                                        
                                        
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                    include_once '../db_connect.php';

                    $result = mysqli_query($con, "SELECT * FROM   order_id WHERE delevery_status='Delevery' ORDER BY id DESC");

                    while($row = mysqli_fetch_array($result))
                        // $si_no=1;
                            
                    {echo '<tr class="odd gradeX">
                            <td class="text-center">&nbsp;</td>
                            
                            <td class="text-center">'.$row['datee'].'</td>
                            <td class="text-center">'.$row['delevery_status'].'</td>
                           
                            
                            

                            <td class="text-center">

                            <a href="order-details.php?order_id='.$row['id'].'" class="btn btn-primary btn-xs" title="Order Details here" >
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                            <a href="?id='.$row['id'].'&&delevery=delevery" class="btn btn-info btn-xs" title="If Product Delevery that time it update " id="delevery">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="?id='.$row['id'].'&&delete=delete" class="btn btn-danger btn-xs" title="Delete this order" id="delete" >
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

    

    $("#delete").click(function(){
        return confirm("Are you sure delete this order ?");
    });

    $("#delevery").click(function(){
        return confirm("Are you sure this order product Is Non delevery  ?");
    });
    
</script>  

</body>

</html>
