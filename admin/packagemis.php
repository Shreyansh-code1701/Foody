<?php
require_once 'connection.php';

require_once 'adminsecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="seapack('seapack','badhu','badhu');">

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

require_once 'adminpati.php';
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
                                <div class="col-md-4 sea" style="background: #eee; color: #333; padding: 17px;">
                                            <i class="fa fa-search"></i>&nbsp;&nbsp; ADVANCE SEARCH
                                        </div>
                                        <div class="col-md-2 sea">
                                            <input type="text" name="business" onkeyup="seapack('seapack','business',this.value);" placeholder="Ex : Navjivan Hotel" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                            <input type="text" name="duration" onkeyup="seapack('seapack','duration',this.value);" placeholder="Ex : 1Month" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                                    <input type="text" name="amout"onkeyup="seapack('seapack','amout',this.value);"  placeholder="Ex : 2000" class="form-control ptx"/>
                                        </div>
                                        <div class="col-md-2 sea">
                                                    <input type="text" name="date" onkeyup="seapack('seapack','date',this.value);" placeholder="Ex : 2016-3-20" class="form-control ptx"/>
                                        </div>
                            </div>
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                PACKAGE MIS REPORT  
                            </header>
                            </div>
                            
                            <div class="panel-body">
                                 <div  id="printmis">
                                <div id="packmis">
                                    
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
