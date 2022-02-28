<?php
require_once 'conection.php';

unset ($_SESSION[offrate]);

if($_SESSION[user]=="")
{
    header("location:registration.php");
}

if ($_REQUEST[proid] != "") {
    $_SESSION[proid] = $_REQUEST[proid];
    header("location:productdetail.php");
}

$sel = mysql_query("select * from item where del=0 and productid=$_SESSION[proid]");
$sell = mysql_fetch_array($sel);

if (isset($_REQUEST[sendreview])) {
    $date = date('Y-m-d h:i:s');
    $insert = mysql_query("insert into reviewproduct values('$_SESSION[user]','$_SESSION[proid]',0,'$_REQUEST[revmsg]','$date',0,0)");
}

$ch=  mysql_query("select * from wishlist where userid like '$_SESSION[user]' and productid=$_SESSION[proid]");
$chh=  mysql_fetch_array($ch);
if($chh[0]!="")
{
    $bharelo=1;
}

if(isset($_REQUEST[sendwish]))
{
    if($bharelo!=1)
    {
        mysql_query("insert into wishlist values('$_SESSION[user]',$_SESSION[proid],0)");
}
}

$ch=  mysql_query("select * from wishlist where userid like '$_SESSION[user]' and productid=$_SESSION[proid]");
$chh=  mysql_fetch_array($ch);
if($chh[0]!="")
{
    $bharelo=1;
}


if(isset ($_REQUEST[inquiry]))
{
    $inq=mysql_query("insert into inquiry values($sell[1],$_SESSION[proid],0,'$_REQUEST[name]','$_REQUEST[contact]','$_REQUEST[email]','$_REQUEST[message]',0)");
}

