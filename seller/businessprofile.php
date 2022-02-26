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
                        
                        <?php
                        $sel=  mysql_query("select s.typename,d.durationtime,st.statename,c.cityname,a.areaname,ss.* from storetype s,duration d,state st,city c,area a,store ss where s.typeid=ss.typeid and d.durationid=ss.durationid and st.stateid=ss.stateid and c.cityid=ss.cityid and a.areaid=ss.areaid and active=1 and userid like '$_SESSION[user]'");
                        $row=  mysql_fetch_array($sel);
                        ?>
                        
                       <div class="col-md-12">
                           <h5 class="profile">SELLER BUSINESS PROFILE</h5>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="coverpic">
                                        
                                        <img src="<?php echo $row[32]; ?>" />
                     
                                </div>
                                    <div class="profilepic text-center">
                                        
                                        <img src="<?php echo $row[19]; ?>" />
                         
                                    </div>
                                    
                                    <div class="businessinfo col-md-12">
                                        
                                        <div class="col-md-6">
                                           
                                            <div>
                                                
                                            </div>
                                            
                                            <ul class="p-info sellerinfodis">
                                                <li>
                                                    <div class="title">Name</div>
                                                    <div class="desk"><?php echo $row[9]; ?> </div>
                                                </li>
                                                
                                                <li>
                                                    <div class="title">Address</div>
                                                    <div class="desk"><?php echo $row[13]; ?> </div>
                                                </li>
                                                <li>
                                                    <div class="title">State</div>
                                                    <div class="desk"><?php echo $row[2]; ?> </div>
                                                </li>
                                                <li>
                                                    <div class="title">City</div>
                                                    <div class="desk"><?php echo $row[3]; ?> </div>
                                                </li>
                                                <li>
                                                    <div class="title">Area</div>
                                                    <div class="desk"><?php echo $row[4]; ?> </div>
                                                </li>
                                                <li>
                                                    <div class="title">Email</div>
                                                    <div class="desk"><?php echo $row[15]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Store Map</div>
                                                    <div class="desk"><iframe src="<?php echo $row[14]; ?>" frameborder="0"></iframe></div>
                                                </li>
                                               
                                            </ul>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-6">
                                          
                                                <ul class="p-info sellerinfodis">
                                                
                                                
                                                <li>
                                                    <div class="title">Mobile</div>
                                                    <div class="desk"><?php echo $row[16]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Website</div>
                                                    <div class="desk"><?php echo $row[17]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Time Duration</div>
                                                    <div class="desk"><?php echo $row[23]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Reg no</div>
                                                    <div class="desk"><?php echo $row[24]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Since</div>
                                                    <div class="desk"><?php echo $row[26]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Fax</div>
                                                    <div class="desk"><?php echo $row[27]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Starting Date</div>
                                                    <div class="desk"><?php echo $row[29]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Ending Date</div>
                                                    <div class="desk"><?php echo $row[30]; ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Food Type</div>
                                                    <div class="desk"><?php echo $row[31]; ?></div>
                                                </li>
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                            </div>
                           <div class="container">
                               <a href="businesseditprofile.php" class="btn" style="background-color:#424F63; ">Edit Profile&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
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

