<?php
require_once 'connection.php';

require_once 'sellersecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="sellerusemis('sellerusemis','badhu','badhu');">

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
                        
                        <section class="state">
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important; ">
                               SEARCHING PANEL
                                
                            </header>
                                </div>
                            <div class="col-md-12">
                                <div class="col-md-2 sea">
                                            <select class="form-control ptx" name="storeid" onchange="sellerusemis('sellerusemis','store',this.value);"style="border-radius:50px; ">
                                                <option style="color: #f8a631;">---Select Store---</option>
                                                    <?php
                                                        $sl=  mysql_query("select storeid,storename from store where userid like '$_SESSION[user]' ");
                                                        while ($row=  mysql_fetch_array($sl))
                                                        {
                                                    ?>
                                                <option style="color: #f8a631;" value="<?php echo $row[0]; ?>"><?php echo $row[1];  ?></option>
                                                 <?php
                                                        }   
                                                   ?>
                                            </select> </div>
                                        <div class="col-md-2 sea">
                                            <select class="form-control ptx" name="billno" onchange="sellerusemis('sellerusemis','billno',this.value);"style="border-radius:50px; ">
                                                <option style="color: #f8a631;">----Select Bill----</option>
                                                    <?php
                                                        $bu=  mysql_query("select s.userid,s.storeid,t.* from bill b,transaction t,store s,item p where p.productid=t.productid and s.storeid=p.storeid and b.billid=t.billid and s.userid like '$_SESSION[user]' ");
                                                        while ($blid=  mysql_fetch_array($bu))
                                                        {
                                                    ?>
                                                <option style="color: #f8a631;" value="<?php echo $blid[2]; ?>"><?php echo $blid[2];  ?></option>
                                                 <?php
                                                        }   
                                                   ?>
                                            </select> </div>
                                        <div class="col-md-2 sea">
                                            <select class="form-control ptx" name="paymethod" onchange="sellerusemis('sellerusemis','paymethod',this.value);" style="border-radius:50px; ">
                                                <option>----Select Pay----</option>
                                                <?php
                                                        $pu=  mysql_query("select distinct(paymethod) from bill ");
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
                                                    <input type="date" name="fdate" onchange="sellerusemis('sellerusemis','fdate',this.value);" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                                <div class="col-md-2 sea">
                                                    <input type="text" id="low"  onkeyup="sellerusemis('sellerusemis','lprice',this.value);" placeholder="Ex : 100" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                                <div class="col-md-2 sea">
                                                    <input type="text"  id="high"   onkeyup="sellerusemis('sellerusemis','hprice',this.value);" placeholder="Ex : 700" class="form-control ptx" style="border-radius:50px;"/>
                                        </div>
                            </div>
                            <div class="col-md-12">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                PACKAGE MIS REPORT  
                            </header>
                            </div>
                            
                            <div class="panel-body">
                                <div  id="printmis">
                                <div id="sellermis">
                                    
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
