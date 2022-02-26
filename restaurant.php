
<?php
require_once 'conection.php';
$_SESSION[page] = "restaurant";

if(isset($_REQUEST[rev]))
{
    
    if($_REQUEST[review]=="")
    {
        $r=1;
    }
    if($r!=1)
    {
        $r=mysql_query("insert into review values('$_SESSION[user]','$_REQUEST[pid]',0,'$_REQUEST[review]',0)");
       
    }
    
}
$ak=  mysql_query("select * from cart where userid = '$_SESSION[user]'");
$gak=  mysql_fetch_array($ak);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll">

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
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;<font style="font-size:30px;">R</font><b style="color: #F8A631;">ESTAURANT</b>&nbsp; &nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div> 
            


            <script type="text/javascript">
          
        function rv()
        {
            $(".up").css("display","block");
        }
        function rm()
        {
            $(".col-md-3").css("width","25%");
            $(".mask").css("width","");
            $(".content_middle").css("width","");
            $(".content_middle").css("float","");
            $(".img-responsive").css("width","");
            $(".cart").css("display","none");
        }
        function ad()
        {
                $(".col-md-3").css("width","26%");
                $(".mask").css("width","266px");
                $(".content_middle").css("width","925px");
                $(".content_middle").css("float","left");
                $(".img-responsive").css("width","266px");
                $(".cart").css("display","block");       
        }
         
    </script>
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
        <div class="container">
        
            <div class="col-md-12 wow fadeInRight" data-wow-delay="0.4s">
                <div class="educate_grid">
                    <?php
                        $sel=mysql_query("select * from store where active=1");
                        while($sell=mysql_fetch_array($sel))
                        {
                    ?>
            <div class="col-md-6">
                <div class="living_box"><a href="restaurantdetail.php?id=<?php echo $sell[3]; ?>">
			    <img src="seller/<?php echo $sell[27]; ?>" style="width: 500px;height: 220px;"  class="img-responsive " alt=""/>
				<span class="sale-box">
                                    <span class="sale-label">More Info</span>
                                  
                                </span>
                            <img src="seller/<?php echo $sell[13]; ?>" class="img-responsive img-circle" style="height: 171px;width: 171px;margin-top: -120px;border: 3px solid #f8a631;"></img>
				</a>
				<div class="living_desc desc1">
				<h3 style="text-transform: capitalize;font-size: 12px;"><?php echo $sell[4]; ?> , <?php echo $sell[8]; ?></h3>
				
                                <font style="text-transform: capitalize;font-size: 12px;"><?php echo $sell[10]; ?></font>
                                <p style="text-transform: capitalize;font-size: 12px;"><?php echo $sell[11]; ?></p>
                                
				
				<div class="clearfix"></div>
				</div>
                    
			  </div>
                
            </div>
                    <?php
                        }
                    ?>
                    
		    <div class="clearfix"></div>
		   </div>
		 </div>
      </div>
        
            
        </div>
       <br>
   
    
    
    <div style="clear: both;background: #f3f1f2"></div>



            <?php
            require_once 'footer.php';
            ?>
    
            <div class="up" style="display: none;" id="up">
        
        
    </div>

    </div>

    </body>


</html>