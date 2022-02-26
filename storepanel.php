<?php
require_once 'conection.php';


?>

<div class="educate_grid" style="padding: 15px;">
                                 
    <?php
    if($_REQUEST[work]=='detail')
    {
        $k=  mysql_query("select s.statename,c.cityname,a.areaname,ss.* from state s,city c,area a,store ss where s.stateid=ss.stateid and c.cityid=ss.cityid and a.areaid=ss.areaid and ss.storeid=$_REQUEST[kona]");
        $kk=  mysql_fetch_array($k);
        
    ?>
                                 <div class="living_box" >
                                     <table class="table table-responsive" style="width: 70%;">
                                         <tr>
                                             <td style="border:0;">
                                                 <b>Name</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[7]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>State</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[0]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>City</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[1]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>Area</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[2]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>Address</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[11]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>Email</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[13]; ?></p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Contact</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[14]; ?></p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Website</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[15]; ?></p>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="border:0;">
                                                 <b>Cuisine</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0; ">
                                                 <p >
                                                <?php 
                                                $cus=  mysql_query("select  m.mcatname,s.storename from maincategory m,store s,cuisine c where m.mcatid=c.mcatid and s.storeid=c.storeid and s.storeid=$_SESSION[id] ");
                                                while ($cu=  mysql_fetch_array($cus))
                                                 {
                                                 echo "<font style='font-size:14px;padding:0px 10px 0px 0px ;text-transform:capitalize;' >".$cu[0]."</font>"; 
                                                 }
                                                 ?>
                                                 </p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Time Duration </b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[21]; ?></p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Registration No</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[22]; ?></p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Since</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[24]; ?></p>
                                             </td>
                                         </tr>
                                          <tr>
                                             <td style="border:0;">
                                                 <b>Food type</b> 
                                             </td>
                                             <td style="border:0;">
                                                 :
                                             </td>
                                             <td style="border:0;">
                                                 <p><?php echo $kk[29]; ?></p>
                                             </td>
                                         </tr>
                                     </table>
                                     
                                 </div>
    <?php 
    }
    if($_REQUEST[work]=="review")
    {
            
    ?>
    
    <div class="container">   
            <div class="row">

                <?php
                $st=  mysql_query("select storename from store where active=1");
                $sell= mysql_fetch_array($st);
                ?>
                
                <div class="col-md-6 raterev">
                            <div class="ht-widget hw-popular-categories" >
                            <font class="sitemapline">Review For <?php echo $sell[0]; ?></font>
                        </div>
                        <div class="col-md-10">
                            <form  action="" method="post" name="contact" class="form-group maru"  >
                                <div class=" input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    <?php
                                    if($_SESSION[user]=="")
                                    {
                                    ?>
                                    <input type="text" name="revmsg" placeholder="Review For <?php echo $sell[0]; ?>" disabled="" title="give review after login" style="padding: 20px;" required=""  class="form-control "  />
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <input type="text" name="revmsg" placeholder="Review For <?php echo $sell[0]; ?>"  style="padding: 20px;" required=""  class="form-control "  />
                                    
                                    
                                    <?php
                                    }
                                    ?>
                                </div>
                                
                                    
                                <div class="co-md-12 text-center" >
                                    <button type="submit" name="send" class="btn sendbtn" style="outline: 0;">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                    <button type="reset" class="btn sendbtn" style="outline: 0;">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                </div>
                                </br>
    
                            </form>
                        </div>
                </div>
                
                <div class="col-md-6">
                            <div class=" ht-widget hw-popular-categories" >
                            <h3 class="widget-title" style="font-size: 15px; text-transform: capitalize;">Review For Seller <?php echo $sell[0]; ?></h3>
                        </div>
                    <div class="col-md-10">
                            <table class="table table-responsive">
                                
                                <?php
                                $info1=  mysql_query("select count(*) from user r,reviewstore rw where r.userid=rw.userid and rw.storeid=$_REQUEST[kona] and rw.status=1");
                               $infodata1=  mysql_fetch_array($info1);
                               
                               if($infodata1[0]>=5)
                               {
                                   $s=$infodata1[0]-5;
                               }
                               else
                               {
                                   $s=0;
                               }
                               
                                $info=  mysql_query("select r.username,r.url,rw.* from user r,reviewstore rw where r.userid=rw.userid and rw.storeid=$_SESSION[id] and rw.status=1 limit $s,5");
                                while($infodata=  mysql_fetch_array($info))
                                {
                                ?>
                                
                                <tr>
                                    <td style="color:#f8a631;width:30%;">
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
        </div>
  
       
    <?php
    }
    if($_REQUEST[work]=="event")
    {
    ?>
                           
    <div class="row">
        
        <div class="col-md-offset-4 col-md-4">
           
              <?php
               $e=mysql_query("select e.* from event e,storeevent s where s.eventid = e.eventid and s.storeid = $_REQUEST[kona]");
               while($eb=mysql_fetch_array($e))
               {
                  
              ?>
            
            <div class="eb">
                <div style="float: left;">
                   <b><?php echo $eb[1]; ?></b>
                </div>
           
                <div class="text-right">
                    <button  name="send" onclick="eventbook('open','<?php echo $eb[0]; ?>');" class="ht-button view-more-button" style="margin-left: 5%;">
                        <i class="fa fa-arrow-left"></i> Book Event <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
                
                <div style="clear: both;"></div>
           
            </div>
           
            <?php
                 }
            ?>
            
        </div>
        
        
        
            
        
        
        
    </div>
                                                           
<?php
    }
     if($_REQUEST[work]=="brochure")
    {
?>
 
    
    
    
    
    
    
    <div >
        <div >
                    <?php
                        $bro=  mysql_query("select * from brochure where storeid = $_REQUEST[kona]");
                        while($br=  mysql_fetch_array($bro))
                        {
                            $s=  mysql_query("select storeimage,storename from store where storeid=$_REQUEST[kona]");
                            $ss=  mysql_fetch_array($s);
                        
                    ?>  
                    
                   
                        <h3><?php echo $ss[1]; ?></h3>
                        <img src="<?php echo $ss[0]; ?>" class="img img-responsive" width="20%"/>
                        <div>
                            <a href="seller/<?php echo $br[3]; ?>" target="_blank" style="text-align: center;"><span>Download <i class="fa fa-download"></i></span></a>
                        </div>
                        

                    <?php
                        }
                    ?>
                      </div>  
    </div>             
 
     <?php } ?>
    
    
    
    
</div>



<?php
if($_REQUEST[idd]!="" && $_REQUEST[str]=="open")
{
?>

                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 loginkule">
                    <div class="inquiryweb row" style="background: #eee;box-shadow:2px 2px 2px #333;">
                        <font style="color:#333;font-weight: 600;font-size: 16px;" >Event Book</font>
                        &nbsp;&nbsp;&nbsp;
  
                        <i class="fa fa-times" onclick="eventbook('close');"></i>
                    </div>
                    <div class="row"  style="background: #eee;box-shadow:2px 2px 2px #333;">
                        
                        <form action="" method="post" name="eventbooks" class="maru">

                            <div class="col-md-offset-1 col-md-10" style="margin-top:5%;background: #eee;margin-bottom: 5%;">   
                                    
                                    <?php
                                        $eb =mysql_query("select ss.storename,ss.storeid,ee.price,e.* from store ss,eventprice ee,event e,storeevent s where s.eventid = e.eventid and e.eventid=ee.eventid and ss.storeid=s.storeid and ss.storeid=$_SESSION[id] and e.eventid=$_REQUEST[idd]");
                                      $ebb = mysql_fetch_array($eb);
                                        
                                        $_SESSION[eventid]=$ebb[3];
                                        $_SESSION[eprice]=$ebb[2];
                                  ?>
        
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="storename" value="<?php echo $ebb[0]; ?>" style="background:#fff;" disabled="" class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user-plus    "></i></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="eventname"  value="<?php echo $ebb[4]; ?>"  style="background:#fff;" disabled="" class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-gift" style="padding:0px 4.5px 0px 4.5px;font-size: 12px;"></i>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="price" value="<?php echo $ebb[2]; ?>"  style="background:#fff;" disabled=""  class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-rupee" style="padding:0px 4.5px 0px 4.5px;font-size: 12px;"></i>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="date" name="date" required=""  style="background:#fff;" class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa  fa-calendar" style="padding:0px 4.5px 0px 4.5px;font-size: 10px;"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <textarea type="text" row="4" name="message"  style="background:#fff;" placeholder="Enter Detail" required=""   class="form-control " ></textarea> 
                                        <div class="input-group-addon" style="background:#f8a631;" >
                                            <i class="fa fa-bars"  style="padding:0px 4.5px 0px 4.5px;font-size: 10px;"></i>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12 input-group text-center">
                                     <button type="submit" name="event" title="Send" class="btn inquirybtn">Confirm &nbsp;&nbsp;<i class="fa fa-rocket" ></i></button>&nbsp;&nbsp;
                                    <button type="reset" title="clear" name="clear"class="btn inquirybtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o" ></i></button>
                                </div>
                                
                            </div>

                        </form>
                   
                        
                        
                        
                    </div>
                        
                </div>
            
<?php
}
?>