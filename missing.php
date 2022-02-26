<?php
require_once 'conection.php';
?>


<?php
if($_REQUEST[kona]=="loginpage")
{
    
     $lb=mysql_query("select * from logblock where userid like '$_REQUEST[user]'");
    $b=mysql_fetch_array($lb);
    
    $endt = new DateTime($b[3]);
    
    $dif=$endt->diff(new DateTime(date('Y-m-d h:i:s')));
    
    $m = $dif->format("%I");
    
    if($m>=5)
    {
        mysql_query("delete from logblock where userid like '$_REQUEST[user]'");
    }
    
    $er=0;
    $err=0;
  
    $pa=$_REQUEST[user];
    $paa=mysql_real_escape_string($pa);
    
    $pas=$_REQUEST[password];
    $pass=mysql_real_escape_string($pas);
    
        
        $a=mysql_query("select * from login where userid like '$paa' and password like '$pass'");
        $aa=mysql_fetch_array($a);
        
        if($aa[0] != "")
        {
               
                if($aa[4]==0)
                {
                    $_SESSION[time] = $time;
                    $_SESSION[date] = $date;
                    $_SESSION[user]=$aa[0];
                    $_SESSION[type]=$aa[3];


                    if(isset($_REQUEST[remember]))
                    {
                        setcookie("cookuser",$aa[0]);
                        setcookie("cookpass", $aa[1]);
                    }
                    if($_SESSION[type]==0)
                    {
                        echo "<script>window.location.href='admin/adminprofile.php'</script>";
                    }
                    else if($_SESSION[type]==1)
                    {
                         echo "<script>window.location.href='seller/seller.php'</script>";
                    }
                    else
                    {
                           echo "<script>window.location.href='userprofile.php'</script>";
                    }
                }
                else
                {
                     echo "You are blocked";
                }
            
        }
        else
        {
            
            $dt=mysql_query("select * from login where userid like '$_REQUEST[user]'");
            $dd=mysql_fetch_array($dt);
            $tm=date('Y-m-d h:i:s');
            if($dd[0]!="")
            {
                 $lb=mysql_query("select * from logblock where userid like '$_REQUEST[user]'");
                 $b=mysql_fetch_array($lb);
                 if($b[2]<3)
                 {
                     if($b[1]=="")
                     {
                           mysql_query("insert into logblock values('$_REQUEST[user]',0,1,'$tm')");
                     }
                     else
                     {
                         $try=$b[2]+1;
                         mysql_query("update logblock set try=$try,ltime='$tm' where userid like '$_REQUEST[user]'");
                     }
                 }
              
                
            }
            
            $tp=mysql_query("select * from logblock where userid like '$_REQUEST[user]'");
            $gtp=mysql_fetch_array($tp);
            
            echo "Invalid User";
            
            if($gtp[2]<=2)
            {
                echo "&nbsp;&nbsp;&nbsp;".$gtp[2]." Try";
            }
            
        }
}
                           $tp=mysql_query("select * from logblock where userid like '$_REQUEST[user]'");
                            $gtp=mysql_fetch_array($tp);
                            
                            if($gtp[2]>=3)
                            {
                                $st=new DateTime($gtp[3]);
                                
                                $diff=$st->diff(new DateTime(date('Y-m-d h:i:s')));
                                
                                $m=$diff->format("%I");
                                
                                $s=$diff->format("%S");
                                
                             ?>
                        <script>
                            
                            clk(<?php echo $m ?>,<?php echo $s ?>);
                            
                            function clk(m,s)
                            {
                                var o=setInterval(function(){
                                    
                                    
                                    s=s+1;
                                    
                                    if(s==60)
                                    {
                                        s=0;
                                        m++;
                                    }
                                    if(m==5)
                                    {
                                        window.location.href="index.php?uid=<?php echo $_REQUEST[user]; ?>";
                                    }
                                    $("#clock").text(m+" : "+s)
                                    
                                },1000);
                            }
                            
                        </script>
                        
                        <div id="clock">
                            
                        </div>
                        
                        
                        <?php
                            }
                          
                            
                        ?>
                        




