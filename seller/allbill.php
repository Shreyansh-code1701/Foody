<?php
require_once 'connection.php';

require_once 'sellersecure.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'head.php';
?>

    <body class="sticky-header" onload="sellbill('sellbill','selllast',0);">

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
                                
                                <div class="col-md-2 sea">
                                    <select  name="billid" onchange="sellbill('sellbill','user',this.value);" class="form-control">
                                        <option value="" style="color: #f8a631;">--Select User--</option>
                                        <?php
                                        $cs = mysql_query("select s.userid,s.storeid,t.* from bill b,transaction t,store s,item p where p.productid=t.productid and s.storeid=p.storeid and b.billid=t.billid and s.userid like '$_SESSION[user]' ");
                                        while ($bdd = mysql_fetch_array($cs)) {
                                            ?>
                                            <option value="<?php echo $bdd[3]; ?>" style="color: #f8a631;"><?php echo $bdd[3]; ?></option>
                                            <?php
                                        }
                                   
                                        ?>
                                    </select>
                                </div>
                                
                                        <div class="col-md-2 sea">
                                                <select  name="sellbillno" onchange="sellbill('sellbill','billno',this.value);" class="form-control">
                                        <option value="" style="color: #f8a631;">--Select Bill no--</option>
                                        <?php
                                        $cs = mysql_query("select s.userid,s.storeid,t.* from bill b,transaction t,store s,item p where p.productid=t.productid and s.storeid=p.storeid and b.billid=t.billid and s.userid like '$_SESSION[user]' ");
                                        while ($bdd = mysql_fetch_array($cs)) {
                                            ?>
                                            <option value="<?php echo $bdd[2]; ?>" style="color: #f8a631;"><?php echo $bdd[2]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                        </div>
                                
                                        <div class="col-md-2 sea">
                                            <select  name="payname" onchange="sellbill('sellbill','payname',this.value);" class="form-control">
                                        <option value="" style="color: #f8a631;">--Select Pay name--</option>
                                        <?php
                                        $cp = mysql_query("select distinct paymethod from bill ");
                                        while ($bp = mysql_fetch_array($cp)) {
                                            ?>
                                            <option value="<?php echo $bp[0]; ?>" style="color: #f8a631;"><?php echo $bp[0]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                        </div>
                            
                                
                                        <div class="col-md-2 sea">
                                                    <input type="date" name="date" onchange="sellbill('sellbill','date',this.value);" placeholder="Ex : 2016-3-20" class="form-control ptx"/>
                                        </div>
                                
                                        <div class="col-md-2 sea ">
                                            <input type="text"  placeholder="Low" id="low"  onkeyup="sellbill('sellbill','lprice',this.value);"  class="form-control" />
                                        </div>
                                        <div class="col-md-2 sea">
                                            <input type="text"  placeholder="High" id="high"  onkeyup="sellbill('sellbill','hprice',this.value);"  class="form-control" />
                                        </div>
                                
                                        
                            </div>
                            <div class="col-md-12">
                             <header class="panel-heading" style="background: #e0e1e7 !important;">
                                <div style="float: left;">
                                    USER BILL
                                </div>

                                <div class="col-md-offset-7 col-md-4 col-sm-10 col-xs-10">

                                    <select style="padding: 8px;" name="sellerid" class="form-control" onchange="sellbill('sellbill','store',this.value);">
                                        <option>--Select Store--</option>
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
                            </div>
                            
                            <div class="panel-body icon icon-cuisines ">
                                <div id="printbill">
                                <div id="sellbill">
                                   
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