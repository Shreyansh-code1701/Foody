<?php
require_once 'connection.php';
require_once 'adminsecure.php';

if (isset($_REQUEST[send])) {
    
}
?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="missbill('missbill','today',0);">
 
         <script type="text/javascript">
        
        function sellermis()
        {
            
        var p=document.getElementById("printmis");
        var pp=window.open('','_blank');
        
        pp.document.open();
        pp.document.write('<html><body onload="window.print()">' + p.innerHTML + '</html>');
        
         pp.document.close();
            
        }
    
        </script>

        <section>
            <?php
            require_once 'menu.php';
            ?>

            <div class="main-content" >

                <?php
                require_once 'toppati.php';
                require_once 'adminpati.php';
                ?>

                <div class="wrapper">


                    <div class="col-md-10 ol-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                <div style="float: left;">
                                    SELLER  PACKAGE BILL
                                </div>

                                <div class="col-md-offset-5 col-md-4 col-sm-10 col-xs-10">

                                    <select style="padding: 8px;" class="form-control" onchange="missbill('missbill',this.value,0);">
                                        <option>--Select Store Name--</option>
                                        <?php
                                        $get = mysql_query("select * from store where del=0");
                                        while ($row = mysql_fetch_array($get))
                                        {
                                            $sel = mysql_query("select * from user where userid like '$row[2]'");
                                            $sell = mysql_fetch_array($sel);
                                            ?>                                        
                                            <option value="<?php echo $row[3]; ?>"><?php echo $row[4]; ?> (<?php echo $sell[0]; ?>)</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div style="clear: both;"></div>
                            </header>

                            <div class="panel-body" style="border: 1px dotted #65CEA7; padding: 2px;">
                                <div class="col-md-12" id="printmis">
                                <div id="missbill" >

                                </div>
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
