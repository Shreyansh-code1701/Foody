<?php
require_once 'connection.php';

$cm = mysql_query("select * from cart where userid like '$_SESSION[user]' ");
$cmt = mysql_fetch_array($cmt);
if ($cmt[0] == "") {
    $mt == 1;
}
?>



<!--------------------------------------------MISS CART------------------------------------------>



<?php
if($_REQUEST[kona]=="cart")
{
    
    
    if ($_REQUEST[id] != "") {
            $_SESSION[id] = $_REQUEST[id];

            $p = mysql_query("select price,storeid from item where productid=$_SESSION[id]");
            $pp = mysql_fetch_array($p);

            $tot = (($_REQUEST[q])*($pp[0]));

            $off=mysql_query("select * from offer where storeid=$pp[1] and del=0");
            $offer=mysql_fetch_array($off);
            
            if($offer[8]!="")
            {
                $disc=ceil(($tot)*($offer[8])/100);
                $grand=($tot)-($disc);
            }
            else
            {
                $disc=0;
                $grand=$tot;
            }
            
            $s=mysql_query("select * from cart where userid like '$_SESSION[user]' and productid=$_REQUEST[id]");
            $ss=mysql_fetch_array($s);
            
            if($ss[0]=="")
            {
                 $in = mysql_query("insert into cart values('$_SESSION[user]',$_SESSION[id],0,1,$pp[0],$tot,$disc,$grand)");
            }
            else
            {
                $q=$ss[3]+1;
                    
                $total = (($q)*($pp[0]));
            
            if($offer[8]!="")
            {
                $disco=ceil(($total)*($offer[8])/100);
                $grandd=($total)-($disco);
            }
            else
            {
                $disco=0;
                $grandd=$total;
            }
                if($ss[3]<12)
                {
                
                    $u=mysql_query("update cart set qty=$q,total=$total,discount=$disco,grandtotal=$grandd where cartid=$ss[2]");
            
                }
            }
            
            
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]==0)
        {
            $del=mysql_query("delete from cart where cartid=$_REQUEST[id]");
        
            unset($_SESSION[cartche]);
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]!=0)
        {
            $l=mysql_query("select price from cart where cartid=$_REQUEST[id] and productid=$_SESSION[id]");
            $ll=mysql_fetch_array($l);
            
            $z=mysql_query("select storeid from item where productid=$_SESSION[id]");
            $zz=mysql_fetch_array($z);
            
            $of=mysql_query("select * from offer   where storeid=$zz[0] and del=0");
            $off=mysql_fetch_array($of);
            
            
            
            $np=(($ll[0])*($_REQUEST[q]));
            
             if($off[8]!="")
            {
                $dc=ceil(($np)*($off[8])/100);
                $gt=($np)-($dc);
            }
            else
            {
                $dc=0;
                $gt=$np;
            }
            
            $up=mysql_query("update cart set qty=$_REQUEST[q],price=$ll[0],total=$np,discount=$dc,grandtotal=$gt where cartid=$_REQUEST[id]");
        }
    
 
