<?php
require_once 'connection.php';

require_once 'adminsecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="display('subscriber','display','1','10');recycle('subscriber','display','1','10');">

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
                    <div class="col-md-6 col-sm-10 col-xs-10">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                Email SUBSCRIBER
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="fdel('subscriber','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('subscriber','display','1','10');"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchsubscriber">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select style="border: none; background: none; outline: none;" onchange="display('subscriber','display','1',this.value);">
                                                            
                                                            <option>10</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" name="search" placeholder="Search here.." id="find" class="form-control" onkeyup="display('subscriber','display','1','10');"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="subscriber">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>
                    
                    
                     <div class="col-md-6 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="del('state','delete','<?php echo $p; ?>','<?php echo $pp; ?>','all');recycle('state','display','1','10');"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="sendmail">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <textarea rows="5" class="form-control" name="mail" autofocus="" required="" style="resize:none;" placeholder="Enter Message"></textarea>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" name="sendmail" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-primary">Reset</button>

                                            
                                        </form>
                                        
                                    </div>
                                    <div class="tab-pane" id="about-3">
                                      
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
