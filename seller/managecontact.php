<?php
require_once 'connection.php';
require_once 'sellersecure.php';


?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="missstore('contactstore',0,0);" >

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

                        
                         <div class="col-md-12 ol-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                              MANAGE CONTACT STORE
                            </header>
                            <div class="panel-body">
                                <div id="contactstore">
                                     
                                </div>
                        </div>
                        </section>
        
                        
                    </div>
                    
                </div>
                <div style="margin-top: 16%;">
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