?>
<?php
$nthi=  mysql_query("select * from cart where userid like '$_SESSION[user]' ");
$nathi=  mysql_fetch_array($nthi);
if($nathi[0]=="")
{
  
    ?>
     <?php
              
               $ua=  mysql_query("select * from bill where billid= (select max(billid) from bill where userid like '$_SESSION[user]')");
             $uadd=  mysql_fetch_array($ua);
               ?>
    <font>Last Address : <?php echo $uadd[5];  ?></font>
     
      <img src="images/empty_bag.gif" class="img img-responsive"/> 
<?php
}
?>

     
<?php
$sel = mysql_query("select i.proname,i.productid,i.url,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
while ($ss = mysql_fetch_array($sel)) {
    ?>
                                          
<div class="row" >
    <div class="col-md-12"style="padding: 10px;">
        <div class="col-md-10 text-center" style="background: #232323; border-radius:5px ;">
            <?php 
                $st=mysql_query("select s.storename from store s,item i where s.storeid=i.storeid and i.productid=$ss[1]");
                while ($row = mysql_fetch_array($st)) 
                {
                    
                 
                 ?>
            <font style="color: #fff;text-transform: capitalize;" ><?php echo $row[0];?></font>
        </div>
         <div class="col-md-2">
             <i class="fa fa-trash-o" style="cursor: pointer; " title="click to remove from cart"  onclick="misscart('cart','<?php echo $ss[5]; ?>',0);"></i>
        </div>
    </div>
        
            <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
            <img src="seller/<?php echo $ss[2]; ?>" style="width:100%;"/>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px; padding:5px;">
            
            
                <div class="col-md-12" style="padding:5px;">
                    <font style="font-size:14px; font-weight: 600; color: #232323; text-transform: capitalize; "><?php echo $ss[0]; ?></font>
                </div>
      
                                                
            <div class="col-md-6 col-xs-12 col-sm-12" style="padding:5px;">

                    
                <input type="number" name="qty" class="form-control" id="rs" required="" style="border-radius:5px;" value="<?php echo $ss[6]; ?>" min="1"  max="12" onchange="missprice(this.value,'<?php echo $ss[7]; ?>');misscart('cart','<?php echo $ss[1]; ?>',this.value);"  onkeyup="missprkeyup(this.value,'<?php echo $ss[7]; ?>');" />                              
                    

                                                    
                <div class="col-md-12 col-xs-12 col-sm-12" style="padding:5px;">
                    <i class="fa fa-rupee" ></i>&nbsp;<font  id="misspr">
                <?php $price=($ss[6])*($ss[7]); 
                    echo $price;
                ?></font>&nbsp;/-
                </div>
                
                
                                                    
            </div>

        </div>
           
        
        
    </div>
    <?php
}
}
?>

<div class="col-md-12 text-center " style="padding:5px;">
    <div class="col-md-6 " ></div>
    <div class="col-md-6 " >
        <?php
        if($nathi[0]!="")
        {
            $_SESSION[cartche]=1;
        ?>
        <a href="confirm.php" class="cartbtn">Confirm</a><i class="fa fa-caret-right" style="font-size:30px;vertical-align: middle; margin-left: 2px;color: #f8a631;"></i>
    <?php
        }
    ?>
    </div>
            
         </div>

  <?php
}
  ?>

<!--------------------------------------------------confirm cart display--------------------------------------------------->



<?php
if ($_REQUEST[kona] == "confirmcart") {
    ?>
            <?php
            $sel = mysql_query("select i.proname,i.url,i.dis,i.type,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
            while ($ss = mysql_fetch_array($sel)) {
                ?>

        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
                <img src="seller/<?php echo $ss[1]; ?>" style="width:70%;"/>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px;">

                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="col-md-10">

        <?php echo $ss[0]; ?><br/>
        <?php echo $ss[2]; ?><br/>
        <?php echo $ss[3]; ?>
                    </div>


                </div>

                <div class="col-md-12 col-xs-12 col-sm-12">

                    <div class="col-md-12 col-xs-12 col-sm-12">

        <?php echo $ss[7]; ?>

                    </div>

                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <i class="fa fa-rupee" ></i>&nbsp;<font id="misspr"><?php echo $ss[9]; ?></font>&nbsp;/-
                    </div>



                </div>

            </div>



        </div>

                        <?php
                    }
                    ?>
    <div class="col-md-12 text-right">
        <div class="col-md-6" style="background: #f8a631; "><a href="product.php" ></a></div>
        <div class="col-md-6" style="background: #f8a631;"> <a href="checkout.php" ></a></div>

    </div>

    <div class="col-md-12 " style="padding:5px;">
        <div class="col-md-offset-8 col-md-2" ><i class="fa fa-caret-left" style="font-size:30px;vertical-align: middle; margin-right: 2px; color: #f8a631;"></i><a href="filter.php" class="cartbtn" >Continue Shopping</a></div>
        <div class="col-md-2" >

            <a href="checkout.php" class="cartbtn">Check Out</a><i class="fa fa-caret-right" style="font-size:30px;vertical-align: middle; margin-left: 2px;color: #f8a631;"></i>

        </div>
    </div>



    <?php
}
?>