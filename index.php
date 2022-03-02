<?php
    require_once 'connection.php';
     
    $_SESSION[page]="index";
    
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    
    <?php
        require_once 'head.php'; 
    ?>
    
    <body class="smooth-scroll" onload="avgrate('sratedekho');">
      
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
   
            <section class="ht-section hs-recipes grid">
                <header class="hs-header">
                    <div class="container">
                        <h2 class="heading">Stores Choices</h2>
                        
                    </div>
                </header>
                <div class="hs-content">
                    <div class="container">
                        <div class="row">
                            <div class="isotope-grid" id="grid-1">
                            
                                
                                <?php
                                
                                $get=  mysql_query("select t.typename,d.durationtime,s.statename,c.cityname,a.areaname,ss.* from storetype t,duration d,state s,city c,area a,store ss where t.typeid=ss.typeid and d.durationid=ss.durationid and s.stateid=ss.stateid and c.cityid=ss.cityid and a.areaid=ss.areaid and ss.active=1");
                                while($row=  mysql_fetch_array($get))
                                {
                                
                                ?>
                                
                                
                                <div class="entry col-xs-12 col-sm-4 animated zoomInDown col-xs-4 filter-food filter-pudding">
                                    <div class="entry-inner">
                                        <div class="entry-media">
                                            <img src="seller/<?php echo $row[18]; ?>" alt="" style="width: 100%;height:255px;"/>
                                            <div class="entry-action">
                                                <div class="entry-action-inner">
                                                    <span>
                                                        <a href="product.php?stid=<?php echo $row[8]; ?>#start" >VIEW MENU</a>
                                                    </span>
                                                    <span>
                                                        <a href="restaurantdetail.php?id=<?php echo $row[8]; ?>">MORE DETAIL</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="content-wrapper col-md-12 col-sm-12 col-xs-12 " style="border: 1px dotted #f8a631;">
                                            <h3 class="entry-name" style="text-transform: capitalize;"><a href="product.php?stid=<?php echo $row[8]; ?>"><font style="text-transform: capitalize;"><?php echo $row[9]; ?></font></a></h3>
                                           
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="foo-wrapper">
                                                    <i class="fa fa-map-marker"style="text-transform: capitalize;"></i>&nbsp; <?php echo $row[13]; ?>
                                                </div>
                                               
                                                </div>
                                            </div>
                                                <div class="col-md-12 ">
                                                    
                                                    <div class="row">
                                                        
                                                        <div class="col-md-8">
                                                            
                                                               <?php         
                                    $avs=  mysql_query("select avg(rate) from ratestore where storeid=$row[8]");
                                    $aves=  mysql_fetch_array($avs);
                                   
                                    $favs=floor($aves[0]);
                                    
                                    for($i=1;$i<=5;$i++)
                                    {
                                        if($i<=$favs)
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
                                                        <div class="col-md-4">
                                                            <?php
                                                            $rve=  mysql_query("select count(reviewstoreid) from reviewstore where  status=1 and storeid=$row[8] ");
                                                            $rv=  mysql_fetch_array($rve);
                                                            {
                                                           ?>
                                                            <font>(<?php echo  $rv[0]; ?>)Review</font>
                                                            <?php
                                                            }
                                                            ?>
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
                     
                    </div>
                   

                </div>
              
            </section>
            
                       
<?php $ev=  mysql_query("select s.storename,e.eventname,eb.* from  store s,event e,eventbook eb where s.storeid=eb.storeid and e.eventid=eb.eventid and eb.confirm=0 and eb.userid like '$_SESSION[user]' ");
            $e=  mysql_fetch_array($ev);
    ?>
            <section class="ht-section hs-parallax hs-events parallax" style="background-image: url('images/parallax/1.jpg'); padding-top: 100px;" data-ht-parallax="500">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="hs-content">
                                <h2 class="heading">Events</h2>
                                <div class="entry feature">
                                    <h3 class="entry-name"><?php echo $e[1]; ?></h3>
                                    <font  style="font-size: 14px;">Store Name :</font><p class="meta meta-time" style="text-transform: capitalize;"><?php echo $e[0]; ?></p>
                                    <font  style="font-size: 14px;">Date :</font><p class="meta meta-location" style="text-transform: capitalize;"><?php echo $e[7]; ?></p>
                                     <font  style="font-size: 14px;">Charge :</font><p class="meta meta-location" style="text-transform: capitalize;"><?php echo $e[6]; ?></p>
                                  
                                </div>
                                <p class="foo-heading">OTHER EVENTS</p>
                                <a href="#" class="entry">
                                    <h3 class="entry-name">Dinner</h3>
                                    <p class="meta-time">Saturday, March 26, 2022.</p>
                                </a>
                                
                                <div class="text-right">
                                    <a href="restaurantdetail.php">Arrange Event &rsaquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               
            </section>
         


           
<br/><br/><br/>
            <section class="ht-section hs-parallax hs-gallery" style="background-image: url('images/parallax/1.jpg')">
                <div class="overlay" style="background-color: rgba(0,0,0,.7);"></div>
                <header class="hs-header">
                    <div class="container">
                        <h2 class="heading">OUR GALLERY FROM INSTAGRAM</h2>
                    </div>
                </header>
                <div class="hs-content">
                    <div class="ht-masonry-layout ht-lightbox-gallery container" data-grid-size="20%" data-child="a">
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/1.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/1.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/2.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/2.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 40%">
                            <a href="images/gallery/4.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/4.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/3.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/3.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/5.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/5.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/6.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/6.jpg" alt="">
                        </div>
                        <div class="entry" style="width: 20%">
                            <a href="images/gallery/7.jpg" class="overlay" title="Lorem ipsum dolor sit ames"><i class="fa fa-arrows-alt"></i></a>
                            <img src="images/gallery/7.jpg" alt="">
                        </div>
                       
                    </div>
                    
                </div>
               

                <div style="height: 100px;"></div>

            </section>
           

            <br/>
          

            <?php
            require_once 'footer.php';
            ?>
           
        </div>
            

    </body>

    
</html>