<?php
require_once 'connection.php';
require_once 'usersecure.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="missuserbill('missbill','last',0);">

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
                        <font style="font-size:30px;">Food Locker</font>
                        </div> 

                    </div>
                </div>
            </div>
            <div class="container " ><BR></br>
                <div class="col-md-offset-3 col-md-6" >
                     <?php
                        $ug=  mysql_query("select username from user where userid like '$_SESSION[user]' ");
                        $ugg=  mysql_fetch_array($ug);
                    ?>
                     <div class="detailhead">
                        
                         <label class="mylbm ffont"><?php echo $ugg[0]; ?>&nbsp;,Your Total Bill  Available Here..  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>    
                       </div>
                    <br/>
                    <div class="col-md-4">
                        <select  name="billid" onchange="missuserbill('missbill','billno',this.value)">
                            <option value="" style="color: #f8a631;">-Select Bill No-</option>
                            <?php
                            $bd=  mysql_query("select billid from bill where userid like '$_SESSION[user]' ");
                            while ($bdd=  mysql_fetch_array($bd))
                            {
                        ?>
                            <option value="<?php echo $bdd[0]; ?>" style="color: #f8a631;"><?php echo $bdd[0]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                     </div>
                    <div class="col-md-offset-4 col-md-4">
                        <input type="date" name="fdate" onchange="missuserbill('missbill','fdate',this.value)" />
                     </div>
                </div>
                
                <div id="printbill">
                <div class="col-md-12" id="missbill">
                    
                </div>
                </div>
            </div>
            
            <br/>





            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>