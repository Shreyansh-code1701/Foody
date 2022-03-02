<?php
require_once 'connection.php';
$_SESSION[page]='restaurant';

if($_REQUEST[id]!="")
{
    $_SESSION[id]=$_REQUEST[id];
    header("location:restaurantdetail.php");
}


if(isset($_REQUEST[rev]))
{
    
    if($_REQUEST[review]=="")
    {
        $r=1;
    }
    if($r!=1)
    {
        $r=mysql_query("insert into review values('$_SESSION[user]','$_REQUEST[pid]',0,'$_REQUEST[review]',0,0)");
       
    }
    
}
if(isset($_REQUEST[inq]))
{
    
    if($_REQUEST[inquiry]=="")
    {
        $i=1;
    }
    if($i!=1)
    {
        $i=mysql_query("insert into inquery values(0,'$_REQUEST[pid]','$_SESSION[user]','$_REQUEST[contact]','$_REQUEST[email]','$_REQUEST[inquiry]',0)");
    }
    
}
$ak=  mysql_query("select * from cart where userid = '$_SESSION[user]'");
$gak=  mysql_fetch_array($ak);

if (isset($_REQUEST[send])) {
    $date=date('Y-m-d h:i:s');
    $insert = mysql_query("insert into reviewstore values('$_SESSION[user]','$_SESSION[id]',0,'$_REQUEST[revmsg]','$date',0,0)");
}

