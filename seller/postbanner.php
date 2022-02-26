<?php
require_once 'connection.php';
require_once 'sellersecure.php';

if (isset($_REQUEST[send])) {
    if (strlen($_FILES[addbanner][name]) > 0) 
     {
   
        $name = $_FILES[addbanner][name];
        $ex = "." . substr($_FILES[addbanner][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") 
         {
            if(round($siz = $_FILES[addbanner][size] / 1024)>=0)
            {
           
                $get=mysql_query("select max(adid) from addbanner");
               
                $gett=mysql_fetch_array($get);

                if ($gett[0]=="") 
                {
                    $name = "banner_image_0". $ex;
                }
                else 
                {

                    $name="banner_image_" . $gett[0] . $ex;
                }

                    $path1 = "banner/".$name;

                    $path2 = dirname(__FILE__) . "/" . $path1;
            }
            else 
            {

                    $er4 = 1;
            }
     
        }
        else 
        {
            $er3 = 1;
        }
    }
 $sel=mysql_query("select * from store where userid like '$_SESSION[user]'");
 $sell=mysql_fetch_array($sel);
$bdate=date('Y-m-d');
    if($er3!=1 && $er4!=1)
    {
        
          $int=mysql_query("insert into addbanner values($sell[3],$_REQUEST[timeperiod],0,'$_REQUEST[bannername]','$path1','$bdate','0000-00-00','0000-00-00',0,0)");
      
           move_uploaded_file($_FILES[addbanner][tmp_name], $path2);
         
         header("location:bannerbill.php");
    }
  
}
    
    if (isset($_REQUEST[upsend])) {
    if (strlen($_FILES[upproductpic][name]) > 0) 
     {
   
        $name = $_FILES[upaddbanner][name];
        $ex = "." . substr($_FILES[upaddbanner][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") 
         {
            if(round($siz = $_FILES[upproductpic][size] / 1024)>=0)
            {
           
                $get=mysql_query("select max(adid) from addbanner");
               
                $gett=mysql_fetch_array($get);

                if ($gett[0]=="") 
                {
                    $name = "banner_image_0". $ex;
                }
                else 
                {

                    $name="banner_image_" . $gett[0] . $ex;
                }

                    $path3 = "banner/".$name;

                    $path4 = dirname(__FILE__) . "/" . $path1;
            }
            else 
            {

                    $er1 = 1;
            }
     
        }
        else 
        {
            $er2 = 1;
        }
    }

 
    if($er1!=1 && $er2!=1)
    {
         $int=mysql_query("update addbanner set mcatid='$_REQUEST[upmaincategory]',productname='$_REQUEST[upproductname]',type='$_REQUEST[upfoodtype]',price=$_REQUEST[upprice],dis='$_REQUEST[updis]','$path3',day=$_REQUEST[upday] where productid=$_SESSION[uid]");
         move_uploaded_file($_FILES[upaddbanner][tmp_name], $path4);
    
         
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="form('form','addbanner','insert',0);dis('data','addbanner',1,'all','vachhe',0,0);recdis('recdata','addbanner',1,'all','vachhe',0,0,0);">

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
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                ADD ITEM
                              
                            </header>
                            <div class="panel-body">
                                
                                <form action="" method="post" name="bannerform" enctype="multipart/form-data" class="form-group">
                                    
                                    <div id="addbannerform">
                                    </div>

                                </form>
                            </div>
                        </section>
                            </div>
                    
                       <div class="col-md-12 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="dis('data','addbanner',1,'all','vachhe',0,'badhurec');recdis('recdata','addbanner',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','addbanner',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchbanner">
                                            
                                                    <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','addbanner',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="addbannerdata">
                                            
                                                                     
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="addbannerrecdata">

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