<?php
if($_REQUEST[konu]=="like")
{
    $i=mysql_query("select * from likee where userid like '$_SESSION[user]' and productid = $_REQUEST[pid]");
    $gi=mysql_fetch_array($i);
    $f=0;
    if($gi[0]=="")
    {
        $f=1;
        mysql_query("insert into likee values('$_SESSION[user]',$_REQUEST[pid],0)");
    }
    else
    {
        $f=2;
        mysql_query("delete from likee where likeid = $gi[2]");
    }
    $in=mysql_query("select count(*) from likee where productid = $_REQUEST[pid]");
    $a=mysql_fetch_array($in);
   
                                                        if ($f == 2) {
                                                            ?>
    <font style="color: #fff; font-size: 13px;cursor: pointer;" onclick="like('like<?php echo $_REQUEST[pid]; ?>','<?php echo $_REQUEST[pid] ?>');"> <i class="fa fa-heart-o animated zoomIn" style="color: #fff; font-size: 20px;"></i>&nbsp;<?php echo $a[0]; ?> Like</font>
    <?php
                                                        }
                                                        else
                                                        {
                                                          ?>
    <font style=" color: #fff;font-size: 13px;cursor: pointer;" onclick="like('like<?php echo $_REQUEST[pid]; ?>','<?php echo $_REQUEST[pid] ?>');"> <i class="fa fa-heart animated zoomIn" style="font-size: 22px;color:red;"></i>&nbsp;<?php echo $a[0]; ?> Like's</font>
                                                            

    <?php
    }
    
}
?>

<?php
if($_REQUEST[tbl]=="city")
{
    echo "<option>-- Select City --</option>";
$city= mysql_query("select * from city where del=0 and stateid=$_REQUEST[id]");
while ($row= mysql_fetch_array($city))
{
?>
<option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
<?php
}
}
?>

<?php
if($_REQUEST[tbl]=="area")
{ 
    echo "<option>-- Select Area --</option>";
$city= mysql_query("select * from area where del=0 and cityid=$_REQUEST[id]");
while ($row= mysql_fetch_array($city))
{
?>
<option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
<?php
}
}
?>


<?php
if($_REQUEST[tbl]=="searchcity")
{
    echo "<option style='color: #f8a631;'>-- Select City --</option>";
$city= mysql_query("select * from city where del=0 and stateid=$_REQUEST[id]");
while ($row= mysql_fetch_array($city))
{
?>
<option value="<?php echo $row[1]; ?>" style="color: #f8a631;"><?php echo $row[2]; ?></option>
<?php
}
}
?>

<?php
if($_REQUEST[tbl]=="searcharea")
{ 
    echo "<option style='color: #f8a631;'>-- Select Area --</option>";
$city= mysql_query("select * from area where del=0 and cityid=$_REQUEST[id]");
while ($row= mysql_fetch_array($city))
{
?>
<option value="<?php echo $row[1]; ?>" style="color: #f8a631;"><?php echo $row[2]; ?></option>
<?php
}
}
?>



<!----------------------------------------MANAGE CONTACT STORE----------------------------------------->

