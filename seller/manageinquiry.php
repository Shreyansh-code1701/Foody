<?php
require_once 'connection.php';

require_once 'sellersecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="dis('data','inquiry',1,'all','vachhe',0,0);recdis('recdata','inquiry',1,'all','vachhe',0,0,0);">

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
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading custom-tab tab-right ">
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active">
                                        <a href="#home-3" data-toggle="tab">
                                            <i class="fa fa-laptop" ondblclick="dis('data','inquiry',1,'all','vachhe',0,'badhurec');recdis('recdata','inquiry',1,'all','vachhe',0,0,0);"></i>
                                            DISPLAY
                                        </a>
                                    </li>
                                    

                                </ul>
                            </header>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-3">
                                        <form action="" method="post" name="searchinquiry">
                                            
                                                    <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="search" placeholder="Search here.." class="form-control" onkeyup="dis('data','inquiry',0,this.value,'vachhe',0);"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="inquirydata">
                                            
                                                                     
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
