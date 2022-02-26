<?php
require_once 'connection.php';

require_once 'adminsecure.php';


$er = 0;
if (isset($_REQUEST[send]))
{
     $get = mysql_query("select * from timeperiod where timeperiodname like '$_REQUEST[timeperiod]' and price=$_REQUEST[price]");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("insert into timeperiod values(0,'$_REQUEST[timeperiod]',$_REQUEST[price],0,$_REQUEST[days])");
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    else
    {
        $er=1;
    }
  }  
  
  
  $er1 = 0;
if (isset($_REQUEST[upsend]))
{
     $get = mysql_query("select * from timeperiod where timeperiodname like '$_REQUEST[timeperiodupdate]' and cost=$_REQUEST[pricetupdate]");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("update timeperiod set timeperiodname='$_REQUEST[timeperiodupdate]',price=$_REQUEST[priceupdate],days=$_REQUEST[updays] where timeperiodid=$_SESSION[uid] ");
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    else
    {
        $er1=1;
    }
  }  
  


?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="form('form','timeperiod','insert',0);dis('data','timeperiod',1,'all','vachhe',0,0);recdis('recdata','timeperiod',1,'all','vachhe',0,0,0);">

        <section>

<?php
require_once 'menu.php';
?>

            <div class="main-content" >


<?php
require_once 'toppati.php';

require_once 'adminpati.php';
?>


                <div class="row" style="margin: 0;">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                ADD TIME PERIOD 
                            </header>
                            <div class="panel-body">
                                <form action="" method="post" name="timeperiodform" class="form-group">
                                    
                                    <div id="timeperiodform">
                                        
                                    </div>
                                    
                                    <?php
                                    if ($er == 1) 
                                    {

                                        echo "<font color=red size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
                                    }
                                     if ($er1== 1) 
                                    {

                                        echo "<font color=red size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
                                    }
                                  
                                    ?>
                                    
                                </form>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="dis('data','timeperiod',1,'all','vachhe',0,'badhurec');recdis('recdata','timeperiod',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','timeperiod',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchtimeperiod">
                                            
                                                    <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','timeperiod',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="timeperioddata">
                                            
                                                                     
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="timeperiodrecdata">

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

<?php
require_once 'javascript.php';
?>

    </body>


</html>
