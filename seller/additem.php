<?php
require_once 'connection.php';
require_once 'sellersecure.php';


if (isset($_REQUEST[send])) {
    if (strlen($_FILES[productpic][name]) > 0) {

        $name = $_FILES[productpic][name];
        $ex = "." . substr($_FILES[productpic][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") {
            if (round($siz = $_FILES[productpic][size] / 1024) >= 0) {

                $get = mysql_query("select max(productid) from item");

                $gett = mysql_fetch_array($get);

                if ($gett[0] == "") {
                    $name = "product_image_0" . $ex;
                } else {

                    $name = "product_image_" . $gett[0] . $ex;
                }

                $path1 = "product/" . $name;

                $path2 = dirname(__FILE__) . "/" . $path1;
            } else {

                $er4 = 1;
            }
        } else {
            $er3 = 1;
        }
    }



    if ($er3 != 1 && $er4 != 1) {
        $int = mysql_query("insert into item values($_REQUEST[maincategory],$_REQUEST[sellerid],0,'$_REQUEST[productname]','$_REQUEST[foodtype]',$_REQUEST[price],'$_REQUEST[dis]','$path1',0)");
        move_uploaded_file($_FILES[productpic][tmp_name], $path2);
        
    }
}



if (isset($_REQUEST[upsend])) {
    if (strlen($_FILES[upproductpic][name]) > 0) {

        $name = $_FILES[upproductpic][name];
        $ex = "." . substr($_FILES[productpic][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") {
            if (round($siz = $_FILES[upproductpic][size] / 1024) >= 0) {

                $get = mysql_query("select max(productid) from item");

                $gett = mysql_fetch_array($get);

                if ($gett[0] == "") {
                    $name = "product_image_0" . $ex;
                } else {

                    $name = "product_image_" . $gett[0] . $ex;
                }

                $path3 = "product/" . $name;

                $path4 = dirname(__FILE__) . "/" . $path3;
            } else {

                $er1 = 1;
            }
        } else {
            $er2 = 1;
        }
    }

    $it = mysql_query("select storeid from store where userid like '$_SESSION[user]' ");
    $item = mysql_fetch_array($it);

    if ($er1 != 1 && $er2 != 1) {
        $int = mysql_query("update item set mcatid='$_REQUEST[upmaincategory]',productname='$_REQUEST[upproductname]',type='$_REQUEST[upfoodtype]',price=$_REQUEST[upprice],dis='$_REQUEST[updis]','$path3' where productid=$_SESSION[uid]");
        move_uploaded_file($_FILES[upproductpic][tmp_name], $path4);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="form('form','item','insert',0);dis('data','item',1,'all','vachhe',0,0);recdis('recdata','item',1,'all','vachhe',0,0,0);">

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

                    <div class="col-md-7 ol-sm-12 col-xs-12">
                        <form action="" method="post" name="addproduct" enctype="multipart/form-data"> 
                            <section class="panel state">

                                <header class="panel-heading" style="background: #e0e1e7 !important;">
                                    <div style="float: left;">
                                        SELLER  BANNER  BILL
                                    </div>

                                    <div class="col-md-offset-3 col-md-5 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i  class="fa fa-cutlery"></i>
                                                </div>
                                                <select style="padding: 8px;" required="" name="sellerid" class="form-control" onchange="misscuis('misscuisine',this.value); ">
                                                    <option value="">--Select Store Name--</option>
<?php
$get = mysql_query("select * from store where del=0 and userid like '$_SESSION[user]' ");
while ($row = mysql_fetch_array($get)) {
    ?>                                        
                                                        <option value="<?php echo $row[3]; ?>"><?php echo $row[4]; ?></option>
                    <?php
                }
                
                ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                   

                                    <div style="clear: both;"></div>
                                </header>
                                <div class="panel-body">

                                    <div id="itemform">



                                    </div>

                                </div>


                            </section>
                        </form>        
                    </div>
 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="dis('data','item',1,'all','vachhe',0,'badhurec');recdis('recdata','item',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','item',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchproduct">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','item',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="itemdata">


                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="itemrecdata">

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
