
<?php
require_once 'conection.php';
$str = "";

if(isset($_REQUEST[main]))
{
    
    $str = $str . "mcatid in (";
    
    foreach($_REQUEST[main] as $val)
    {
        $str = $str . $val . ",";
    }
    
    $str = rtrim($str,",");
    $str = $str . ")";
    //echo $str;
}

if(isset($_REQUEST[store]))
{
    
    if($str!="")
    {
        $str = $str . " and ";
    }
    
    $str = $str . "storeid in (";
    
    foreach($_REQUEST[store] as $val)
    {
        $str = $str . $val . ",";
    }
    
    $str = rtrim($str,",");
    $str = $str . ")";
    //echo $str;
}

if(isset($_REQUEST[type]))
{
    
    if($str!="")
    {
        $str = $str . " and ";
    }
    
    $str = $str . "type in (";
    
    foreach($_REQUEST[type] as $val)
    {
        $str = $str . "'" .$val . "',";
    }
    
    $str = rtrim($str,",");
    $str = $str . ")";
    //echo $str;
}

if(isset($_REQUEST[price]))
{
    
    if($str!="")
    {
        $str = $str . " and ";
    }
    
    $str = $str . "(";
    
    foreach($_REQUEST[price] as $val)
    {
        $str = $str . "price " .$val . " or ";
    }
    
    $str = rtrim($str," or ");
    $str = $str . ")";
    //echo $str;
}







