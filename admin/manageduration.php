<?php
require_once 'connection.php';

require_once 'adminsecure.php';


$er = 0;
if (isset($_REQUEST[send]))
{
     $get = mysql_query("select * from duration where durationtime like '$_REQUEST[duration]' and cost=$_REQUEST[cost]");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("insert into duration values(0,'$_REQUEST[duration]',$_REQUEST[cost],0,$_REQUEST[months])");
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    else
    {
        $er=1;
    }
  }  
  
  
  $er1 = 0;
if (isset($_REQUEST[upsend]))
{
     $get = mysql_query("select * from duration where durationtime like '$_REQUEST[durationupdate]' and cost=$_REQUEST[costupdate]");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("update duration set durationtime='$_REQUEST[durationupdate]',cost=$_REQUEST[costupdate], months=$_REQUEST[updatemonths] where durationid=$_SESSION[uid]");
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

    <body class="sticky-header" onload="form('form','duration','insert',0);dis('data','duration',1,'all','vachhe',0,0);recdis('recdata','duration',1,'all','vachhe',0,0,0);">

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
                                ADD  DURATION TIME
                            </header>
                            <div class="panel-body">
                                <form action="" method="post" name="durationform" class="form-group">
                                    
                                    <div id="durationform">
                                        
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
                                            <i class="fa fa-laptop" ondblclick="dis('data','duration',1,'all','vachhe',0,'badhurec');recdis('recdata','duration',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','duration',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchduration">
                                            
                                                    <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','duration',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="durationdata">
                                            
                                                                     
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="durationrecdata">

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
