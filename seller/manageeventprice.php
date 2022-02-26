<?php
require_once 'connection.php';

require_once 'sellersecure.php';


//$er = 0;
if (isset($_REQUEST[send]))
{
//     $get = mysql_query("select * from eventprice where price=$_REQUEST[price]");
//    $g = mysql_fetch_array($get);
//
//    if ($g[0] == "") {
        $ins =mysql_query("insert into eventprice values($_REQUEST[store],$_REQUEST[event],$_REQUEST[price],0)");
        
//    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
//    else
//    {
//        $er=1;
//    }
  }  
  
  

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="form('form','eventprice','insert',0);dis('data','eventprice',1,'all','vachhe',0,0);recdis('recdata','eventprice',1,'all','vachhe',0,0,0);">

        <section>

<?php
require_once 'menu.php';
?>

            <div class="main-content" >


<?php
require_once 'toppati.php';

require_once 'sellerpati.php';
?>


                <div class="row" style="margin: 0;">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                <div style="float: left;">
                                ADD  EVENT PRICE
                                
                                </div>
                                
                                <div class="col-md-offset-3 col-md-5 col-sm-10 col-xs-10">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i  class="fa fa-cutlery"></i>
                                                </div>
                                                <select style="padding: 8px;" required="" name="sellerid" class="form-control" onchange="misscuis('missstoreevent',this.value); ">
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
                                <form action="" method="post" name="eventpriceform" class="form-group">
                                    
                                    <div id="eventpriceform">
                                        
                                    </div>
                                    
                                    <?php
//                                    if ($er == 1) 
//                                    {
//
//                                        echo "<font color=red size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
//                                    }
//                                     if ($er1== 1) 
//                                    {
//
//                                        echo "<font color=red size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
//                                    }
//                                  
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
                                            <i class="fa fa-laptop" ondblclick="dis('data','eventprice',1,'all','vachhe',0,'badhurec');recdis('recdata','eventprice',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket"  ondblclick="recdis('recdata','eventprice',1,'all','vachhe',0,0,'badhu');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searcheventprice">
                                            
                                                    <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','eventprice',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="eventpricedata">
                                            
                                                                     
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="eventpricerecdata">

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