<?php
if($_REQUEST[konu]=='misscontactstore')
{
    if($_REQUEST[kona]!="" && $_REQUEST[kona]!=0)
    {
        $consel=  mysql_query("select * from store where del=0 and active=1 and storeid=$_REQUEST[kona]");
        $consell=  mysql_fetch_array($consel);
         $_SESSION[storeid]=$consell[3];
        ?>

<div class="row" >
                        <div class="container-fuild ht-widget hw-popular-categories" >
                            <h3  class="contactline"style="font-size: 15px;  ">OVER LOCATION</h3>
                                        <iframe src="<?php echo $consell[9];?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-7 ht-widget hw-popular-categories" >
                            <h3 class="contactline" style="font-size: 15px; width: 25%;">CREATE CONTACT</h3>
                            <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;<font >contact people with the best restaurants around them.</font><br><br>
                            <div class="row">
                             
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="text" name="name" placeholder="Name" style="padding: 20px;" required=""  pattern='^[a-zA-Z ]+$'  class="form-control "  />
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    </div>  
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="email" name="email" placeholder="Email" style="padding: 20px;" required=""   class="form-control" /> 
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-envelope"></i></div>
                                    </div>
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="text" name="subject" placeholder="subject" style="padding: 20px;"  required=""   pattern='^[a-zA-Z ]+$'    class="form-control"  />
                                        <div class="input-group-addon " style="background:#f8a631;"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <textarea  class="form-control"  rows="5" name="sms" placeholder="Message" required=""  ></textarea>
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-pencil"></i></div>
                                    </div>
                                    <div class="co-md-12 text-center" >
                                        <button type="submit" name="sendcontact" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                        <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                    </div>
                                
                            </div>
                        </div>
                        <div class=" col-md-offset-1 col-md-4 ht-widget hw-popular-categories">
                            <h3 class="contactline" style="font-size: 15px; width: 36%;"> STORE CONTACT INFO</h3>
                            <ul style="display: inline;" >
                                <li style="list-style: none; margin-top: 12%;"> <i class="fa fa-map-marker"style="color: #f8a631; font-size: 16px; "></i><?php echo $consell[8]; ?></font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-mobile-phone"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[11]; ?></font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-envelope"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[10]; ?></font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-facebook"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[12]; ?>/Facebook</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-twitter"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[12]; ?>/Twitter</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-google-plus"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[12]; ?>/Google</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-instagram"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font><?php echo $consell[12]; ?>/Instagram</font></li>
                            
                                <li style="list-style: none; margin-top: 7%;">
                                    <?php
                                    if($_SESSION[user]!="" && $_SESSION[type]==2)
                                    {
                                        $follow=mysql_query("select * from follow where storeid=$_SESSION[storeid] and userid like '$_SESSION[user]'");
                                        $followw=mysql_fetch_array($follow);
                                        
                                        if($followw[1]==$_SESSION[storeid] && $followw[0]==$_SESSION[user]) 
                                        {
                                         ?>
                                        <i class="fa fa-thumbs-o-up" onclick="follow('follow',<?php echo $consell[3]; ?>);misscon('misscontactstore',<?php echo $_SESSION[storeid]; ?>);" style="color: #f8a631; font-size: 16px; cursor: pointer;">&nbsp;&nbsp;Follow</i>
                                        <?php
                                         }
                                         else
                                         {
                                        ?>

                                        <i class="fa fa-thumbs-o-down" onclick="follow('follow',0);misscon('misscontactstore',<?php echo $_SESSION[storeid]; ?>);" style="color: #f8a631; font-size: 16px; cursor: pointer;">&nbsp;&nbsp;Unfollow</i>
                                        <?php
                                         }
                                    }
                                    ?>
                                </li>
                            
                            </ul>
                        </div>
                    </div>

<?php
    }
   ?>
     
<?php
   
}
?>

<?php
if($_REQUEST[shu]=="follow")
{
    if($_REQUEST[val]!=0)
    {
        $del=mysql_query("delete from follow where storeid=$_SESSION[storeid] and userid like '$_SESSION[user]' ");
    }
    if($_REQUEST[val]==0)
    {
        $sdate=date('Y-m-d');
        $infollow=mysql_query("insert into follow values('$_SESSION[user]',$_SESSION[storeid],0,'$sdate')");
    }
}
?>



<!----------------------------------------MANAGE FEEDBACK STORE----------------------------------------->

<?php
if($_REQUEST[konu]=='missfeedbackstore')
{
    if($_REQUEST[kona]!="" && $_REQUEST[kona]!=0)
    {
        $consel=  mysql_query("select * from store where del=0 and active=1 and storeid=$_REQUEST[kona]");
        $consell=  mysql_fetch_array($consel);
        ?>
<div class="row">
                    <div class="col-md-6">
                        <img src="images/feed.png" style="max-width:80%; margin-top:20%;" class="img img-responsive animated  bounceInLeft"/>
                    </div>
                    <div class="col-md-6">
                        <div class="row ht-widget hw-popular-categories" >
                            <h3 class="widget-title" style="font-size: 15px;">SEND YOUR FEEDBACK</h3>
                        </div>
                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;<font >If You Satisfy from our web site then give us feedback.. </font><br><br>
                        <div class="row">
                           
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" placeholder="Name" style="padding: 20px;" required=""  pattern='^[a-zA-Z ]+$'  class="form-control "  />

                                </div>
                                
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-keyboard-o"></i></div>
                                    <textarea  class="form-control"  rows="5" name="sms" placeholder="Sms" required=""  ></textarea>

                                </div>

                                <div class="co-md-12 text-center" >
                                    <button type="submit" name="send" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                    <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                </div>
                            
                        </div>

                    </div>
                </div>
<?php
    }
   ?>
     
<?php
   
}
?>



