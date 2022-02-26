<?php
    require_once 'conection.php';

    if($_REQUEST[stid]!="")
    {
        $_SESSION[stid]=$_REQUEST[stid];
        header("location:product.php");
    }
    
    if($_REQUEST[cid]!="")
    {
        $_SESSION[cid]=$_REQUEST[cid];
        $_SESSION[qty]=$_REQUEST[qty];
        
        $price=mysql_query("select price from item where productid=$_SESSION[cid]");
        $pricee=mysql_fetch_array($price);
        
         $of=  mysql_query("select * from offer where del=0");
        $off=  mysql_fetch_array($of);
        if($off[2]!="")
        {
            $_SESSION[offrate]=$off[8];
             $_SESSION[offname]=$off[3];
        }
        
        $tot=(($_SESSION[qty])*($pricee[0]));
        $dis=ceil(($tot*$_SESSION[offrate])/(100)); 
        $grand=$tot-$dis;
        
        $z=mysql_query(("select * from cart where productid=$_SESSION[cid] and userid like '$_SESSION[user]'"));
        $zz=mysql_fetch_array($z);
        
        if($zz[1]=="")
        {
             $in=mysql_query("insert into cart values('$_SESSION[user]',$_SESSION[cid],0,$_SESSION[qty],$pricee[0],$tot,$dis,$grand)");
        }
        else
        {
            $_SESSION[ch]=1;
        }
        
     
        header("location:product.php");
    }
    
  
    
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
require_once 'head.php';
?>

    <body class="smooth-scroll" onload="avgrate('ratedekho');misscart('cart',0,0);">

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

            <?php
            require_once 'slider.php';
            ?>


            <section class="ht-section hs-recipes grid" id="start">
                <header class="hs-header">
                    <div class="container">
                        <h2 class="heading">Recent recipes</h2>
                      
                    </div>
<!--                    <ul class="isotope-filter" data-target="#grid-2">
                        <li class="is-filtered"><a href="#" data-filter="*">ALL</a></li>
                        <li><a href="#" data-filter=".filter-food">FOODS</a></li>
                        <li><a href="#" data-filter=".filter-beverages">BEVERAGES</a></li>
                        <li><a href="#" data-filter=".filter-dessert">DESSERTS</a></li>
                        <li><a href="#" data-filter=".filter-pudding">PUDDING</a></li>
                    </ul>-->
                </header>
 
                <div class="hs-content">
                    <div class="container" >
                        <div class="row">
                            <div class="col-md-9">
                           

                                <?php
