<?php
    require_once 'conection.php';
     
    
    if($_SESSION[chupay]=="")
    {
        header('location:userprofile.php');
    }
    
  if(isset($_REQUEST[pay]))
  {
  if($_SESSION[alr]!=1)
  {
        $in=mysql_query("insert into shipping values('$_SESSION[user]',$_SESSION[cityid],$_SESSION[areaid],0,'$_SESSION[name]','$_SESSION[add]','$_SESSION[contact]','$_SESSION[pincode]')");
  }
  $d=date('Y-m-d');
  $bl=mysql_query("insert into bill values('$_SESSION[user]',0,'$d',100,$_SESSION[dis],'$_SESSION[add]',' $_SESSION[payment]',$_SESSION[chupay],$_SESSION[pincode],'$_SESSION[contact]')");
  
  $mbil=mysql_query("select  max(billid) from bill where userid like '$_SESSION[user]' ");
  $mmbil=mysql_fetch_array($mbil);
  
  $getcart=mysql_query("select * from cart where  userid like '$_SESSION[user]' ");
  while($gt=  mysql_fetch_array($getcart))
  {
     $tin=mysql_query("insert into transaction values($mmbil[0],'$_SESSION[user]',$gt[1],0,$gt[3],$gt[4],$gt[5],$gt[6],$gt[7])");
  }
  
  $dlcart=mysql_query("delete from cart where userid like '$_SESSION[user]' ");
  
  unset($_SESSION[name]);
    unset($_SESSION[cityid]);
      unset($_SESSION[areaid]);
        unset($_SESSION[add]);
          unset($_SESSION[contact]);
          unset($_SESSION[pincode]);
            unset($_SESSION[payment]);
              unset($_SESSION[chupay]);
               unset($_SESSION[alr]);
               unset($_SESSION[confirm]);
               unset($_SESSION[cartche]);
               unset($_SESSION[offrate]);
               unset($_SESSION[coupon]);
               unset($_SESSION[offname]);
               unset($_SESSION[malshe]);
               unset ($_SESSION[dis]);
               unset ($_SESSION[offdis]);
         
               
  
   header("location:https://www.paypal.com/cgi-bin/webscr");
  }
 
    
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
require_once 'head.php';
?>

    <body class="smooth-scroll" >

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('[data-toggle="tooltip"]').tooltip({
                  
                });
                $('[data-toggle="popover"]').popover({
               
                });
           
            });
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
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">A</font><b style="color: #F8A631;">BOUT</b>&nbsp; <font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div> 

                    </div>
                </div>
            </div>

            <section class="ht-section hs-recipes grid">
              
                <div class="container">
                <div class="row ht-widget hw-popular-categories" >
                        <font class="sitemapline">Click Belove To Final Confirm Your Order And Take Place At Your Home</font>
                    </div><br/><br/>
                     <?php
                     
                         $c = mysql_query("select count(cartid) from cart where userid like '$_SESSION[user]'");
                         $cc = mysql_fetch_array($c);
                      
                     ?>
                     <label class="mylbm">Your Total find Item : &nbsp;<?php echo $cc[0]; ?></label><br/>
                     <label class="mylbm">Your Payable Amount is :<font style="color:#232323;"><i class="fa fa-rupee" style="font-size: 13px;" ></i>&nbsp;<?php echo $_SESSION[chupay]-$_SESSION[dis]; ?></font>&nbsp;/-</label>
                     <div>
                     <form action="" method="post">
                          <p class="text-left">
                                            <button  type="submit" name="pay" class="ht-button view-more-button" >
                                                <i class="fa fa-arrow-left"></i><i class="fa fa-paypal"></i>Click To Buy<i class="fa fa-arrow-right"></i>
                                            </button>
                                        </p>
                     </form>
                     </div>
                </div>
                
                

            </section>



<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>