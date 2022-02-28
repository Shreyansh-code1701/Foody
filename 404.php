<?php
 
require_once 'conection.php';

$cm=  mysql_query("select * from cart where userid like '$_SESSION[user]' ");
$cmt=  mysql_fetch_array($cmt);
    if($cmt[0]=="")
    {
        $mt==1;
    }

?>


<!--------------------------------------------MISS CART------------------------------------------>


<?php
if($_REQUEST[kona]=="cart")
{
    
    if ($_REQUEST[id] != "") {
            $_SESSION[id] = $_REQUEST[id];

            $p = mysql_query("select price from item where productid=$_SESSION[id]");
            $pp = mysql_fetch_array($p);

            $tot = ((1) * ($pp[0]));
            $grand = $tot - 0;
            
            $s=mysql_query("select * from cart where userid like '$_SESSION[user]' and productid=$_REQUEST[id]");
            $ss=mysql_fetch_array($s);
            if($ss[0]=="")
            {
            $in = mysql_query("insert into cart values('$_SESSION[user]',$_SESSION[id],0,1,$pp[0],$tot,0,$grand)");
        
            }
            else
            {
                $v=$ss[3]+1;
                if($ss[3]<12)
                {
                    $u=mysql_query("update cart set qty=$v where cartid=$ss[2]");
                }
            }
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]==0)
        {
            $del=mysql_query("delete from cart where cartid=$_REQUEST[id]");
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]!=0)
        {
            $l=mysql_query("select price from cart where cartid=$_REQUEST[id]");
            $ll=mysql_fetch_array($l);
            $np=(($ll[0])*($_REQUEST[q]));
            $ng=$np-0;
            $up=mysql_query("update cart set qty=$_REQUEST[q],price=$ll[0],total=$np,grandtotal=$ng where cartid=$_REQUEST[id]");
        }
    
 
    
    
?>
<?php
$sel = mysql_query("select i.proname,i.url,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
while ($ss = mysql_fetch_array($sel)) {
    ?>
                                          
<div class="row" style="margin-top: 100%;">
                      <img src="images/empty_bag.gif" class="img img-responsive"/> 
        <div class="col-md-offset-10 col-md-2">
        
        <i class="fa fa-times" style="cursor: pointer; " title="Double click to remove from cart" ondblclick="misscart('cart','<?php echo $ss[4]; ?>',0);"></i>
        </div>
            <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
            <img src="seller/<?php echo $ss[1]; ?>" style="width:100%;"/>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px; padding:5px;">
            
            
                <div class="col-md-12" style="padding:5px;">
                    <font style="font-size:14px; font-weight: 600; color: #232323; text-transform: capitalize; "><?php echo $ss[0]; ?></font>
                </div>
      
                                                
            <div class="col-md-6 col-xs-12 col-sm-12" style="padding:5px;">

                    
                <input type="number" name="qty" class="form-control" required="" style="border-radius:5px;" value="<?php echo $ss[5]; ?>" min="1"  max="12" onchange="missprice(this.value,'<?php echo $ss[6]; ?>');misscart('cart','<?php echo $ss[4]; ?>',this.value);" />                              
                    

                                                    
                <div class="col-md-12 col-xs-12 col-sm-12" style="padding:5px;">
                    <i class="fa fa-rupee" ></i>&nbsp;<font><?php echo ($ss[5])*($ss[6]); ?></font>&nbsp;/-
                </div>
                
                
                                                    
            </div>

        </div>
           
        
        
    </div>
    <?php
}
?>

<div class="col-md-12 text-center " style="padding:5px;">
    <div class="col-md-6 " ><i class="fa fa-caret-left" style="font-size:30px;vertical-align: middle; margin-right: 2px; color: #f8a631;"></i><a href="filter.php" class="cartbtn" >Continue</a></div>
    <div class="col-md-6 " ><a href="confirm.php" class="cartbtn">Confirm</a><i class="fa fa-caret-right" style="font-size:30px;vertical-align: middle; margin-left: 2px;color: #f8a631;"></i></div>
            
         </div>

  <?php
}
  ?>



<!--------------------------------------------------confirm cart display--------------------------------------------------->



<?php
if($_REQUEST[kona]=="confirmcart")
{

    
?>
<?php
$sel = mysql_query("select i.proname,i.url,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
while ($ss = mysql_fetch_array($sel)) {
    ?>
                                        
    <div class="row">
        <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
            <img src="seller/<?php echo $ss[1]; ?>" style="width:70%;"/>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px;">

            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="col-md-10">
 
            <?php echo $ss[0]; ?>
                </div>
                
               
            </div>
                                                
            <div class="col-md-12 col-xs-12 col-sm-12">

                <div class="col-md-12 col-xs-12 col-sm-12">
                    
                    <?php echo $ss[5]; ?>
                    
                </div>
                                                    
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <i class="fa fa-rupee" ></i>&nbsp;<font id="misspr"><?php echo $ss[6]; ?></font>&nbsp;/-
                </div>
                
                
                                                    
            </div>

        </div>
           
        
        
    </div>
  
  <?php
}
?>
<div class="col-md-12 text-right">
    <div class="col-md-6" style="background: #f8a631; "><a href="product.php" >Cart</a></div>
        <div class="col-md-6" style="background: #f8a631;"> <a href="checkout.php" >checkout</a></div>
            
         </div>


<?php
}
  ?>