$data = mysql_query("select * from item where del=0 and storeid=$_SESSION[stid] order by productid desc");
while ($row = mysql_fetch_array($data)) {
    $get = mysql_query("select m.mcatname,mm.storename from item p,maincategory m,store mm where m.mcatid=p.mcatid and mm.storeid=p.storeid and p.productid=$row[2] and p.storeid=$_SESSION[stid] ");
    $row1 = mysql_fetch_array($get);
    ?>

                                <div class="entry col-xs-12 col-sm-3 animated zoomInDown col-md-4 filter-food filter-pudding" >
        <div class="entry-inner">
            <div class="entry-media">
                <img src="seller/<?php echo $row[7]; ?>" alt="" class="img img-responsive  " style="height:164px; width: 100%;" />
                <div class="entry-action">
                    <div class="entry-action-inner">
                        <span>
                            <a href="productdetail.php?proid=<?php echo $row[2]; ?>"   style="text-transform:uppercase; font-size: 13px; "  >Store : <?php echo $row1[1]; ?></a>
                        </span>
                        <span>
                            <a  href="productdetail.php?proid=<?php echo $row[2]; ?>"  style="text-transform:uppercase; font-size: 13px">Cuisine : <?php echo $row1[0]; ?></a>
                        </span>
                        <?php
                        $i = mysql_query("select * from likee where userid like '$_SESSION[user]' and productid = $row[2]");
                        $gi = mysql_fetch_array($i);
                        $f = 0;
                        if ($gi[0] == "") {
                            $f = 1;
                        } else {
                            $f = 2;
                        }
                        $in = mysql_query("select count(*) from likee where productid = $row[2]");
                        $a = mysql_fetch_array($in);
                        ?>
                        <span id="like<?php echo $row[2]; ?>">
                        <?php
                        if ($_SESSION[user] == "") {
                            ?>
                                <font style=" color: #fff; font-size: 13px;cursor: pointer;"> <i class="fa fa-heart-o animated flash" style="color:#fff; font-size: 20px;"></i>&nbsp;Like</font>
                                <?php
                            } else {
                                if ($f == 2) {
                                    ?>
                                    <font style=" color: #fff; font-size: 13px;cursor: pointer;"  onclick="like('like<?php echo $row[2]; ?>','<?php echo $row[2] ?>');"> <i class="fa fa-heart animated zoomIn" style="color: red; font-size: 22px; "></i>&nbsp;<?php echo $a[0]; ?> Like's</font>
                                    <?php
                                } else {
                                    ?>
                                    <font style=" color: #fff; font-size: 13px;cursor: pointer;" onclick="like('like<?php echo $row[2]; ?>','<?php echo $row[2] ?>');"> <i class="fa fa-heart-o animated zoomIn" style="color:#fff; font-size: 20px;"></i>&nbsp;<?php echo $a[0]; ?> Like</font>
                                    <?php
                                }
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <div >

            </div>
            <div class="content-wrapper col-md-12 col-sm-12 col-xs-12 " style="border: 1px dotted #f8a631;">
                
                <a href="productdetail.php?proid=<?php echo $row[2]; ?>">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <font class="" style="font-size: 17px; color: #232323; font-weight: 600; line-height:1px; text-transform: capitalize;"><?php echo $row[3]; ?></font>
                </div>
                    </a>    
                <div class="col-md-6 col-sm-6 col-xs-6">

    <?php
    if ($row[4] == "veg") {
        ?>
                        <a href="productdetail.php?proid=<?php echo $row[2]; ?>"><font class="" style="font-size: 13px ;color:#1fb0ab; line-height:1px; text-transform: capitalize;"><i class="fa fa-dot-circle-o" style="color:green;"></i>&nbsp;<?php echo $row[4]; ?></font></a>
                        <?php
                    } else {
                        ?>
                        <a href="productdetail.php?proid=<?php echo $row[2]; ?>"><font class="" style="font-size: 13px ;color:#1fb0ab; line-height:1px; text-transform: capitalize;"><i class="fa fa-dot-circle-o" style="color:red;"></i>&nbsp;<?php echo $row[4]; ?></font></a>
                        <?php
                    }
                    ?>


                </div>

                <div class=" col-md-6 col-sm-6 col-xs-6">
                    <a href="productdetail.php?proid=<?php echo $row[2]; ?>"><font class="" style="font-size: 13px ;color:#1fb0ab; line-height:1px; text-transform: capitalize;"><i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $row[5]; ?>&nbsp;/-</font></a>
                </div>


                <div class="col-md-6 col-sm-6 col-xs-6">
                        <?php $rve=  mysql_query("select count(reviewid) from reviewproduct where active=1 and productid=$row[2]");
                        $rv=  mysql_fetch_array($rve);
                        {?>
                    <a href="productdetail.php?proid=<?php echo $row[2]; ?>"><font class="" style="font-size: 13px ;color:#1fb0ab; line-height:1px;"><?php echo $rv[0]; ?> Review</font></a>
                            <?php
                        }
                        ?>
                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <?php
                         $av=  mysql_query("select avg(rate) from rateproduct where productid=$row[2]");
                                    $ave=  mysql_fetch_array($av);
                                    
                                    $fav=floor($ave[0]);
                                    
                                    for($i=1;$i<=5;$i++)
                                    {
                                        if($i<=$fav)
                                        {
                                    
                                    ?>
                                    
                                    <i  style="color:#f8a631;" class="fa fa-star" id="<?php echo $i; ?>"></i>
                                    
                                    <?php
                                        }
                                        else
                                        {
                                     ?>
                                    
                                     <i  style="color:#f8a631;" class="fa fa-star-o" id="<?php echo $i; ?>"></i>
                                    <?php
                                        }
                                    }
                    ?>
                </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">

                           <button class="btn sendbtn" onclick="misscart('cart',<?php echo $row[2]; ?>,1);" >Add &nbsp;<i class="fa fa-plus"></i></button>

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <a href="productdetail.php?proid=<?php echo $row[2]; ?>"><button class="btn sendbtn" >Info &nbsp;<i class="fa fa-info"></i></button></a>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
}
?>



                           
                            </div>
                            
                            
                            <div class="col-md-3 col-xs-12 col-sm-12 cartpro " >
                                
                                <div class="row" >
                                    <div class="col-md-12 cartt" >
                                        &nbsp; &nbsp;<i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;
                                        <strong style="color: #232323;">Y</strong>our <strong style="color: #232323;">O</strong>rder
                                    </div>
                                    <div id="misscartdata"  style="padding: 30px;">
                                    
                                    <form action="" method="post" name="qtyform">
                                        
                                    </form>
                                    
                                </div>
                                    
                                </div>
                               
                                
                                
                                
                                </div>
                                
                            </div>
                            
                            
                        </div>

                     
                    </div>

     </section>
                </div>
                
                

       


        

<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>