<?php
require_once 'connection.php';
require_once 'sellersecure.php';

if (isset($_REQUEST[send])) {
    
}
?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="missuserbill('missbannerbill','badha');">
 

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


                    <div class="col-md-10 ol-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                <div style="float: left;">
                                    SELLER  BANNER  BILL
                                </div>

                                <div class="col-md-offset-5 col-md-4 col-sm-10 col-xs-10">

                                    <select style="padding: 8px;" class="form-control" onchange="missuserbill('missbannerbill',this.value);">
                                        <option>--Select Store Name--</option>
                                        <?php
                                        $get = mysql_query("select * from store where userid like '$_SESSION[user]'");
                                        while ($row = mysql_fetch_array($get))
                                        {
                                            
                                            ?>                                        
                                            <option value="<?php echo $row[3]; ?>"><?php echo $row[4]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div style="clear: both;"></div>
                            </header>

                            <div class="panel-body" style="border: 1px dotted #65CEA7; padding: 2px;">

                                <div id="missbannerbill" >

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



         
