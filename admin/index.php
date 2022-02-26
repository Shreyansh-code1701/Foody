<?php
require_once 'connection.php';
require_once 'adminsecure.php';


$state = mysql_query("select count(*) from state where del=0");
$ss = mysql_fetch_array($state);

$city = mysql_query("select count(*) from city where del=0");
$cc = mysql_fetch_array($city);

$area = mysql_query("select count(areaid) from area where del=0");
$aa = mysql_fetch_array($area);
    
$package = mysql_query("select count(packagebillid) from packagebill");
$pac = mysql_fetch_array($package);
?>
<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="state('state',<?php echo $ss[0]; ?>); city('city',<?php echo $cc[0]; ?>);area('area',<?php echo $aa[0]; ?>);packagebill('packagebill',<?php echo $pac[0]; ?>);">

        <section>

            <?php
            require_once 'menu.php';
            ?>

            <div class="main-content" >


                <?php
                require_once 'toppati.php';
                
                require_once 'adminpati.php';
                ?>
                
                
                

                <div class="wrapper">
                    <div class="row states-info">
                        <div class="col-md-3">
                            <div class="panel red-bg">
                                <div class="panel-body">
                                    <div class="row">
                                        
                                        <div class="col-xs-4">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <span class="state-title">Total State </span>
                                            <h4 id="state"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel blue-bg">
                                <div class="panel-body">
                                    <div class="row">
                                         
                                        <div class="col-xs-4">
                                            <i class="fa fa-tag"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <span class="state-title"> Total City  </span>
                                            <h4 id="city"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel green-bg">
                                <div class="panel-body">
                                    <div class="row">
                                         
                                        <div class="col-xs-4">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <span class="state-title"> Total Area </span>
                                            <h4 id="area"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel yellow-bg">
                                <div class="panel-body">
                                    <div class="row">
                                         
                                        <div class="col-xs-4">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <div class="col-xs-8">
                                            <span class="state-title"> Total Package Bill </span>
                                            <h4 id="packagebill"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <section class="panel">
                                <header class="panel-heading">
                                    Area Chart
                                    <span class="tools pull-right">
                                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                                        <a href="javascript:;" class="fa fa-times"></a>
                                    </span>
                                </header>
                                <div class="panel-body">
                                    <div id="visitors-chart">
                                        <div id="visitors-container" style="width: 100%;height:358px; text-align: center; margin:0 auto;">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4">
                            <div class="wdgt-profile">
                                <div class="profile">
                                    <img src="images/gallery/wdgt-img.jpg" alt=""/>
                                    <div class="profile-social">
                                        <a href="#" ><i class="fa fa-pinterest"></i></a>
                                        <a href="#" ><i class="fa fa-twitter"></i></a>
                                        <a href="#" ><i class="fa fa-facebook"></i></a>
                                    </div>
                                    <ul class="profile-tab">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-camera"></i>
                                                Photo
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="#">
                                                <i class="fa fa-user"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-music"></i>
                                                Music
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comments"></i>
                                                Comments
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="profile-info">
                                    <h5>Margarita Rose</h5>
                                    <span>Creative Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                    
                </div>

                <?php
                require_once 'footer.php';
                ?>

            </div>

        </section>

       <?php
               require_once 'javascript.php';
        ?>

    </body>

    <!-- Mirrored from adminex.themebucket.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 15:17:02 GMT -->
</html>
