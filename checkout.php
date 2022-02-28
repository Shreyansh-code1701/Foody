<?php
require_once 'conection.php';
require_once 'usersecure.php';

   if($_SESSION[cartche]!=1)
    {
        header("location:product.php");
}

   if($_SESSION[confirm]!=1)
    {
        header("location:product.php");
}


if(isset($_REQUEST[coupon]))
{
    if($_SESSION[coupon]==$_REQUEST[name])
    {
        $_SESSION[malshe]=1;
    }
}



if(isset($_REQUEST[check]))
{

    $_SESSION[name]=$_REQUEST[name];
     $_SESSION[cityid]=$_REQUEST[city];
      $_SESSION[areaid]=$_REQUEST[area];
       $_SESSION[add]=$_REQUEST[address];
        $_SESSION[contact]=$_REQUEST[contact];
        $_SESSION[pincode]=$_REQUEST[pincode];
         $_SESSION[payment]=$_REQUEST[payment];
       
        header("location:paypayment.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>
    <script type="text/javascript">
              
        $(document).ready(function(){
            
            $('#cup').hide();
            $('#cu').click(function(){
                $('#cup').slideToggle(250);
            });
                
            
        });
        
    </script>
    <body class="smooth-scroll" onload="addform('addform',0);">

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
                        <font style="font-size:30px;">Checkout</font>
                        </div> 

                    </div>
                </div>
            </div>
            
             
            
                <div class="container " ><BR></br>
                    <div class="row" style="">
                            <div class="detailhead">
                                
                                <label class="mylbm" style="cursor: pointer;" id="cu">Click Here and get coupan code  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    
                            </div>
                        <div class="col-md-12" id="cup"><br/>
                            <form action="" method="post" name="cupform">
                                <div class="form-group col-md-5 animated shake" >
                                           
                                            <div class="input-group">
                                                <input type="text" name="name" placeholder="Fill Your Name" style="padding: 15px;"  required=""  pattern='^[0-9]+$'  class="form-control"/>
                                                <div class="input-group-addon regi">
                                                    <button type="submit" name="coupon" style="border: none; background: #f8a631;"> <i class="fa fa-user-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                            </form>
                        </div>
                        </div> <br/><br/>

                    <div class="row">
                       <form action="" method="post" name="shippingfrom">
                       
                        <?php
                        $u = mysql_query("select * from user where userid like '$_SESSION[user]' ");
                        $uu = mysql_fetch_array($u);
                        $sl = mysql_query("select * from store where userid like '$_SESSION[user]' ");
                        $sll = mysql_fetch_array($sl);
                        ?>
                        <div class="col-md-8">
                            <div class="col-md-12" style="border: 3px solid #eee;box-shadow: 1px 2px 1px #eee ;">
                            <div class="detailhead">
                                <?php
                                if ($uu[2] == "male") {
                                    ?>
                                    <label class="mylbm">Mr.<font class="animated flash " style="color: #232323;">&nbsp;&nbsp;<?php echo $uu[0]; ?></font>&nbsp;&nbsp;&nbsp;Contact Detail   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    <?php
                                } else {
                                    ?>
                                    <label class="mylbm">Mrs.<font class="animated flash " style="color: #232323;"><?php echo $uu[0]; ?></font>&nbsp;&nbsp;&nbsp;Contact Detail   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    <?php
                                }
                                ?>
                            </div>
                           
                            <table class="table table-responsive">
                                <tr>
                                      <td><img src="<?php echo $uu[12]; ?>"  style="width: 90px; height: 90px; border-radius:100px; text-align: center;" />&nbsp;&nbsp;&nbsp;&nbsp; </td>
                                    <td><i class="fa fa-envelope"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $uu[6]; ?> <br/><br/>
                                        <i class="fa fa-home"></i> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                        <?php echo $uu[1]; ?><br/><br/>

                                        <i class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php echo $uu[7]; ?><br/><br/>
  <i class="fa fa-ticket"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <?php   if($_SESSION[coupon]=="")
                                                {
                                                    ?>
                                                              <font>Coupon Code  Can Not Available </font>
                                                      <?php
                                                }
                                                else
                                                {
                                             echo $_SESSION[coupon];
                                                }
                                             
                                                ?>
                                        </td>
                                  
                                </tr>
                            </table>    
                            </div><br/><br/>
                            <div class="col-md-12" style="margin-top: 30px; border: 3px solid #eee;box-shadow: 1px 2px 1px #eee ;">
                                <div class="detailhead">
                                <label class="mylbm"><i class="fa fa-car" style="color: #232323;"></i> Your Shipping Detail    &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                            </div>
                                <table class="table table-responsive">
                                <?php
                                $as=  mysql_query("select * from shipping where userid like '$_SESSION[user]' ");
                                while($ass=  mysql_fetch_array($as))
                                {
                                    $cs=  mysql_query("select cityname from city where cityid=$ass[1]");
                                    while ($css = mysql_fetch_array($cs))
                                        {
                                        $ar=  mysql_query("select areaname from area where areaid=$ass[2]");
                                    while ($arr = mysql_fetch_array($ar))
                                        {
                                        
                                   if($ass=="" || $css=="" || $arr=="")
                                   {
                                       
                                   }
                                   else
                                   {
                                    ?>
                                <tr>
                                    <td style="text-transform: capitalize; border: none;"><input type="radio" name="shippingadd" value="<?php echo $ass[3]; ?>" onchange="addform('addform',this.value);" required="" style="cursor: pointer"  /></td>
                                    <td style="text-transform: capitalize; border: none;">
                                        <p><font><i class="fa fa-globe"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $css[0];  ?></p>
                                        <p><font><i class="fa fa-globe"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $arr[0];  ?></p>
                                       <p> <font><i class="fa fa-home"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ass[5]; ?></p>
                                        <p><font><i class="fa fa-mobile"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ass[6]; ?></p>
                                        <p><font><i class="fa fa-barcode"></i></font>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ass[7]; ?></p>
                                    </td>
                                </tr>
                                <?php
                                }
                                        }
                                }
                                }
                                ?>
                                </table>
                            </div>
                            <div class="col-md-12" style="margin-top: 30px; border: 3px solid #eee;box-shadow: 1px 2px 1px #eee ;">
                                 <div class="detailhead">
                                <label class="mylbm"><i class="fa fa-car" style="color: #232323;"></i> Fill Shipping Detail    &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                            </div>
                            
                           

                               

                            <div style="padding-top: 10px;"></div>
                            
                            
                            <div class="col-md-8 " id="maruaddform">
                                
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 30px; border: 3px solid #eee;box-shadow: 1px 2px 1px #eee ;">
                                <div class="col-md-12">
                                    <div class="detailhead">
                                        <label class="mylbm">Choose Your Easy Pay Service  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div>
                                </div>
                                <table class="table table-responsive" >
                                    <?php
                                    $pay = mysql_query("select * from paymethod where del=0");
                                    while ($payma = mysql_fetch_array($pay)) {
                                        
                                        ?>
                                        <tr >
                                            <td style="border: 0 !important;  padding: 10px 10px 10px 60px; "><input type="radio" value="<?php echo $payma[1]; ?>" name="payment" required=""/></td>
                                            <td style="border: 0 !important; padding: 10px 10px 10px 60px; "><i class="<?php echo $payma[2]; ?>" style="font-size: 20px;"></i></td>
                                            <td style="border: 0 !important; padding: 10px 10px 10px 60px; "><?php echo $payma[1]; ?> </td>
                                            

                                        </tr>
                                        <?
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                           
                           
                            <div class="col-md-4" style="background: #eee;">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="detailhead">
                                        <label class="mylbm">Shipping Policy  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div>
                                    <div class="shippingbill"><br/>
                                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Standard Delivery in 30 Minutes From Today.<br/><br/>
                                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Express delivery Is available But additional Charge Is &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;applied.<br/><br/>
                                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;IN india shipping charche 100/- .<br/><br/>
                                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;late night Service available .<br/><br/><br/>

                                    </div>


                                </div>
                            
                                <div class="col-md-12">
                                    <div class="detailhead">
                                        <label class="mylbm">Checkout Cart &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div>
                                    <?php
                                    $c = mysql_query("select count(cartid) from cart where userid like '$_SESSION[user]'");
                                    $cc = mysql_fetch_array($c);
                                    ?>
                                    <div class="detailhead text-center">
                                        <label class="mylbm animated hightitle">Total Choose Item&nbsp;(<?php echo $cc[0]; ?>)&nbsp;&nbsp;</label>
                                    </div>

                                    <?php
                                   
                                    $sel = mysql_query("select i.proname,i.url,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
                                    while ($ss = mysql_fetch_array($sel)) {
                                         $ftot=$ftot+$ss[9];
                                        ?>

                                        <div class="row" style="border-bottom: 1px dotted #f8a631;">
                                            <div class="col-md-3 col-xs-12 col-sm-12" style="padding-top: 12px; ">
                                                <img src="seller/<?php echo $ss[1]; ?>" style="width:100%;"/>
                                            </div>
                                            <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px;">

                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <div class="col-md-12" style="font-weight: 600;text-transform: capitalize;">

                                                      

                                                        <?php echo $ss[0]; ?>
                                                    </div>


                                                </div>

                                                <div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px;">

                                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                                        <font style="padding: 10px; font-size: 14px;">    
                                                        <?php echo $ss[5]; ?>&nbsp;x&nbsp;<i class="fa fa-rupee"style="font-size: 13px;" ></i>&nbsp;<font id="misspr" style="font-size: 14px;"><?php echo $ss[6]; ?></font>&nbsp;/-
                                                        </font>

                                                        <div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px;">
                                                            Total: <i class="fa fa-rupee" style="font-size: 13px;" ></i>&nbsp;<font id="misspr" ><?php echo $ss[6]; ?></font>&nbsp;/-
                                                        </div>
                                                        <div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px;">
                                                            Grand Total: <i class="fa fa-rupee" style="font-size: 13px;" ></i>&nbsp;<font id="misspr" ><?php echo $ss[7]; ?></font>&nbsp;/-
                                                        </div>

                                                    </div>





                                                </div>

                                            </div>


                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div style="padding: 5px;">
                                        <i class="fa fa"></i>Grand Total : &nbsp;<i class="fa fa-rupee"></i>&nbsp;<?php echo $ftot;  ?>&nbsp;/-
                                    </div>
                                     <i class="fa fa-truck"></i>&nbsp;Shipping charge : &nbsp;<i class="fa fa-rupee"></i>&nbsp;100 &nbsp;/-<?php $ftot=$ftot+100; ?>
                                  
                                     <div style="padding: 5px;">
                                         Services  Text consultant 2&nbsp;% of Payable Amount : &nbsp;<i class="fa fa-rupee"></i>&nbsp;<?php echo $chupay=ceil(($ftot*2)/(100)); $_SESSION[chupay]=$chupay+$ftot; ?>&nbsp;/-
                                    </div>
                                    <?php
                                     if($_SESSION[malshe]==1)
                                     {
                                   ?>
                                     <div style="padding: 5px;">
                                         <i class="fa fa-ticket"></i>&nbsp;Coupon Code Discount Here : &nbsp;<i class="fa fa-rupee"></i>&nbsp;<?php echo $co=ceil(($ftot*3)/(100));  ?>&nbsp;/-
                                    </div>
                                      <?php
                                     }
                                     ?>
  
                                  <?php
                                     if($_SESSION[offrate]!="")
                                     {
                                   ?>
                                     <div style="padding: 5px;">
                                       Spacial <?php echo $_SESSION[offname]; ?> : &nbsp;Discount(<?php echo $_SESSION[offrate]?>%)&nbsp;&nbsp;<i class="fa fa-rupee"></i>&nbsp;<?php  echo $offf=ceil((($ftot-100)*$_SESSION[offrate])/(100));   ?>&nbsp;/-
                                    </div>
                                      <?php
                                     }
                                     ?>
                                    <div style="border-top: 1px dotted #f8a631;">
                                        <font style="color: #f8a631; font-weight: 600; font-size: 15px;">  Payable Amount : &nbsp;<i class="fa fa-rupee"></i><?php if($_SESSION[malshe]==1 && $_SESSION[offrate]!=""){echo $_SESSION[chupay]-($co+$offf);$_SESSION[dis]=($co+$offf);}else if ($_SESSION[malshe]==1 && $_SESSION[offrate]==""){echo $_SESSION[chupay]=$_SESSION[chupay]-$co; $_SESSION[dis]=$co;}else if ($_SESSION[malshe]!=1 && $_SESSION[offrate]!=""){echo $_SESSION[chupay]=$_SESSION[chupay]; $_SESSION[dis]=$offf;} else {echo $_SESSION[chupay]; $_SESSION[dis]=0;}; ?>&nbsp;/-</font>
                                    </div>
                                    <div class="detaildekho col-md-12">
                                        <p class="text-right">
                                            <button  type="submit" name="check" class="ht-button view-more-button" >
                                                <i class="fa fa-arrow-left"></i>CHECK OUT<i class="fa fa-arrow-right"></i>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                           
                        </form>
                    </div>
                </div><br>
            





<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>