if(isset($_REQUEST[event]))
{
    mysql_query("insert into eventbook values('$_SESSION[user]',$_SESSION[id],$_SESSION[eventid],0,$_SESSION[eprice],'$_REQUEST[date]','$_REQUEST[message]',0)");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="storepanel('<?php echo $_SESSION[id]; ?>','detail',0);grate('rate',0);" >

        <div>
            
             <div class="eventpage" id="eventbook">
            </div>
        </div>
        
        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            
            
?>
         <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg');">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs- text-center " >
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">R</font><b style="color: #F8A631;">ESTAURANT</b>&nbsp;<font style="font-size:30px;">D</font><b style="color: #F8A631;">ETAIL</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>    
            
    <div class="mainn" style="padding: 20px;margin-top: -13px;background: white">
        <div class="sub1">
            <h2>Food Locker</h2>
        </div>
        <div class="sub2">
            We are a small team of problem solvers, designers, thinkers and tinkers, working around the clock to make StreetFood the most powerful online tool for food delivery in the universe. We believe that ordering food should be easy, fast and definitely fun! We wanted something simpler, so we made it.
        </div>
        <div style="clear: both;">
            
        </div>
    </div>
      <div class="content_middle wow bounceInRight" data-wow-delay="0.4s" style="background: #f3f1f2">
        <div class="container" style="margin-left: 50px;">
        
            <div class="col-md-12 wow fadeInRight" data-wow-delay="0.4s">
                <div class="educate_grid">
            <div class="col-md-12">
                <?php
                    $k=  mysql_query("select * from store where storeid='$_SESSION[id]'");
                    $kk=  mysql_fetch_array($k);
                ?>
                <div class="living_box" style="height: 631px;">
			    <img src="seller/<?php echo $kk[27]; ?>" style="width: 100%;height: 300px;"  class="" alt=""/>
			
                            <img src="seller/<?php echo $kk[13]; ?>" class="img-circle" style="height: 200px;width: 200px;margin-top: -120px;border: 3px solid #f8a631;" alt=""/>
				
                            <div class="living_desc desc1">
                                    <h3 style="text-transform: capitalize"><?php echo $kk[4]; ?><span style="font-size: 15px;"> ( <?php echo $kk[2]; ?> ) </span></h3>
                                    <p style="font-size: 13px;"><?php echo $kk[8]; ?></p>
                                <a href="http://<?php echo $kk[12]; ?>"><p style="font-size: 13px;"><?php echo $kk[12]; ?></p></a>
                                <p style="font-size: 13px;"><?php echo $kk[10]; ?></p>
                                <p style="font-size: 13px;"><?php echo $kk[11]; ?></p>
                                <p id="ratedekho"></p>
				
				<div class="clearfix"></div>
				</div>
                            
                    
			  </div>
                         
            </div>
                    
		    <div class="clearfix"></div>
		   </div>
		 </div>
            
      </div>
        
            
        </div>
       <br/>
       
       <div class="ht-section hs-contributor">
       
       <div class="container">
           
           <div class="row">
               
               
              
                   <div class="hs-content">
                   <div class="main-content">
                       <?php
                       $e=mysql_query("select e.* from event e,storeevent s where s.eventid = e.eventid and s.storeid = $_SESSION[id]");
                       $ee=  mysql_fetch_array($e);
                       ?>
                       <ul class="nav-tab" role="tablist">
                           
                           <li role="presentation" class="active"  onclick="storepanel('<?php echo $_SESSION[id]; ?>','detail',0);">
                               <a href="#hc-tab-articles" aria-controls="hc-tab-articles" role="tab" data-toggle="tab">Detail</a>
                           </li>
                           
                           <li role="presentation"  onclick="storepanel('<?php echo $_SESSION[id]; ?>','review',0);">
                               <a href="#hc-tab-recipes" aria-controls="hc-tab-recipes" role="tab" data-toggle="tab">Review </a>
                           </li>
                           
                           <li role="presentation" onclick="storepanel('<?php echo $_SESSION[id]; ?>','event',0);">
                               <a href="#hc-tab-bookmarks" aria-controls="hc-tab-bookmarks" role="tab" data-toggle="tab">Event</a>
                           </li>
                           
                           <li role="presentation" onclick="storepanel('<?php echo $_SESSION[id]; ?>','brochure',0);">
                               <a href="#hc-tab-bookmarks" aria-controls="hc-tab-bookmarks" role="tab" data-toggle="tab">Brochure</a>
                           </li>
                           
                       </ul>
                       
                       <div class="tab-content">
                           
                           <div role="tabpanel" class="tab-pane fade in active" id="hc-tab-articles">
                           
                               <article class="post post-archive">
                               
                                   <div id="storedetail">
                                       
                                   </div>
                               
                               </article>
                       
                           </div>
                       </div>
                       
                   </div>
                   </div>
                   
               </div>
               
           </div>
           
       </div>
       

        <div class="cart bounceInDown" id="cart" style="margin-top: 733px;">
 <div class="order">
    
    <p>YOUR ORDER</p>
    <?php
       
        $l=  mysql_query("select c.*,i.price,i.proname,o.rate from cart c,item i,offer o where i.offerid=o.offerid and c.productid=i.productid and c.userid='$_SESSION[user]'");
        while($ll=  mysql_fetch_array($l))
        {
            $coun=$coun+$ll[4];
             $cu=$ll[4]-ceil(($ll[4]*$ll[7])/100); 
             $g=$ll[4]-$cu;
             
             $disc=$disc+$g;
             
    ?>      
    <div>
        
        <div class="orderin">
        <table>
           <tr>
            <td>&nbsp;</td>
            <td style="width: 20px;">
                <?php echo $ll[3]; ?>
            </td>
            
            <td style="width: 150px;">
                <?php 
                    
                    echo $ll[6];
                    if($ll[7]!=0)
                    {
               ?>
                <span style=" height: 25px;background: #e94e38;font-size: 10px;border-radius:50px;color:white;padding: 5px;"><?php echo $ll[7];?> % Off</span>
                <?php
                
                    }
                ?>
            </td>
            
            <td colspan="3">
                &#8377;. <?php echo $ll[4]; ?> /-
            </td>
           
        </tr>
    </table>
        </div>
        <div class="cartad">
            <?php
            $cn=  mysql_query("select sum(qty) from cart where userid = '$_SESSION[user]'");
            $acn=  mysql_fetch_array($cn);
            
            ?>
            <font color="red"><i class="fa fa-minus-square" onClick="minuscart('<?php echo $ll[0]; ?>',<?php echo $acn[0]; ?>);" title="Decrease The Quantity"></i></font>
        <font color="green"><i class="fa fa-plus-square" onClick="pluscart('<?php echo $ll[0]; ?>');" title="Increase The Quantity"></i></font>  
    </div>
      
    </div>
    <?php
        }
    ?>
    <br>
    <table class="cartt">
        <tr>
            <td>
                <span>Subtotal : </span>
            </td>
            <td>
                &#8377;. <?php echo $coun ?> /-
            </td>
        </tr>
        <tr>
            <td>
                <span>- Discount : </span> 
            </td>
            <td>
              &#8377;. <?php echo $disc ?> /-
            </td>
        </tr>
        <tr>
            <td>
                <span>Delivery Free  </span>
            </td>
            <td>
                FREE
            </td>
        </tr>
        <tr>
            <td>
                <span>+ 12.5% Service Tax </span>
            </td>
            <td>
                 <?php $ser=ceil(($coun * 12.5)/100);  ?>
                &#8377;. <?php echo $ser ?> /-
            </td>
        </tr>
        <tr>
            <td>
                <span>+ 2.5 % VAT </span>
            </td>
            <td>
                <?php $cu=ceil(($coun*2.5)/100);  ?>
                &#8377;. <?php echo $cu ?> /-
            </td>
        </tr>
              <tr>
            <td>
                <span>Total Amount </span>
            </td>
            <td>
                &#8377;. <?php echo $coun-$disc+$cu+$ser; ?> /-
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div style="float: right;">
                    <a href="checkout.php" class="form-control cbtn">Proceed To Checkout &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
                </div>
            </td>
        </tr>
    </table>
    
        
   
</div>

    </div>

       <div style="clear: both;background: #f3f1f2"></div>
            <?php
            require_once 'footer.php';
            ?>
    
       <div class="up" style="display: none;" id="up">
        
        
    </div>
     <div class="inq" style="display: none;" id="inq">
        
        
    </div>
    <div class="book" style="display: none;" id="book"> 
        
    </div>
      
        </div>

    </body>


</html>