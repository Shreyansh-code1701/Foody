<?php
require_once 'connection.php';

require_once 'adminsecure.php';


$er = 0;
if (isset($_REQUEST[send])) 
{
    $get = mysql_query("select * from area where areaname like '$_REQUEST[area]'");
    $g = mysql_fetch_array($get);

    if ($g[0] == "") {
        $ins = mysql_query("insert into area values($_REQUEST[cityid],0,'$_REQUEST[area]',0)");
    } else {
        $er = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="display('area','display','1','10');recycle('area','display','1','10');">

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
                                ADD AREA
                            </header>
                            <div class="panel-body">
                                <form action="" method="post" name="areaform" class="form-group">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <select required="" name="cityid" class="form-control">
                                                <option value="">--Select City--</option>
                                                <?php
                                                $get=mysql_query("select * from city");
                                                while($row=  mysql_fetch_array($get))
                                                {
                                                ?>
                                                <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
                                                <?php
                                                }
                                                 ?>
                                            </select>
                                            <div class="input-group-addon">
                                                <i  class="fa fa-globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group" style="margin-top: 2%;">
                                            
                                            <input type="text" class="form-control" name="area" required="" pattern="^[a-z ]+$" placeholder="Enter area"/>
                                            <div class="input-group-addon">
                                                <i  class="fa fa-globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
<?php
if ($er == 1) 
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
                                            <i class="fa fa-laptop" ondblclick="del('area','delete','<?php echo $p; ?>','<?php echo $pp; ?>','all');recycle('area','display','1','10');"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#about-3" data-toggle="tab">
                                            <i class="fa fa-bitbucket" ondblclick="fdel('area','delete','<?php echo $p; ?>','<?php echo $pp; ?>','all');"></i>
                                            RECYCLE
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searcharea">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select style="border: none; background: none; outline: none;" onchange="display('area','display','1',this.value);">
                                                            
                                                            <option>10</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" name="search" placeholder="Search here.." id="find" class="form-control" onkeyup="display('area','display','1','10');"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="area">

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                        <div id="rarea">

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
