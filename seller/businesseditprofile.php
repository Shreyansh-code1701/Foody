<?php
require_once 'connection.php';
require_once 'sellersecure.php';


$pr=mysql_query("select storeimage from store where storeid=$row[8]");
$prr=mysql_fetch_array($pr);
$oldpath=$prr[0];

if (isset($_REQUEST[send])) 
    {
    
    if (strlen($_FILES[updatepic][name]) > 0) 
     {
        unlink($oldpath);
        $name = $_FILES[updatepic][name];
        $ex = "." . substr($_FILES[updatepic][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") 
         {
            $siz = $_FILES[updatepic][size] / 1024;
            $siz = $siz / 1024;
            if ($siz <= 10) 
            {
                $name = $_SESSION[user] . $ex;
                $path1 ="profile/" . $name;
                 $oldpath=$path1;
                $path2 =dirname(__FILE__).  $oldpath;
               
        
            } 
           
        }
      
           
   
    }
  $up =("update store set storename='$_REQUEST[name]',address='$_REQUEST[address]',state='$_REQUEST[state]',city='$_REQUEST[city]',area='$_REQUEST[area]',storemap='$_REQUEST[storemap]',email='$_REQUEST[email]',mobile='$_REQUEST[mobile]',website='$_REQUEST[website]',storeimage='$oldpath',timeduration='$_REQUEST[timeduration]',regno='$_REQUEST[regno]',since='$_REQUEST[since]',fax='$_REQUEST[fax]',foodtype='$_REQUEST[foodtype]' where userid like '$_SESSION[user]' ");
    move_uploaded_file($_FILES[updatepic][tmp_name], $path2);
    //header("location:businessprofile.php");  
}



?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="piccc('0');">

        <section>
            <?php
            require_once 'menu.php';
            ?>

            <div class="main-content" >

                <?php
                require_once 'toppati.php';
                require_once 'sellerpati.php';
                ?>

                <div class="wrapper">

                    
                    <div class="row">

  
                        <?php
                        $get=  mysql_query("select s.typename,d.durationtime,st.statename,c.cityname,a.areaname,ss.* from storetype s,duration d,state st,city c,area a,store ss where s.typeid=ss.typeid and d.durationid=ss.durationid and st.stateid=ss.stateid and c.cityid=ss.cityid and a.areaid=ss.areaid and active=1 and userid like '$_SESSION[user]'");
                        $row=  mysql_fetch_array($get);
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                       <div class="col-md-12">
                           <h5 class="profile">SELLER BUSINESS EDIT PROFILE</h5>
                            <div class="panel">
                                <div class="col-md-4">
                                    
                                        <?php
                                            echo  $up."<br>";
                                            ?>
                                </div>
                        <?php
                            
                            
                            echo $path1."<br>";
                            echo $path2."<br>";
                                
                               ?> 
                                <div class="panel-body">
                                    <div class="coverpic">
                                    
                                        <img class="img-rsponsive " id="cover" src="<?php echo $row[32]; ?>"  />
                                        
                                </div>
                                    <div class="sellerprofile-pic text-center uppicc"style="position:absolute" >
                                                <input type="file" name="updatepic"class="dpcontt" style="width:91%;" onchange="piccc(this);" />
                                            </div>
                                    <div class="profilepic text-center">
                                        
                                        <img class="img-rsponsive " id="picc" src="<?php echo $row[19]; ?>"  />
                                           <img class="img-rsponsive " id="picc1" src=""  />
                         
                                    </div>
                                    
                                    <div class="businessinfo col-md-12">
                                        
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label>Store Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="name" autofocus="" required="" value="<?php echo $row[9]; ?>" pattern="^[a-zA-Z@_- ]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Address</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="address" autofocus="" required="" value="<?php echo $row[13]; ?>" pattern="^[a-zA-Z,/_- ]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                            <div class="form-group">
                                                <label>Select State</label>
                                                <div class="input-group">
                                                    <select name="state" class="form-control" required="" >
                                                        <?php
                                                        $state = mysql_query("select * from state  where del=0  ");
                                                        while ($st = mysql_fetch_array($state)) {
                                                            if ($row[10] == $sst[0]) {
                                                                ?>
                                                                <option value="<?php echo $st[0]; ?>" selected="" style="text-transform: capitalize;"><?php echo $st[1]; ?></option>
                                                                    
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $st[0]; ?>"  style="text-transform: capitalize;"><?php echo $st[1]; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label>Select City</label>
                                                <div class="input-group">
                                                    <select name="city" class="form-control" required="">
<?php
$city = mysql_query("select * from city  where del=0 and stateid='$row[10]' ");
while ($cit = mysql_fetch_array($city)) {
    if ($row[11] == $ct[1]) {
        ?>
                                                                <option value="<?php echo $cit[1]; ?>" selected=""  style="text-transform: capitalize;"><?php echo $cit[2]; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $cit[1]; ?>"  style="text-transform: capitalize;"><?php echo $cit[2]; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label>Select Area</label>
                                                <div class="input-group">
                                                    <select name="area" class="form-control" required="">
<?php
$area = mysql_query("select * from area  where del=0 and cityid='$row[11]' ");
while ($aa = mysql_fetch_array($area)) {
    if ($row[12] == $aa[1]) {
        ?>
                                                                <option value="<?php echo $aa[1]; ?>" selected=""  style="text-transform: capitalize;"><?php echo $aa[2]; ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option value="<?php echo $aa[1]; ?>"  style="text-transform: capitalize;"><?php echo $aa[2]; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <input type="email" class="form-control" name="email" required="" value="<?php echo $row[15]; ?>"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Store map</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="storemap" required="" value="<?php echo $row[14]; ?>"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        
                                        <div class="col-md-6">
                                          
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="mobile" required="" maxlength="10" value="<?php echo $row[16]; ?>" pattern="^[0-9]{10}+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label>Website</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="website" required="" value="<?php echo $row[17]; ?>" pattern="^[a-zA-Z0-9/:.% ]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Time Duration</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="timeduration" required="" value="<?php echo $row[23]; ?>" pattern="^[a-z0-9: ]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Reg No.</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="regno" required="" value="<?php echo $row[24]; ?>" pattern="^[a-z0-9.- ]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Since</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="since" required=""value="<?php echo $row[26]; ?>" pattern="^[0-9]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="fax" required=""value="<?php echo $row[27]; ?>" pattern="^[0-9]+$"/>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label>Food Type</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="foodtype" required="">
                                                       
                                                            <?php
                                                    
                                                        if ($row[31]=="Veg")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $row[31]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>Veg</option>
                                                    <?php
                                                    }
                                                     if ($row[31]=="Nonveg")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $row[31]; ?></option>
                                                        <?php
                                                    }
                                                     else
                                                    {
                                                        ?>
                                                    <option>Nonveg</option>
                                                    <?php
                                                    }
                                                    if ($row[31]=="Mix")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $row[31]; ?></option>
                                                        <?php
                                                    }
                                                     else
                                                    {
                                                        ?>
                                                    <option>Mix</option>
                                                     <?php
                                                    }
                                                    ?>
                                                        
                                                    </select>
                                                    <div class="input-group-addon">
                                                        <i  class="fa fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                            </div>
                           <div class="container">
                               <button type="submit" name="send" class="btn btn-primary"><a href="#">Edit&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></a></button>
                          </div>
                        </div>
                             
        </div>
                        </form>
 </div>
                <div style="margin-top: 16%;">
                <?php
                 require_once 'footer.php';
                ?>
                </div>
        </section>


        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/jquery.nicescroll.js"></script>


        <script src="js/sparkline/jquery.sparkline.js"></script>
        <script src="js/sparkline/sparkline-init.js"></script>


        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;AMP;sensor=false"></script>



        <script src="js/scripts.js"></script>


    </body>


</html>
