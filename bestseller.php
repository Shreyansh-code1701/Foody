<?php
    require_once 'conection.php';
    $_SESSION[page]="bestseller";
    
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
         <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg')">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs-12 " style="margin-bottom: 3%;">
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">B</font><b style="color: #F8A631;">EST</b>&nbsp; <font style="font-size:30px;">S</font><b style="color:#F8A631;">ELLER</b>&nbsp;&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>
            
            
            <section class="ht-section hs-recipes grid">
                <header class="hs-header">
                    <div class="container">
                        <h2 class="heading">Stores' Choices</h2>
                        
                    </div>
                </header>
                <div class="hs-content">
                    <div class="container">
                        <div class="row">
                            <div class="isotope-grid" id="grid-1">
                            
                                
                                <?php
                                
                                $get=  mysql_query("select t.typename,d.durationtime,s.statename,c.cityname,a.areaname,ss.* from storetype t,duration d,state s,city c,area a,store ss where t.typeid=ss.typeid and d.durationid=ss.durationid and s.stateid=ss.stateid and c.cityid=ss.cityid and a.areaid=ss.areaid and ss.active=1 limit 0,3");
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
            
            
<br/><br/>

            <?php
            require_once 'footer.php';
            ?>
           
        </div>
            

    </body>

    
</html>