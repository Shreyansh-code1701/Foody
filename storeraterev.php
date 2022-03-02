<?php
require_once 'connection.php';
if($_SESSION[user]=="")
{
    header("location:registration.php");
}
if($_REQUEST[id]!="")
{
    $_SESSION[id]=$_REQUEST[id];
    header("location:storeraterev.php");
}

$sel=mysql_query("select * from store where storeid=$_SESSION[id]");
$sell=  mysql_fetch_array($sel);

if (isset($_REQUEST[send])) {
    $date=date('Y-m-d h:i:s');
    $insert = mysql_query("insert into reviewstore values('$_SESSION[user]','$_SESSION[id]',0,'$_REQUEST[revmsg]','$date',0,0)");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="grate('rate',0); ">

        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            ?>
          
            <div class="ht-page-header" style="background-image: url('seller/<?php echo $sell[27]; ?>')">
                <div class="overlay" style="background: rgba(23,50,0,.5)"></div>
                <div class="container">
              
                    <br/>
                    <div class="col-md-offset-3 col-md-6">
                    <font style="font-size: 15px;text-transform: uppercase;"><?php echo $sell[12];  ?></font><br/><br/>
                    <font style="font-size: 15px;text-transform: uppercase;"><?php echo $sell[18];  ?></font><br/><br/>
                    
                        <?php 
                        $cus=  mysql_query("select  m.mcatname,s.storename from maincategory m,store s,cuisine c where m.mcatid=c.mcatid and s.storeid=c.storeid and s.storeid=$_SESSION[id] ");
                        while ($cu=  mysql_fetch_array($cus))
                        {
                             echo "<font style='font-size:15px;padding:8px;text-transform:uppercase;'>".$cu[0]."</font>"; 
                        }
                        ?>
                    </div>
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                          
                        </div> 

                    </div>
                </div>
        
            </div>
            <div class="container " ><BR></br>
                
                <div class="row" style="background-color: #eee;">
                    
                   
                    <div class="col-md-5 raterev">
                            <div class="ht-widget hw-popular-categories" >
                            <font class="sitemapline">Review For <?php echo $sell[4]; ?></font>
                        </div>
                        <div class="col-md-10">
                            <form  action="" method="post" name="contact" class="form-group maru"  >
                                <div class=" input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    <?php
                                    if($_SESSION[user]=="")
                                    {
                                    ?>
                                    <input type="text" name="revmsg" placeholder="Review For <?php echo $sell[4]; ?>" disabled="" title="give review after login" style="padding: 20px;" required=""  class="form-control "  />
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <input type="text" name="revmsg" placeholder="Review For <?php echo $sell[4]; ?>"  style="padding: 20px;" required=""  class="form-control "  />
                                    
                                    
                                    <?php
                                    }
                                    ?>
                                </div>
                                
                                    
                                <div class="co-md-12 text-center" >
                                    <button type="submit" name="send" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                    <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                </div>
                                </br>
    
                            </form>
                            <div class=" ht-widget hw-popular-categories" >
                            <h3 class="widget-title" style="font-size: 15px; text-transform: capitalize;">Review For Seller <?php echo $sell[4]; ?></h3>
                        </div>
                            <table class="table table-responsive">
                                
                                <?php
                                $info1=  mysql_query("select count(*) from user r,reviewstore rw where r.userid=rw.userid and rw.storeid=$_SESSION[id] and rw.status=1");
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
                    
                     <div class="col-md-4 raterev">
                          <div class="ht-widget hw-popular-categories" >
                            <font class="sitemapline">Store Information <?php echo $sell[4]; ?></font>
                        </div>
                        <?php
                       $sel1=mysql_query("select * from store where storeid=$_SESSION[id]");
                       while ($row = mysql_fetch_array($sel1)) 
                           {
                           ?>
                        <div class="col-md-12">
                             <ul class="p-info sellerinfo">
                                    <li>
                                            <div class="desk text-center " >
                                                <img src="seller/<?php echo $row[13]; ?>" style="border-radius:5%;" />
                                            </div>
                                        </li>
                                        <li >
                                            <div class="title">Name</div>
                                            <div class="desk"><?php echo $row[4]; ?> </div>
                                        </li>
                                         <li>
                                            <div class="title">Sport</div>
                                            <div class="desk"><?php  echo $row[8]; ?> </div>
                                        </li>
                                        <li>
                                            <div class="title">Mail</div>
                                            <div class="desk"><?php echo $row[10]; ?> </div>
                                        </li>
                                        <li>
                                            <div class="title">Coll No</div>
                                            <div class="desk"><?php echo $row[11]; ?> </div>
                                        </li>
                                        <li>
                                            <div class="title">GOV. Registration</div>
                                            <div class="desk"><?php echo $row[19]; ?> </div>
                                        </li>
                                        <li>
                                            <div class="desk text-center"><iframe src="<?php echo $row[9]; ?>" width="50%"  style="border-radius:5%;"></iframe> </div>
                                        </li>
                             </ul>
                           </div>
                         <?php  
                       }
                       ?>
                    </div>
                    
                    <div class="col-md-3 raterev">
                      <div class="ht-widget hw-popular-categories" >
                          <font class="sitemapline">Rate for <?php echo $sell[4]; ?></font>
                        </div>
                        <div class="col-md-10" id="ratedekho">
                           
                    </div>
                    </div>
                </div>
            </div><br>





            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>