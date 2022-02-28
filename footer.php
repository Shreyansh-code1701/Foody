    <?php
    require_once 'conection.php';
    $er=0;
    $ers=1;
    if(isset ($_REQUEST[send]))
    {
        $se=mysql_query("select * from subscriber where email like '$_REQUEST[email]'");
        $ge=mysql_fetch_array($se);
        
        if($ge[0]=="")
        {
            $in=mysql_query("insert into subscriber values(0,'$_REQUEST[email]')");
            $ers=0;
            
        }
            else
            {
                $er=1;
            }
        
        
    }
?>
<div class="myline"></div>
<section class="ht-section hs-footer-widget">
                <h2 class="sr-only">Realty footer</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="ht-widget hw-popular-recipes">
                                <h3 class="widget-title" style="font-size: 15px;">RECENT FOOD</h3>
                                <?php
                                $rcc=  mysql_query("SELECT * FROM item i order by productid desc LIMIT 0,4");
                                while ($rc = mysql_fetch_array($rcc)) 
                                    {
                                  
                                   
                                    
                                ?>
                                <article class="post">
                                    <a href="productdetail.php?proid=<?php echo $rc[2];  ?>">
                                        <div class="media">
                                            <img src="seller/<?php echo $rc[7]; ?>" style="height:55px;width: 100%;" class="img img-responsive" alt="" />
                                        </div>
                                        <div class="content">
                                            <font style="text-transform: capitalize;"><?php echo $rc[3]; ?></font>
                                            <div class="meta-rate" >
                                                 <?php
                         $av=  mysql_query("select avg(rate) from rateproduct where productid=$rc[2]");
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
                                        </div>
                                    </a>
                                </article>
                               <?php
                                    
                                    }
                               ?>
                              
                              
                               
                              
                                
                               
                            </div>
                          
                        </div>
                      
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <div class="ht-widget hw-popular-categories">
                                <h3 class="widget-title" style="font-size: 15px;">POPULAR CUISINE</h3>
                                <ul>
                                    <?php $cuu=mysql_query("select m.mcatid,m.mcatname,count(m.mcatid) from transaction t,item i,maincategory m where i.productid=t.productid and m.mcatid=i.mcatid and i.del=0 group by m.mcatid order by count(m.mcatid)  desc limit 0,6 ");
 while ($cu=  mysql_fetch_array($cuu))
 {
                                                
                                    ?>
                                    <li style="text-transform: capitalize;cursor: pointer;"><a ><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;<?php echo $cu[1]; ?></a></li>
                                 <?php
 }
                                 ?>
                                </ul>
                            </div>
                          
                        </div>
                      
                        <div class="col-xs-12 col-sm-3">
                            <div class="ht-widget hw-posts">
                                <h3 class="widget-title" style="font-size: 15px;">FEEDBACK CONTAINT</h3>
                                <?php
                                $fdd=  mysql_query("SELECT * FROM feedback order by feedbackid desc LIMIT 0,5");
                                while ($fd = mysql_fetch_array($fdd)) 
                                    {
                                ?>
                                <article class="post">
                                    <font style="text-transform: capitalize;"><a href="feedback.php" ><?php echo $fd[4]; ?></a></font>
                                    <div class="meta">
                                        <span style="text-transform: capitalize;"><?php echo $fd[2]; ?></span> <span style="text-transform: capitalize;" ><?php echo $fd[3]; ?></span>
                                    </div>
                                </article>
                                <?php
                                    }
                                ?>
                            </div>
                           
                        </div>
                        
                        <div class=" col-md-3 col-xs-12 col-sm-12">
                            <div class="ht-widget hw-popular-categories">
                                <h3 class="widget-title" style="font-size: 15px;">HELP &</h3>
                                 <ul>
                                    <li><a href="faq.php"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;FAQ</a></li>
                                    <li><a href="contact.php"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Contact</a></li>
                                </ul>
                            </div>
                            <br/>
                           <div class="col-sm-12 col-xs-12">
                            <div class="ht-widget hw-popular-categories">
                                <h3 class="widget-title" style="font-size: 15px;">POLICY</h3>
                                <ul>
                                    <li><a href="policy.php#terms"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Terms & Condition</a></li>
                                    <li><a href="policy.php#private"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Private Policy</a></li>
                                     <li><a href="policy.php#Refunds"><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;Cancellations And Refunds</a></li>
                                </ul>
                            </div>
                          
                        </div>
                            
                        </div>
                        
                    </div>
                </div>
                
            </section>

<div class=" row " style="background:#333; border-top: 1px solid #F8A631; margin: 0px;  ">
    
    
        <div class="  col-md-4 col-sm-12 col-xs-12 ht-widget hw-subscribe">
            <h3 class="widget-title" style="color:#fff; margin-top: 5%;" >SUBSCRIBE TO OUR EMAIL SUBSCRIBER</h3>
                                <p class="caption">Always up to date about our new food</p>
                                <form action="#" method="post" name="subemail" class="maru">
                                    <input type="email" placeholder="Email" name="email" required="" />
                                    <button type="submit" name="send"><i class="fa fa-paper-plane"></i></button>
                                </form>
                   <?php
                   if($er==1)
                   {
                       echo "<font color=#fff size=2> <i class='fa fa-times-circle'></i>  Already exist..!</font>";
                   }
                   if($ers==0)
                   {
                        echo "<font color=#fff size=2> <i class='fa  fa-thumbs-o-up'></i>  Thank you for email subscribe.</font>";  
                   }
                   ?>
        </div>
    
    <div class="col-md-offset-1 col-md-3" style="margin-top:2%;">
        <div class="fb-page" data-href="https://www.facebook.com/Food-Locker-179342422434911" data-tabs="timeline" data-width="200" data-height="180" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
    </div>
    <div class="  col-md-4 payment ht-widget hw-subscribe payment ">
        <h3 class="widget-title" style="color:#fff; margin-top: 1%;" >PAYMENT METHOD</h3>
        <?php
        $sel=  mysql_query("select * from paymethod  where del=0");
        while($gg=  mysql_fetch_array($sel))
        {
        ?>
        <a href="" title="<?php echo $gg[1]; ?>"><i  class="<?php echo $gg[2]; ?>"></i></a>
        <?php
        }
        ?>
    </div>
   
</div>
 
            <footer id="ht-footer">
              
                <div class="container ">
                    <div class="row">
                        <div class="col-md-11">
                            <p class="text-center" style="font-size:13px; ">Copyright &copy; 2022 Food Locker All Rights Resevered</p>
                        </div>
                        <div class="col-md-1 text-right" >
                       
                            <a href="#0" class="cd-top"><i class="fa fa-sort-up " title="Bottom To Top" style="font-size: 37px;color: #232323; "></i></a>
                        </div>
                    
                    </div>
                </div>
            </footer>
<script src="js/scroll/main.js"></script>
           
           