<!------------------------------------------------MANAGE STORE RATE------------------------------------------->



<?php
if ($_REQUEST[kona] == "rate") 
{
    $k=mysql_query("select * from ratestore where userid like '$_SESSION[user]' and storeid=$_SESSION[id] ");
    $kk=mysql_fetch_array($k);
    
    if($kk[0]=="")
    {
           if($_REQUEST[val]!=0)
           {
                $rt=  mysql_query("insert into ratestore values('$_SESSION[user]',$_SESSION[id],0,$_REQUEST[val])");
           } 
    }
    
    else
    {
         if($_REQUEST[val]!=0)
           {
                $rt= mysql_query("update ratestore set rate=$_REQUEST[val] where userid like '$_SESSION[user]' and storeid=$_SESSION[id]");
             } 
    }  
    ?>

    <?php
    if ($_SESSION[user] == "")
        {
        for ($i = 1; $i <= 5; $i++) 
        {
            ?>
            <i class="fa fa-star-o srate" title="Give Rate After Login"></i>
            <?php
        }
    } 
    else 
        {
        
      ?>
            
        <?php
        
        $ha=mysql_query("select rate  from ratestore where userid like '$_SESSION[user]' and storeid=$_SESSION[id] ");
        $haa=mysql_fetch_array($ha);
 
        for ($i = 1; $i <= 5; $i++) 
        {
            if($i<=$haa[0])
            {
            ?>
            <i class="fa fa-star srate"  onclick="grate('rate','<?php echo $i; ?>');avgrate('sratedekho');"></i>
            <?php
            }
            else
            {
                ?>
            
             <i class="fa fa-star-o srate" onclick="grate('rate','<?php echo $i; ?>');avgrate('sratedekho');"></i>
            <?php
            }
        }
    }
    ?>

    <?php
}
?>

  
             
             
             
<!------------------------------------------------MANAGE STORE AVG RATE------------------------------------------->    
         

 <?php
    if($_REQUEST[kona]=="sratedekho")
    {
                                    $avs=  mysql_query("select avg(rate) from ratestore where storeid=$_SESSION[id]");
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
    }
                                    ?>

             
             
             
             
           
<!------------------------------------------------MANAGE PRODUCT RATE------------------------------------------->             
             

<?php
if($_REQUEST[kona]=="productrate")
{
  
     $k=mysql_query("select * from rateproduct where userid like '$_SESSION[user]' and productid=$_SESSION[proid] ");
    $kk=mysql_fetch_array($k);
    
    if($kk[0]=="")
    {
        if($_REQUEST[val]!=0)
        {
            $in=mysql_query("insert into rateproduct values('$_SESSION[user]',$_SESSION[proid],0,$_REQUEST[val])");
        }
    }
    else
    {
        if($_REQUEST[val]!=0)
           {
                $rt= mysql_query("update rateproduct set rate=$_REQUEST[val] where userid like '$_SESSION[user]' and productid=$_SESSION[proid]");
             } 
    }
    
?>

  <?php

       if ($_SESSION[user] == "") 
       {

          for ($i = 1; $i <= 5; $i++)
          {
       ?>

            <i style="color:#f8a631;cursor: pointer;" class="fa fa-star-o" title="Give Rate After Login"></i>

      <?php
         }
       } 
       else 
       {
      ?>

     <?php
     $ha = mysql_query("select rate from rateproduct where userid like '$_SESSION[user]' and productid=$_SESSION[proid] ");
     $haa = mysql_fetch_array($ha);

     for ($i = 1; $i <= 5; $i++)
     {
         if ($i <= $haa[0]) 
         {
     ?>
            <i style="color:#f8a631;cursor: pointer;" class="fa fa-star srate" onclick="prate('productrate',<?php echo $i; ?>);avgrate('pratedekho');"></i>
    <?php
        }
        else 
        {
    ?>
    <i style="color:#f8a631;cursor: pointer;" class="fa fa-star-o srate" onclick="prate('productrate',<?php echo $i; ?>);avgrate('pratedekho');"></i>
    <?php
         }
     ?>

 <?php
       }
  }
  ?>

<?php
}
?>

    
    
    
    
    <!------------------------------------------------MANAGE PRODUCT AVG RATE------------------------------------------->    
    
    
    
    
    
    
    <?php
    if($_REQUEST[kona]=="pratedekho")
    {
                                    $av=  mysql_query("select avg(rate) from rateproduct where productid=$_SESSION[proid]");
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
    }
                                    ?>

                                     
                                     
                                     
                                     
