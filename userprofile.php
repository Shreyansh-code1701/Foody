
<?php
require_once 'conection.php';
require_once 'usersecure.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll">

        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            ?>
            <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg')">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center " >
                        <font style="font-size:30px;">User Profile</font>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 10%;">
                
            </div>
            <div class="container " >

                <div class="col-md-12 col-sm-12 col-xs-12" >


                    <div class="col-md-6  " >
                           <h5 class="profile usertitleprofile ">USER PROFILE</h5>
                            <div class="panel" >
                                <div class="panel-body" >
                                    <div class="sellerprofile-pic text-center" style="padding: 50px;">
                                         <?php
                    $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                        ?>
                                        <img src="<?php echo $inn[12]; ?>" />
                     
                                    </div>
                                </div>
                            </div>
                           <div class="">
                               <a href="editprofile.php" class="btn sendbtn">Edit Profile&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                          </div>
                            <div class="">
                               <a href="mybill.php" class="btn sendbtn">My Bill&nbsp;&nbsp;&nbsp;<i class="fa  fa-bookmark"></i></a>
                          </div>
                           <div class="">
                               <a href="managetransaction.php" class="btn sendbtn">Bill MIS&nbsp;&nbsp;&nbsp;<i class="fa  fa-bookmark"></i></a>
                          </div>
                        </div>
                    <div class="col-md-6">
                            <h5 class="profile usertitle ">USER INFORMATION</h5>
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
            <div class="col-md-12" style="margin-bottom: 10%;">
                
            </div>
            </div>
             




            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>
