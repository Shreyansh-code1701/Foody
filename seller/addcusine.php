<?php
require_once 'connection.php';
require_once 'sellersecure.php';

?>

<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" >

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
                                <div style="float: left;">
                                    SELLER  ADD CUISINE
                                </div>

                                <div class="col-md-offset-5 col-md-4 col-sm-10 col-xs-10">
                                    <form action="" method="post" name="selectstore">
                                    <select style="padding: 8px;" class="form-control" onclick="restore('cuisine','store','up',this.value,'0');  backup('mcat','store','dis',this.value,'0','backup');">
                                        <option>--Select Store Name--</option>
                                        <?php
                                        $get = mysql_query("select * from store where userid like '$_SESSION[user]'");
                                        while ($row = mysql_fetch_array($get))
                                        {
                                            
                                            ?>                                        
                                            <option value="<?php echo $row[3]; ?>" name="storei" id="storei"><?php echo $row[4]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    </form>
                                </div>
                                <div style="clear: both;"></div>
                            </header>
                            <div class="panel-body">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <fieldset>
                                                            <legend style="padding-bottom: 10px">CHOOSE CUISINE</legend>
                                                    </fieldset> 
                                            <div id="addcuisine">
                                
                            </div>
                                        </div>
                                       
                                        <div class="col-md-6 col-sm-12 col-xs-12" id="selectcuisine" >
                                                    <fieldset>
                                                            <legend style="padding-bottom: 10px">SELECTED CUISINE</legend>
                                                    </fieldset> 
                                             <div id="addmcat">
                                
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
