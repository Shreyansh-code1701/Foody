<?php
require_once 'connection.php';
require_once 'sellersecure.php';
?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header">

        <section>
            <?php
            require_once 'menu.php';
            ?>

            <div class="main-content" >

                <?php
                require_once 'toppati.php';
                require_once 'sellerpati.php';
                ?>

                <div class="wrapper">

                    <div class="row">
                       <div class="col-md-6">
                           <h5 class="profile">SELLER PROFILE</h5>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="sellerprofile-pic text-center" style="padding: 50px;">
                                         <?php
                    $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                        ?>
                     <img src="../<?php echo $inn[12]; ?>" />
                     
                                    </div>
                                </div>
                            </div>
                           <div class="container">
                               <a href="editprofile.php" class="btn" style="background-color:#424F63; ">Edit Profile&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                        <div class="col-md-12">
                            <h5 class="profile">SELLER INFORMATION</h5>
                            <div class="panel sellerinfo">
                                <div class="panel-body">
                                    <ul class="p-info sellerinfo">
                                        <li >
                                            <div class="title">Name</div>
                                            <div class="desk"><?php echo $inn[0]; ?> </div>
                                        </li>
                                         <li>
                                            <div class="title">Address</div>
                                            <div class="desk"><?php echo $inn[1]; ?> </div>
                                        </li>
                                        <li>
                                            <div class="title">Gender</div>
                                            <div class="desk"><?php echo $inn[2]; ?> </div>
                                        </li>
                                       
                                        <li>
                                            <div class="title">State</div>
                                            <?php $innn=  mysql_query("select * from state where stateid=$inn[3]");
                                            $cc=  mysql_fetch_array($innn);
                                            ?>
                                            <div class="desk"><?php echo $cc[1]; ?></div>
                                        </li>
                                        <li>
                                            <div class="title">City</div>
                                             <?php $innn=  mysql_query("select * from city where cityid=$inn[4]");
                                            $cc=  mysql_fetch_array($innn);
                                            ?>
                                            <div class="desk"><?php echo $cc[2]; ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Area</div>
                                            <?php $innn=  mysql_query("select * from area where areaid=$inn[5]");
                                            $cc=  mysql_fetch_array($innn);
                                            ?>
                                            <div class="desk"><?php echo $cc[2]; ?></div>
                                        </li>
                                          <li>
                                            <div class="title">Email</div>
                                            <div class="desk"><?php echo $inn[6]; ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Mobile</div>
                                            <div class="desk"><?php echo $inn[7]; ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Security Question</div>
                                            <div class="desk"><?php echo $inn[10]; ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Security Answer</div>
                                            <div class="desk"><?php echo $inn[11]; ?></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>     
                </div>
        </div>
 </div>
                <div style="margin-top: 16%;">
                <?php
                 require_once 'footer.php';
                ?>
                </div>
        </section>


        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/jquery.nicescroll.js"></script>


        <script src="js/sparkline/jquery.sparkline.js"></script>
        <script src="js/sparkline/sparkline-init.js"></script>


        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>



        <script src="js/scripts.js"></script>


    </body>


</html>
