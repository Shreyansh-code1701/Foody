<?php
require_once 'connection.php';

require_once 'sellersecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="sellerbannerpack('sellerbannerpack','badhu','badhu');">

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
            <div>
            <div class="main-content" >


<?php
require_once 'toppati.php';

require_once 'sellerpati.php';
?>

                <div class="col-md-12">
                    <div class="col-md-12">
                        
                        <section class="panel state">
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important; ">
                               SEARCHING PANEL
                                
                            </header>
                                </div>
                            <div class="col-md-12">
                                <div class="col-md-2 sea" style="background: #eee; color: #333; padding:6px 5px 27px 5px;">
                                    <i class="fa fa-search"></i><font style="font-size: 13px; ">&nbsp;ADVANCE  SEARCH </font>
                                        </div>
                                        <div class="col-md-2 sea">
                                            <input type="text" name="business" onkeyup="sellerbannerpack('sellerbannerpack','seller',this.value);" placeholder="Ex : Khatik Vishnu" class="form-control ptx"/>
                                        </div>
                                <div class="col-md-2 sea">
                                            <input type="text" name="business" onkeyup="sellerbannerpack('sellerbannerpack','business',this.value);" placeholder="Ex : Navjivan Hotel" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                            <input type="text" name="duration" onkeyup="sellerbannerpack('sellerbannerpack','timeperiod',this.value);" placeholder="Ex : 1Month" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                                    <input type="text" name="amout"onkeyup="sellerbannerpack('sellerbannerpack','amout',this.value);"  placeholder="Ex : 2000" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                                    <input type="text" name="date" onkeyup="sellerbannerpack('sellerbannerpack' ,'date',this.value);" placeholder="Ex : 2016-3-20" class="form-control ptx"/>
                                        </div>
                            </div>
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                PACKAGE MIS REPORT  
                            </header>
                            </div>
                            
                            <div class="panel-body">
                                <div  id="printmis">
                                <div id="sellerbannermis">
                                    
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



        </div>

    </section>

                <?php
                require_once 'javascript.php';
                ?>

</body>


</html>