<!--------------------------------------------------SHIPPING MISSING FORM--------------------------------------------->
                                     
                                     
                                     
                <?php
                if($_REQUEST[kona]=="addform")
                {
                
                    if($_REQUEST[val]!=0)
                    {
                        $_SESSION[alr]=1;
                        $s=mysql_query("select * from shipping where shippingid=$_REQUEST[val] ");
                        $ss=mysql_fetch_array($s);
                    }
                                 $nm=  mysql_query("select username from user where userid like '$_SESSION[user]' ");
                                $name=  mysql_fetch_array($nm);

 ?>
                                     
                                     
                                     <div class="form-group">
                                <label class="mylbm">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name"  style="padding: 15px;" value="<?php  echo $name[0]; ?>"  required=""   pattern='^[a-zA-Z  ]+$'  class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mylbm">City</label>
                                <div class="input-group">
                                    <select required="" name="city" class="form-control"  >
                                        <option value="">-Select City-</option>
                                                <?php
                                                $city = mysql_query("select * from city where del=0  ");
                                                while ($row = mysql_fetch_array($city)) {
                                                    
                                                    
                                                    if($row[1]==$ss[1])
                                                    {
                                                        ?>
                                        <option value="<?php echo $row[1]; ?>" selected=""><?php echo $row[2]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        
                                                  
                                                    ?>
                                            <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
                                            <?php
                                        }
                                                }
                                        $_SESSION[city]=$row[1];
                                        ?>
                                    </select>
                                    <div class="input-group-addon regi"><i class="fa fa-globe "></i></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mylbm">Area</label>
                                <div class="input-group">
                                    <select required="" name="area" class="form-control"  >
                                        <option value="">-Select Area-</option>
                                            <?php
                                            $area = mysql_query("select * from area where del=0");
                                            while ($row2 = mysql_fetch_array($area)) {


                                                if ($row2[1] == $ss[2]) {
                                                    ?>
                                                    <option value="<?php echo $row2[1]; ?>" selected=""><?php echo $row2[2]; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $row2[1]; ?>"><?php echo $row2[2]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </select>
                                    <div class="input-group-addon regi"><i class="fa fa-globe "></i></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mylbm">Address</label>
                                <div class="input-group">
                                    <input type="text" name="address" value="<?php echo $ss[5]; ?>" placeholder="Fill Your Address" style="padding: 15px;"  required="" pattern='^[a-zA-Z0-9,/-. ]+$'    class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="mylbm">Contact</label>
                                <div class="input-group">
                                    <input type="text" name="contact" placeholder="Fill Your Mobile No" style="padding: 15px;" value="<?php echo $ss[6]; ?>"  required="" pattern='^[0-9]{10}$'   class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-home"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="mylbm">Pine Code</label>
                                <div class="input-group">
                                    <input type="text" name="pincode" placeholder="Fill Your Area Pine Code" style="padding: 15px;" required=""  value="<?php echo $ss[7]; ?>"  pattern='^[0-9 ]+$'  class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>

                  <?php
                }
                  ?>


                                               
   
<!--------------------------------------------------MISSING USER BILL--------------------------------------------->


                                     
                                     
   <?php

   if($_REQUEST[kona]=="missbill")
   {
       if($_REQUEST[su]=="last")
       {
           $ub=mysql_query("select * from bill where billid=(select  max(billid) from bill) and userid like '$_SESSION[user]'");
           
       }
       if($_REQUEST[su]=="billno")
       {
           $ub=mysql_query("select * from bill where userid like '$_SESSION[user]' and billid=$_REQUEST[val] ");
       }
        if($_REQUEST[su]=="fdate")
       {
           $ub=mysql_query("select * from bill where userid like '$_SESSION[user]' and billdate='$_REQUEST[val]' ");
       }
   ?>
                                     
                                     
<div class="col-md-offset-3 col-md-6" style="background: #eee; margin-top: 15px;" >
                   
                    <?php
                    $c=0;
                    $q=0;
                    $pb=0;
                    $p=0;
                    $d=0;
                    $ftot=0;
                    $chupay=0;
                    $pay=0;
                
                    while ($ubill = mysql_fetch_array($ub)) 
                        {
                        
                        $cs=  mysql_query("select c.cityname,a.areaname,s.* from city c,area a,shipping s where c.cityid=s.cityid and a.areaid=s.areaid and s.userid like '$_SESSION[user]' ");
                        $csh = mysql_fetch_array($cs); 
                            
                    
                            
                     
                    ?>
                    
                    <table class="table table-responsive" >
                        
                        <tr style="text-align: center;">
                            <td colspan="2" style="border: none;">
                                <img  src="images/about.png" width="40%"/>
                            </td>
                        </tr>
                        
                        <tr style="text-align: center;">
                            <td colspan="2">
                                348,Royal Squre, VIP Circle,Utran,Surat
                            </td>
                        </tr>
                        
                        <tr style="text-align:center;">
                            <td colspan="2">
                                <strong>Mo :</strong><font>7874259262 , 8758722336</font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td >
                                <strong>Name :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[6]; ?></font>
                            </td>
                            <td>
                                <strong>Bill No :</strong>&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[1]; ?></font>
                            </td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" style="border: none;">
                                <strong>Date :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[2]; ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style="border: none;">
                                <strong>Cashier :</strong>&nbsp;&nbsp;&nbsp;<font>1</font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style="border: none;">
                                <strong>Address :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[5]; ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="border: none;">
                                <strong>City :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[0]; ?></font>
                            </td>
                            <td style="border: none;">
                                <strong>Area :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[1]; ?></font>
                            </td>
                        </tr>
                                                
                        <tr>
                            <td colspan="2" style="border: none;">
                                <strong>Pin Code :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[9]; ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style="border: none;">
                                <strong>Mo :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[8]; ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style="border: none;">
                                <table class="table table-responsive" style="width: 100%;">
                                    <tr >
                                        <th style="border: 1px solid #232323 !important; text-transform: capitalize;font-size: 13px;">No.</th>
                                     <th style="border: 1px solid #232323 !important; text-transform: capitalize;font-size: 13px;">STORE</th>
                                    <th style="border: 1px solid #232323 !important; text-transform: capitalize;font-size: 13px;">ITEM</th>
                                    <th style="border: 1px solid #232323 !important; text-transform: capitalize;font-size: 13px;">QTY</th>
                                    <th style="border: 1px solid #232323 !important;text-transform: capitalize;font-size: 13px;">PRICE</th>
                                    <th style="border: 1px solid #232323 !important; text-transform: capitalize;font-size: 13px;">AMOUNT</th>
                                    </tr>
                                    <?php
                          
                        
                           $sp=mysql_query("select i.proname,s.storename,t.* from item i,transaction t,store s where i.productid = t.productid and s.storeid = i.storeid and t.userid like '$_SESSION[user]' and t.billid=$ubill[1]"); 
                           while ($spp = mysql_fetch_array($sp)) 
                           {
                               $q=$q+$spp[6];
                               $p=$p+$spp[7];
                               $pb=$pb+($spp[10]);
                               $ftot=$ftot+$spp[10];
                               $pay=$chupay+$ftot;
                               
                              
                               
                            $c++;
                                    ?>
                                    <tr >
                                        <td style=" border: 1px solid #232323;text-transform: capitalize; font-size: 13px;"><?php echo $c; ?></td>
                                         <td style="border: 1px solid #232323;text-transform: capitalize;font-size: 13px;"><?php echo $spp[1]; ?></td>
                                         <td style="border: 1px solid #232323;text-transform: capitalize;font-size: 13px;"><?php echo $spp[0]; ?></td>
                                         <td style="border: 1px solid #232323;text-transform: capitalize;font-size: 13px;"><?php echo $spp[6]; ?></td>
                                         <td style="border: 1px solid #232323;text-transform: capitalize;font-size: 13px;"><?php echo $spp[7]; ?></td>
                                         <td style="border: 1px solid #232323;text-transform: capitalize;font-size: 13px;"><?php echo ($spp[7])*($spp[6]); ?></td>
                                    </tr>
                                    <?php
                                    
                           }
                                    ?>
                                     </table>

                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" style="text-align: right;">
                                     Total QTY :<font><?php echo $q; ?></font><br/>
                                     Grand Total : <font><?php echo $ftot; ?></font><br/>
                                     <i class="fa fa-truck"></i>&nbsp;Shipping charge : &nbsp;&#8377;&nbsp;100 &nbsp;/-<?php $ftot=$ftot+100 ?><br/>
                            </td>
                        </tr>
                        
                        <?php
                                $chupay=ceil(($ftot*2)/(100));
                                $pay=$ftot+$chupay;
                            
                                ?>
                        
                        <tr>
                            <td colspan="2" style="text-align: right;">
                                    <strong> Payable Amount : </strong><font><?php echo $pay; ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                Services Charge Text consultant 2% of Payable Amount : &nbsp;&#8377;&nbsp;<?php echo $chupay;  ?>&nbsp;/-<br/>
                                <br/>     
                                <div onclick="printbill();" style="cursor: pointer;">Print</div>
                            </td>
                        </tr>
                    
                        <?php
                     $c=0;
                    $q=0;
                    $pb=0;
                    $p=0;
                    $d=0;
                    $ftot=0;
                    $chupay=0;
                    $pay=0;
                        }
                         
                      
                    ?>
                        
                    </table>
                   
                       
                                    
     <?php
   }

     ?>
                                     
                </div>      

 <!--------------------------------------------------MISSING fill coupon--------------------------------------------->
  <?php
  if($_REQUEST[kona]=="fillcode")
  {
      ?>
 <font>YOUR CODE IS   <?PHP echo $_SESSION[coupon]=rand(100,200000);?></font>
 <?php
  }
  ?>

 
 
 
 
<!----------------------------------------------------USER BILL MIS ---------------------------------------------------->
 
 
 
 
 <?php
if($_REQUEST[kona]=="usermis")
{
  
?>

    <table class="table table-responsive mis">
    
    <tr>
        <th>Index.</th>
        <th>Bill No.</th>
        <th>Tra.Id</th>
        <th>Buyer Name</th>
        <th>Bill Date</th>
         <th>Bill Amount</th>
        <th>Discount</th>
        <th>Payment Type</th>
    </tr>
                                
    <?php
    $c = 0;
       
   
            if($_REQUEST[koni]=="badhu")
            {
                $data1=mysql_query("select b.userid,b.billdate,b.paymethod,t.* from bill b,transaction t where b.billid=t.billid and t.userid like '$_SESSION[user]'  ");
            }
            if($_REQUEST[koni]=="billno")
            {
                $data1=mysql_query("select b.userid,b.billdate,b.paymethod,t.* from bill b,transaction t where b.billid=t.billid and t.billid like '$_REQUEST[su]%' and t.userid like '$_SESSION[user]' "); 
            }
             if($_REQUEST[koni]=="paymethod")
            {
                $data1=mysql_query("select b.userid,b.billdate,b.paymethod,t.* from bill b,transaction t where b.billid=t.billid and b.paymethod like '$_REQUEST[su]%' and t.userid like '$_SESSION[user]'  ");
            }
             if($_REQUEST[koni]=="fdate")
            {
                $data1=mysql_query("select b.userid,b.billdate,b.paymethod,t.* from bill b,transaction t where b.billid=t.billid and b.billdate like '$_REQUEST[su]%' and t.userid like '$_SESSION[user]'  ");
            }
             if($_REQUEST[koni]=="low")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and b.billdate like '$_REQUEST[su]%' and s.userid like '$_SESSION[user]' ");
            }
            
            while ($row1 = mysql_fetch_array($data1))
            {
            $c++;
        ?>
                                            
            <tr align="center" >
                <td style="text-transform: capitalize;" class="f" title="<?php echo $c; ?>">
            <?php echo $c; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[3]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[5]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[0]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[1]; ?>
                </td>
                  <td style="text-transform: capitalize;">
                    <?php echo $row1[9]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[10]; ?>
                </td>
              
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[2]; ?>
                </td>
                
            </tr>
                                                
                                                
                                                
            <?php
        }
    
    ?>

            <tr  align="center" style="background-color:#f8a631;color: #FFFFFF;">
                <td colspan="4" style="background-color:#f8a631;color: #FFFFFF;"  >  Total Package MIS Record Are : <?php echo $c; ?></td>
        <td colspan="3"  style="background-color:#f8a631;color: #FFFFFF;">
          
        </td>
        <td colspan="3" style="background-color:#f8a631;color: #FFFFFF;" >
            <font onclick="printbill();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>