if($_REQUEST[kona]=="misssearch")
{
  
    if($_REQUEST[kaya]!="")
    {
        $_SESSION[kaya]=$_REQUEST[kaya];
    }
    if($_REQUEST[ketla]==0)
    {
        $_REQUEST[ketla]=$_REQUEST[pp];
    }
    
    
    if($_SESSION[kaya]=="list")
    {
      
    $s=0;
    $e=$_REQUEST[ketla];
?>

<div class="">
    <div class="isotope-grid" id="grid-2">

        <?php
        
        if($str!="")
        {
          
            $data = mysql_query("select * from item where del=0 and $str order by productid desc");
        }
        else
        {
            $data = mysql_query("select * from item where del=0 order by productid desc limit $s,$e");
            if($_REQUEST[stateid]!="" || $_REQUEST[cityid]!="" || $_REQUEST[areaid]!="" || $_REQUEST[keyword]!="" )
            {
                $data=mysql_query("select i.* from store s,item i,maincategory m where s.storeid=i.storeid and m.mcatid=i.mcatid and s.stateid=$_REQUEST[stateid] and s.cityid=$_REQUEST[cityid] and s.areaid=$_REQUEST[areaid] and (i.proname like '%$_REQUEST[keyword]%' or m.mcatname like '%$_REQUEST[keyword]%' )  and i.del=0");
            }
            if($_REQUEST[stateid]=="" && $_REQUEST[cityid]=="" && $_REQUEST[areaid]=="" && $_REQUEST[keyword] != "")
            {
                $data=mysql_query("select i.* from store s,item i,maincategory m where s.storeid=i.storeid and m.mcatid=i.mcatid  and (i.proname like '%$_REQUEST[keyword]%' or m.mcatname like '%$_REQUEST[keyword]%' )  and i.del=0");
            }
        }
        
       
        while ($row = mysql_fetch_array($data))
        {
            $get = mysql_query("select m.mcatname,mm.storename from item p,maincategory m,store mm where m.mcatid=p.mcatid and mm.storeid=p.storeid and p.productid=$row[2]");
            $row1 = mysql_fetch_array($get);
            ?>

            <div class="entry col-xs-12 col-sm-3 col-md-4 filter-food filter-pudding animated zoomInDown">
                <div class="entry-inner">
                    <div class="entry-media">
                        <img src="seller/<?php echo $row[7]; ?>" alt="" class="img img-responsive" style="height:164px; width: 100%;" />
                        <div class="entry-action">
                            <div class="entry-action-inner">
                                <span>
                                    <a href="productdetail.php?proid=<?php echo $row[2]; ?>"   style="text-transform:uppercase; font-size: 13px; "  >Store : <?php echo $row1[1]; ?></a>
                                </span>
                                <span>
                                    <a   href="productdetail.php?proid=<?php echo $row[2]; ?>"  style="text-transform:uppercase; font-size: 13px">Cuisine : <?php echo $row1[0]; ?></a>
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
                                        <font style="color: #fff; font-size: 13px;cursor: pointer;"> <i class="fa fa-heart-o animated flash" style="color: #eee; font-size: 20px;"></i>&nbsp;Like</font>
                                        <?php
                                    } else {
                                        if ($f == 2) {
                                            ?>
                                            <font style="color: #fff; font-size: 13px;cursor: pointer;"  onclick="like('like<?php echo $row[2]; ?>','<?php echo $row[2] ?>');"> <i class="fa fa-heart animated flash" style="color: #eee; font-size: 20px;"></i>&nbsp;<?php echo $a[0]; ?> Like</font>
                                            <?php
                                        } else {
                                            ?>
                                            <font style="color: #fff; font-size: 13px;cursor: pointer;" onclick="like('like<?php echo $row[2]; ?>','<?php echo $row[2] ?>');"> <i class="fa fa-heart-o animated flash" style="color: #eee; font-size: 20px;"></i>&nbsp;<?php echo $a[0]; ?> Like</font>
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

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <font class="" style="font-size: 17px; color: #232323; font-weight: 600; line-height:1px; text-transform: capitalize;"><?php echo $row[3]; ?></font>
                        </div>
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

                                    <a href="product.php" onclick="misscart('cart',<?php echo $row[2]; ?>,1);" class="btn sendbtn" >Add &nbsp;<i class="fa fa-plus"></i></a>

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
    }
    else
    {
        
       
        
        ?>
        
  <div class="" style="margin-top: -3%;">
    <div class=" isotope-grid" id="grid-2">
       
        

<?php
        $s=0;
    $e=$_REQUEST[ketla];
        
        if($str!="")
        {
            $data = mysql_query("select * from item where del=0 and $str order by productid desc");
        }
        else
        {
            $data = mysql_query("select * from item where del=0 order by productid desc  limit $s,$e ");
            
        }
        
        while ($row = mysql_fetch_array($data))
        {
            $get = mysql_query("select m.mcatname,mm.storename from item p,maincategory m,store mm where m.mcatid=p.mcatid and mm.storeid=p.storeid and p.productid=$row[2]");
            $row1 = mysql_fetch_array($get);
                                    
?>
        <div class="col-md-12" style="margin: 0;">
    <div class="col-xs-12 col-sm-3 col-md-12 productdetail animated fadeInLeft">

        <div class="row" style="margin: 0;">
                        <div class="col-md-3" style="margin-top: 2%;">
                <img src="seller/<?php echo $row[7]; ?>" alt="" class="img img-responsive  " style="height: 160px;width: 100%;border-radius:5px;" />
               
            </div>
            
            <div class="col-md-9" style="margin-top: 2%;">
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row[3]; ?> 
                                               
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                Cuisine &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row1[0]; ?> 
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $row[5]; ?> /- 
                                                
                                            </div>
                                            
                                        </div>
                                        
                                         <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                Description : <?php echo $row[6]; ?> 
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                
                                                        <a href="product.php" onclick="misscart('cart',<?php echo $row[2]; ?>,1);" class="ht-button view-more-button">
                                                                <i class="fa fa-plus"></i> ADD <i class="fa fa-arrow-right"></i>
                                                            </a>
                                                                                                           
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

                           
                            </div>
        
        
        
        <?php
    }
        
        
            $i=  mysql_query("select count(productid) from item");
            $ii=  mysql_fetch_array($i);
            if($_REQUEST[ketla]<=$ii[0] && $str=="")
            {
        ?>

    <div class="col-md-12 text-center">
        <p class="ht-button view-more-button" style="cursor: pointer;" onclick="misssearch('misssearch','<?php echo $_REQUEST[ketla]+$_REQUEST[pp]; ?>','<?php echo $_SESSION[kaya]; ?>')">
                  <i class="fa fa-arrow-left"></i> VIEW MORE CUISINE <i class="fa fa-arrow-right"></i>
        </p>
    </div>
        
        <?php
        } 
        ?>

    </div>
</div>



<?php
}
?>