<?php
require_once 'connection.php';
require_once 'sellersecure.php';


if (isset($_REQUEST[send])) {
  
    
    if (strlen($_FILES[bpath][name]) > 0) 
     {
        $name = $_FILES[bpath][name];
        $ex = "." . substr($_FILES[bpath][type],12);
     
        if ($ex == ".pdf") 
         {
            $siz = $_FILES[bpath][size] / 1024;
            $siz = $siz / 1024;
            if ($siz <= 1024) 
            {
                $name = $_SESSION[user] . rand(1000,1999999) . $ex;

                $path1 = "brochure/" . $name;
          
                $path2 = dirname(__FILE__) . "/" . $path1;
               
            } 
            else 
            {
                $er2 = 1;
            }
        }
        else 
        {
            $er1 = 1;
        }
    }
 

    if ($er1!= 1 && $er2!= 1) {
        
        $ins=mysql_query("insert into brochure values($_REQUEST[storeid],0,'$_REQUEST[brochure]','$path1',0)");
        move_uploaded_file($_FILES[bpath][tmp_name], $path2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="form('form','brochure','insert',0);dis('data','brochure',1,'all','vachhe',0,0);recdis('recdata','brochure',1,'all','vachhe',0,0,0);">

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

                    <div class="col-md-6 ol-sm-12 col-xs-12">
                        
                        <form action="" method="post" name="addbrochure" enctype="multipart/form-data"> 
                            <section class="panel state">

                                <header class="panel-heading" style="background: #e0e1e7 !important;">
                                   
                                        BROCHURE
                                       
                                   </header>
                                <div class="panel-body">
                                   

                                    <div id="brochureform">



                                    </div>

                                </div>


                            </section>
                        </form>        
                    </div>
 
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="dis('data','brochure',1,'all','vachhe',0,'badhurec');recdis('recdata','brochure',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','brochure',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchbrochure">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','brochure',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="brochuredata">


                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="brochurerecdata">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>

                </div>
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
