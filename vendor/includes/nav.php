<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">NEWS</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <?php
                                        include_once '../db_connect.php';
                                        $a=$_SESSION['login_email'];
                                        
                                        $result2 = mysqli_query($con,"SELECT * FROM `vendor` WHERE email='$a' ");
                                        while($row2 = mysqli_fetch_array($result2)){
                                            $name= $row2['name'];
                                            
                                            $image= $row2['img'];
                                        }
                                            echo '<p>'.$name.'
                                            <img src="../images/admin/'.$image.'" height="40px">
                                            </p>'; 
                                            //echo '<span>'.$a.'</span>'; 
                                        ?>


               </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="edit-profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                       <!--  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>

                </li>
            </ul>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                       
                          
                        
                       <!--  <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Order<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dashbord.php">Non Delevery Order</a>
                                </li>
                                <li>
                                    <a href="non-delevery.php">Delevery Order</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Product <span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-product.php">Product Add</a>
                                </li>
                                <li>
                                    <a href="manage-product.php">Manage Product </a>
                                </li>
                            </ul>
                        </li>
                       
                       
                       
                         
                         
                      
                      
                      
                        

                    </ul>
                </div>
            </div>
        </nav>