if(isset($_REQUEST[addcart]))
{
    $q=$_REQUEST[qty];
    
    header("location:product.php?cid=$_SESSION[proid]&qty=$q");
}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="prate('productrate',0);avgrate('pratedekho');avgrate('sratedekho');">

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
                        <font style="font-size:30px;">Product Detail</font>
                        </div> 

                    </div>
                </div>
            </div>


            <div class="container " ><BR></br>
                <?php
                $prodel = mysql_query("select m.mcatname,s.storename,s.address,ss.statename,c.cityname,a.areaname,i.* from maincategory m,store s,state ss,city c,area a,item i where m.mcatid=i.mcatid and s.storeid=i.storeid and ss.stateid=c.stateid and c.cityid=a.cityid and ss.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and i.productid=$_SESSION[proid]");
                $prodel1 = mysql_fetch_array($prodel);
                ?>

                <div class="row">


                    <div class="col-md-3">
                        <div class="row ht-widget hw-popular-categories" >
                            <font class="sitemapline">Food Information</font>
                        </div>

                        <div class="row">

                            <div class="col-md-12  ">

                                <div class="detailhead">
                                    <label class="mylbm ffont">Food Name  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div>
                                <div class="detaildekho fffont">
                                    <?php echo $prodel1[9]; ?>
                                </div>

                                <div class="detailhead">
                                    <label class="mylbm ffont" > Cuisine  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho fffont">
                                    <?php echo $prodel1[0]; ?>
                                </div>

                                <div class="detailhead">
                                    <label class="mylbm ffont">Food Type  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho">
                                    <?php echo $prodel1[10]; ?>
                                </div>

                                <div class="detailhead">
                                    <label class="mylbm ffont">Price  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho">
                                    <i class="fa fa-rupee"></i>&nbsp;&nbsp;<?php echo $prodel1[11]; ?>&nbsp;/-
                                </div> 

                                <div class="detailhead">
                                    <label class="mylbm fffont">Discription  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho">
                                    <?php echo $prodel1[12]; ?>
                                </div>

                                <div class="detailhead">
                                    <label class="mylbm ffont">Offer   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho fffont">
                                    
                                         <?php 
                                    $of=  mysql_query("select * from offer where del=0 and storeid=$prodel1[7]");
                                    $off=  mysql_fetch_array($of);
                                   
                                    if($off[2]!="")
                                    {
                                        if(($off[6] <= $prodel1[price] && $off[7] >= $prodel1[price]) || ($off[6] == 0 && $off[7] == 0))
                                        {
                                            $_SESSION[offrate]=$off[8];
                                            $_SESSION[offname]=$off[3];
                                        }
                                        
                                    }
                                    
                                   if($_SESSION[offrate]!="")
                                   {
                                       
                                        if($off[6]==0  && $off[7]==0 && $off[4]!="0000-00-00" && $off[5]!="0000-00-00")
                                        {

                                            $offer="date";

                                        }
                                       else if($off[6]!=0 && $off[7]!=0 && $off[4]=="0000-00-00" && $off[5]=="0000-00-00")
                                       {

                                           $offer="price";

                                       }
                                       else
                                       {

                                           $offer="banne";

                                       }
                                      if( $offer=="date")
                                      {

                                          echo "<font class='animated flash infinite'>".$off[3]."( " .$off[8]." % off )</font><br/> from".$off[4]." To ".$off[5];

                                      }
                                      else if($offer=="price")
                                      {

                                          echo "<font class='animated flash infinite'>".$off[3]."( " .$off[8]." % off )</font><br/> upto ".$off[6]." To ".$off[7];

                                      }
                                      else 
                                      {

                                          echo "<font class='animated flash infinite'>".$off[3]."( " .$off[8]." % off )</font><br/>from ".$off[4]." To ".$off[5]."<br/> Upto ".$off[6]." To ".$off[7];

                                      }
                                      
                                  }
                                  else
                                  {
                              
                                    ?>
                                    
                                    <i class="fa fa-frown-o"></i>&nbsp;&nbsp; Offer Not Available
                                    
                                  <?php
                                  
                                  }
                                  ?>
                                </div>

                                <div class="detailhead">
                                    <label class="mylbm ffont">Average Rating  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho fffont">
                                    <div id="avgpratedekho">
                                        
                                    </div>
                                    
                                </div> 


                            </div>



                        </div>

                    </div>



                    <div class="col-md-6">
                        <div class="row ht-widget hw-popular-categories" >
                            <font class="sitemapline">Food Image</font>

                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="row">


                                    <div class="col-md-12">
                                        <img src="seller/<?php echo $prodel1[13]; ?>"  class="img img-responsive animated tada pulse"/>
                                    </div>


                                </div>

                            </div>          
                        </div>

                        <form action="" method="post" name="formqty" class=" maru" >
                            <div class="col-md-12">

                                <div class=" col-md-5 form-group  ">
                                    <div class="detailhead">
                                        <label class="mylbm ffont">Food QTY  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont">

                                        <div class=" input-group" style="margin-bottom: 3%;">
                                            <input type="number" name="qty" class="form-control" id="rs" required="" value="1" min="1"  max="12"  onchange="missprice(this.value,'<?php echo $prodel1[11]; ?>');" onkeyup="missprkeyup(this.value,'<?php echo $prodel1[11]; ?>');" />                              
                                            <div class="input-group-addon regi">
                                                <i class="fa fa-user-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="detailhead">
                                        <label class="mylbm ffont">QTY  Price &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 

                                    <div class="detaildekho">
                                        <i class="fa fa-rupee"></i>&nbsp;&nbsp; <font  id="misspr" style="font-size: 14px"><?php echo $prodel1[11]; ?></font>&nbsp;/-
                                    </div> 
                                </div>

                            </div>

                            <div class="col-md-5">
                                <div class="detailhead">
                                    <label class="mylbm ffont">Add Food  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho col-md-12">
                                    <p class="text-center">
                                        <button  type="submit" name="addcart" class="ht-button view-more-button" >
                                            <i class="fa fa-arrow-left"></i>Add Food<i class="fa fa-arrow-right"></i>
                                        </button>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                 <div class="detailhead">
                                    <label class="mylbm ffont">Inquiry  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                <div class="detaildekho col-md-12">
                                    <p class="text-center">
                                        <a onclick="inquery('open');" id="showlogin" class="ht-button view-more-button" style="cursor: pointer;" >
                                            <i class="fa fa-arrow-left"></i>Click To Inquiry<i class="fa fa-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                             <div class="row">
                                    <div class="col-md-10">
                                    <div class="detailhead">
                                    <label class="mylbm ffont">Coupon Discount For You  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                </div> 
                                        <p>
                                            coupon offer is available for only those people who's total amount of purchase from site is more than <i class="fa fa-rupee"></i>2000 /-
                                        </p><br/>
                                        <?php
                                        if($_SESSION[user]!="")
                                        {
                                            $tot=  mysql_query("select sum(finalamount) from bill where userid like '$_SESSION[user]' ");
                                            $t=  mysql_fetch_array($tot);
                                            echo $_SESSION[user].",Your purchase amount is :&#8377;".$t[0]."/-";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                        <br/><br/>
                                        <?php
                                        if($t[0]>2000)
                                        {
                                        ?>
                                          <input type="radio" id="code" style=" margin-left: 167px;margin-top: 35px;cursor: pointer;" onchange="fillcode('fillcode');"/> 
                                        <img src="images/discount.png" width="50%" style=""  class="img img-responsive" />
                                  <div id="fillcode">
                                            
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            
                        </form>
                        
                        <div class=" loginpage" id="inquery">
                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 loginkule">
                    <div class="inquiryweb row">
                        <font style="color:#333;font-weight: 600;font-size: 16px;" >Inquiry</font>
                        &nbsp;&nbsp;&nbsp;
  
                        <i class="fa fa-times" onclick="inquery('close')"></i>
                    </div>
                    <div class="row"  style="background: #fff;border-bottom: 10px solid #f8a631;">
                        
                        <form action="" method="post" name="inquiry" class="maru">

                            <div class="col-md-offset-1 col-md-10" style="margin-top:   5%;margin-bottom: 5%;">   
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="name" placeholder="Enter Name"  autofocus="" required=""  pattern='^[a-zA-Z0-9@_-. ]+$'    class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user-plus    "></i></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="contact" placeholder="Enter Contact" maxlength="10"  required=""  pattern='^[0-9]+$'    class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-lightbulb-o" style="padding:0px 4.5px 0px 4.5px;;"></i>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="email" name="email" placeholder="Enter Email"  required=""   class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-lightbulb-o" style="padding:0px 4.5px 0px 4.5px;;"></i>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <textarea type="text" row="4" name="message" placeholder="Enter Message" required=""   class="form-control " ></textarea> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-lightbulb-o" style="padding:0px 4.5px 0px 4.5px;;"></i>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12 text-center"    input-group text-center">
                                     <button type="submit" name="inquiry" title="Send" class="btn inquirybtn">Send &nbsp;&nbsp;<i class="fa fa-rocket" ></i></button>&nbsp;&nbsp;
                                    <button type="reset" title="clear" name="clear"class="btn inquirybtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o" ></i></button>
                                </div>
                                
                            </div>

                        </form>
                   
                        
                        
                        
                    </div>
                        
                </div>
            </div>
                                        

                    </div>


                    <div class="col-md-3">

                        <div class="col-md-12">
                            <div class="row ht-widget hw-popular-categories" >
                                <font class="sitemapline">Store Information</font>
                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="detailhead">
                                        <label class="mylbm ffont">Store Name  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div>
                                    <div class="detaildekho fffont">
                                        <?php echo $prodel1[1]; ?>
                                    </div>

                                    <div class="detailhead">
                                        <label class="mylbm ffont">Address  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont">
                                        <?php echo $prodel1[2]; ?>
                                    </div>

                                    <div class="detailhead">
                                        <label class="mylbm ffont">State  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho ffont">
                                        <?php echo $prodel1[3]; ?>
                                    </div>

                                    <div class="detailhead">
                                        <label class="mylbm ffont">City  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont">
                                        <?php echo $prodel1[4]; ?>
                                    </div>

                                    <div class="detailhead">
                                        <label class="mylbm ffont">Area   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont">
                                        <?php echo $prodel1[5]; ?>
                                    </div>



                                    <div class="detailhead">
                                        <label class="mylbm ffont"> Average Rating   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont">
                                        <div id="avgsratedekho">
                                            
                                        </div>
                                    </div>


                                    <div class="detailhead">
                                        <label class="mylbm ffont">More  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                                    </div> 
                                    <div class="detaildekho fffont"> 
                                        <p class="text-center">
                                            <a href="restaurantdetail.php?id=<?php echo $prodel1[7]; ?>"  class="ht-button view-more-button">
                                                <i class="fa fa-arrow-left"></i>More<i class="fa fa-arrow-right"></i>
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #eee; padding: 5px 10px 5px 10px; margin-top:20px;">

                        <div class="col-md-4">
                            <div class="detailhead">
                                <label class="mylbm">Give Review For <?php echo $prodel1[9]; ?>   &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                            </div> 
                            <div class="col-md-12" style="padding-top:10px">
                                <form  action="" method="post" name="contact" class="form-group maru"  >
                                    <div class=" input-group" style="margin-bottom: 3%;">
                                        <?php
                                        if ($_SESSION[user] == "") {
                                            ?>
                                            <input type="text" name="revmsg" placeholder="Review For <?php echo $prodel1[9]; ?>" disabled="" title="give review after login" style="padding: 20px;" required=""  class="form-control "  />
                                            <?php
                                        } else {
                                            ?>
                                            <input type="text" name="revmsg" placeholder="Review For <?php echo $prodel1[9]; ?>"  style="padding: 20px;" required=""  class="form-control "  />


                                            <?php
                                        }
                                        ?>
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    </div>


                                    <div class="co-md-12 text-center" >
                                        <button type="submit" name="sendreview" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                        <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                    </div>
                                    </br>

                                </form>
                            </div>


                        </div>

                        <div class="col-md-3">
                            <div class="detailhead">
                                <label class="mylbm ffont">Rating For <?php echo $prodel1[9]; ?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                            </div> 
                            <div class="detaildekho">

                                <div id="pratedekho">

                                </div>

                            </div> 
                        </div>

                        <div class="col-md-5">
                            <div class="detailhead">
                                <label class="mylbm ffont">Display Review For <?php echo $prodel1[9]; ?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i></label>
                            </div> 
                            <table class="table table-responsive">

<?php
$info1 = mysql_query("select count(*) from user r,reviewproduct rw where r.userid=rw.userid and rw.productid=$_SESSION[proid] and rw.active=1");
$infodata1 = mysql_fetch_array($info1);

if ($infodata1[0] >= 5) {
    $s = $infodata1[0] - 5;
} else {
    $s = 0;
}

$info = mysql_query("select r.username,r.url,rw.* from user r,reviewproduct rw where r.userid=rw.userid and rw.productid=$_SESSION[proid] and rw.active=1 limit $s,5");
while ($infodata = mysql_fetch_array($info)) {
    ?>

                                    <tr>
                                        <td style="color:#f8a631;width:40%;">
                                    <?php
                                    echo $infodata[0];
                                    ?>
                                            </br>
                                            </br>
                                            <img src="<?php echo $infodata[1]; ?>" style="width: 70px;height: 70px;border-radius:100%;" class="img-responsive"/>
                                        </td>

                                        <td>
                                            Post : <?php echo $infodata[6]; ?>
                                            </br>
                                            </br>
                                            Review : </br><?php echo $infodata[5]; ?>
                                        </td>
                                    </tr>

    <?php
}
?>

                            </table>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="container">

                    <div class="row ht-widget hw-popular-categories" >
                        <font class="sitemapline">Related Product</font>
                       
                    </div>
                    <div class="row">
                         <?php
                         $rt=mysql_query ("select * from item where mcatid=$sell[0]");
                        while ($rtt= mysql_fetch_array($rt))
                        {
                            ?>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a  href="productdetail.php?proid=<?php echo $rtt[2]; ?>" ><img src="seller/<?php echo $rtt[7]; ?>" class="img img-responsive img-circle" style="width: 140px;height: 140px; border-radius:100px;" /></a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>


                </div>


            </div><br>





<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>