<?php
require_once 'conection.php';
require_once 'usersecure.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="usermis('usermis','badhu','badhu');">

          <script type="text/javascript">
        
        function printbill()
        {
            
        var p=document.getElementById("printbill");
        var pp=window.open('','_blank');
        
        pp.document.open();
        pp.document.write('<html><body onload="window.print()">' + p.innerHTML + '</html>');
        
         pp.document.close();
            
        }
    
        </script>
        
        
        
        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            ?>
            <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg')">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                        <font style="font-size:30px;">Payment Method</font>
                        </div> 

                    </div>
                </div>
            </div>
            <div class="container " ><BR></br>
               
                 <section class="state">
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important; ">
                               SEARCHING PANEL
                                
                            </header>
                                </div>
                            <div class="col-md-12">
                             <div class="col-md-2 sea" style="background: #eee; color: #333; padding: 16px;">
                                 <i class="fa fa-search"></i>&nbsp;&nbsp;<font style="font-size: 14px;"> ADVANCE SEARCH</font>
                                        </div>
                               
                                        <div class="col-md-2 sea">
                                            <select class="form-control ptx" name="billno" onchange="usermis('usermis','billno',this.value);"style="border-radius:50px; ">
                                                <option style="color: #f8a631;">-Select Bill-</option>
                                                    <?php
                                                        $bu=  mysql_query("select distinct(billid) from transaction where userid like '$_SESSION[user]' ");
                                                        while ($blid=  mysql_fetch_array($bu))
                                                        {
                                                    ?>
                                                <option style="color: #f8a631;" value="<?php echo $blid[0]; ?>"><?php echo $blid[0];  ?></option>
                                                 <?php
                                                        }   
                                                   ?>
                                            </select> </div>
                                        <div class="col-md-2 sea">
                                            <select class="form-control ptx" name="paymethod" onchange="usermis('usermis','paymethod',this.value);" style="border-radius:50px; ">
                                                <option>-Select Pay Method-</option>
                                                <?php
                                                        $pu=  mysql_query("select distinct(paymethod) from bill where userid like '$_SESSION[user]' ");
                                                        while ($pay=  mysql_fetch_array($pu))
                                                        {
                                                    ?>
                                                <option style="color: #f8a631;" value="<?php echo $pay[0]; ?>"><?php echo $pay[0];  ?></option>
                                                 <?php
                                                        }   
                                                   ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 sea">
                                                    <input type="date" name="fdate" onchange="usermis('usermis','fdate',this.value);" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                                <div class="col-md-2 sea">
                                                    <input type="text" name="low" onkeyup="usermis('usermis','low',this.value);" placeholder="Ex : 100" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                                <div class="col-md-2 sea">
                                                    <input type="text" name="high" onkeyup="usermis('usermis','high',this.value);" placeholder="Ex : 700" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                            </div>
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                PACKAGE MIS REPORT  
                            </header>
                            </div>
                            
                            <div class="panel-body">
                                <div  id="printbill">
                                <div id="userbillmis">
                                    
                                </div>
                            </div>
                            </div>
                        </section>
               
            </div><br />


            
            
            



            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>