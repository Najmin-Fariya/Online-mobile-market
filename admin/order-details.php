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
                    <h1 class="page-header"><?php if (isset($_GET['nondelevery'])) {
                        echo "Non Delevery";
                    } else{
                        echo "All ready Delevery";
                    }

                    ?> Product Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                           Product Order List
                        </div>
                        <div class="col-md-12">
                                        <?php
                    @$order_id =  $_GET['order_id'];
                    include_once '../db_connect.php';

                    $result = mysqli_query($con, "SELECT * FROM   order_id WHERE id='$order_id' ORDER BY id DESC");

                        while($row = mysqli_fetch_array($result))
                       {


                   
                        $user_iddd= $row['user_id'];
                        $address2= $row['address'];

                         

                        
                                               
                    }


                    $resultt = mysqli_query($con, "SELECT * FROM   user_info WHERE id='$user_iddd' ORDER BY id DESC");

                        while($row = mysqli_fetch_array($resultt))
                       {


                   
                        $name= $row['name'];
                        $email= $row['email'];
                        $phone= $row['phone'];
                        $address1= $row['address1'];


                                           
                        
                                               
                    }

               

               


                    ?>  
                    <div class="col-lg-4">
                        
                    </div>
                    <div class="col-lg-4">
                        <h3><label>Name : <span style="color: lightgreen"> <?php  echo $name; ?></span></label></h3>
                         <h4><label>Phone : <span style="color: lightgreen"><?php  echo $phone; ?></span></label></h4>
                         <h4><label>Email : <span style="color: lightgreen"><?php  echo $email; ?></span></label></h4>
                          <h4><label>Permanant Address : <span style="color: lightgreen"><?php  echo $address1; ?></span></label>
                          </h4>
                          <h4><label>Delevery Address : <span style="color: lightgreen"><?php  echo $address2; ?></span></label>
                          </h4>
                        
                    </div>
                    <div class="col-lg-4">
                        <script>
                            function myFunction() {
                                window.print();
                            }
                            </script>
<button style="float: right;" onclick="myFunction()">Print</button>
                    </div>
                            
                        </div>
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial" >
                                <thead>
                                    <tr>
                                       <th>SL No</th>
                                       <th >Photo</th>
                                       <th >Model</th>
                                       <th >Quantity</th>
                                       <th >Per Product Price</th>

                                      
                                        <th >Total Amount</th>
                                        
                                        
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                  
            <?php 
            include_once '../db_connect.php';
                $query=mysqli_query($con,"SELECT * FROM   order_product WHERE order_id='$order_id' ORDER BY id DESC");
                while($row=mysqli_fetch_array($query)){
                $id=$row['id'];
            ?>
            <tr><td></td>
                <td><img src="../images/product/<?php echo $row['photo'] ?>" style="height: 60px;"></td>
                <td><?php echo $row['model'] ?></td>
                <td><?php echo $row['qty'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['total_amount'] ?></td>
            </tr>
            <?php } ?>








                               </tbody>
                                    <tfoot>
<tr>
     <td></td>
     <td></td>
     <td></td>

    <?php

    $result1 = mysqli_query($con,"SELECT sum(qty) FROM order_product WHERE order_id='$order_id'");
    while ($rows1 = mysqli_fetch_array($result1)) {
    ?>  
    
       
            <td class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total number of Items:&nbsp;<?php echo $rows1['sum(qty)']; ?></td>
         <td></td>  
    <?php }
$result = mysqli_query($con,"SELECT sum(total_amount) FROM order_product WHERE order_id='$order_id'") ;
        while ($rows = mysqli_fetch_array($result)) {
    ?>
  
            <td class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $rows['sum(total_amount)']; ?></>
      
       
   
    <?php } ?>

   
</tr>
                               </tfoot>
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
        return confirm("Are you sure this order product delevery  ?");
    });
    
</script>  

</body>

</html>
