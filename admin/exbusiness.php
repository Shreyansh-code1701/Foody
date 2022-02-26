<?php
require_once 'connection.php';

require_once 'adminsecure.php';

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
            <div>
            <div class="main-content" >


<?php
require_once 'toppati.php';

require_once 'adminpati.php';
?>

                <div class="col-md-12">
                    <div class="col-md-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                BUSINESS WHO EXPIRE IN NEXT 5 DAY
                            </header>
                            <div class="panel-body">

<?php
$d = date('Y-m-d');
$b = mysql_query("select * from store where endingdate='$d' ");
while ($bb = mysql_fetch_array($b)) {
  

$d=date('Y-m-d' , strtotime('+5, days'));
    echo $bb[3];
}
?>

                            </div>
                        </section>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                BELOW BUSINESS WHO EXPIRE IN TODY
                            </header>
                            <div class="panel-body">

<?php
$d = date('Y-m-d');
$b = mysql_query("select * from store where endingdate='$d' ");
while ($bb = mysql_fetch_array($b)) {
    $up = mysql_query("update store set active=0 where storeid=$bb[3]");

    echo $bb[3];
}
?>

                            </div>
                        </section>
                    </div>

                </div>

                                <?php
                                require_once 'footer.php';
                                ?>
                
            </div>



        </div>

    </section>

                <?php
                require_once 'javascript.php';
                ?>

</body>


</html>
