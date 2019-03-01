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
                    <h1 class="page-header">Unseen Comment </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                          Unseen Comment List
                        </div>
                         <?php
@$id= $_GET['id'];
  include_once '../db_connect.php';
if (isset($_GET['seen'])) {   
 mysqli_query($con, "UPDATE contact SET seen='Seen' WHERE id='$id' ");

                echo '<h3 style="color:green; text-align:center">This Comment is Seen Now.</h3>';
            }
            
            
         ?>


    <?php
                        
                        @$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
                        include_once '../db_connect.php';
                         if (isset($_GET['delete'])) {

                       $sql = mysqli_query($con,"DELETE FROM contact  WHERE id='$id' ");
                       echo '<h3 style="color:red; text-align:center">This Comment is Delete Now.</h3>';
                   }
                    ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover css-serial" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="text-center">Si No</th>
                                        <th class="text-center">Name</th>
                                         <th class="text-center">Subject</th>
                                        <th class="text-center">E-mail</th>
                                        <th class="text-center">Comment</th>
                                        <th class="text-center">Seen</th>
                                         <th class="text-center">Action</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  
                                    <?php
                    include_once '../db_connect.php';

                    $result = mysqli_query($con, "SELECT * FROM  contact WHERE seen='Unseen' ORDER BY id DESC");

                    while($row = mysqli_fetch_array($result))

                            
                    {echo '<tr class="odd gradeX">
                             <td class="text-center">&nbsp;</td>
                             <td class="text-center">'.$row['name'].'</td>
                             <td class="text-center">'.$row['subject'].'</td>
                            <td class="text-center">'.($row['email']).'</td>
                            <td class="text-center">'.nl2br($row['message']).'</td>
                            <td class="text-center">'.$row['seen'].'</td>
                                             
                            <td style="width:110px">

                                                            
                            <a href="?seen=seen&id='.$row['id'].'" class="btn btn-primary btn-xs" title="SEEN" id="seen">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                            </a>
                            <a href="?delete=delete&id='.$row['id'].'" class="btn btn-danger btn-xs" title="Delete" id="delete" >
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
    $("#seen").click(function(){
        return confirm("Do you change seen  this Comment?");
    });
    $("#delete").click(function(){
        return confirm("Do you delete this Comment?");
    });
</script>  

</body>

</html>
                                 