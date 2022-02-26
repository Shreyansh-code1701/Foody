<?php
require_once 'connection.php';
require_once 'sellersecure.php';
?>
<?php

if(isset($_REQUEST[send]))
{
    
     if ($_SESSION[cap] != $_REQUEST[capcha]) 
    {
        $er2 = 1;
        
    }
   
    if (strlen($_FILES[storeimage][name]) > 0) {

        $name = $_FILES[storeimage][name];
        $ex = "." . substr($_FILES[storeimage][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") {
            if (round($siz = $_FILES[storeimage][size] / 1024) >= 0) {

                $get = mysql_query("select max(storeid) from store");

                $gett = mysql_fetch_array($get);

                if ($gett[0] == "") {
                    $name = "storeprofile_0" . $ex;
                } else {

                    $name = "storeprofile_" . $gett[0] . $ex;
                }

                $path1 = "profile/" . $name;

                $path2 = dirname(__FILE__) . "/" . $path1;
            } else {

                $er4 = 1;
            }
        } else {
            $er3 = 1;
        }
    }

    
    if (strlen($_FILES[visitingcard][name]) > 0) {

        $name = $_FILES[visitingcard][name];
        $ex = "." . substr($_FILES[visitingcard][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") {
            if (round($siz = $_FILES[visitingcard][size] / 1024) >= 0) {

                $get = mysql_query("select max(storeid) from store");

                $gett = mysql_fetch_array($get);

                if ($gett[0] == "") {
                    $name = "storevisiting_0" . $ex;
                } else {

                    $name = "storevisiting_" . $gett[0] . $ex;
                }

                $path1 = "visitingcard/" . $name;

                $path2 = dirname(__FILE__) . "/" . $path1;
            } else {

                $er6 = 1;
            }
        } else {
            $er5 = 1;
        }
    }
    
    
    if (strlen($_FILES[coverphoto][name]) > 0) {

        $name = $_FILES[coverphoto][name];
        $ex = "." . substr($_FILES[coverphoto][type], 6);

        if ($ex == ".png" || $ex == ".jpg" || $ex == ".jpeg" || $ex == ".PNG" || $ex == ".JPG" || $ex == ".JPEG") {
            if (round($siz = $_FILES[coverphoto][size] / 1024) >= 0) {

                $get = mysql_query("select max(storeid) from store");

                $gett = mysql_fetch_array($get);

                if ($gett[0] == "") {
                    $name = "storecover_0" . $ex;
                } else {

                    $name = "storecover_" . $gett[0] . $ex;
                }

                $path1 = "cover/" . $name;

                $path2 = dirname(__FILE__) . "/" . $path1;
            } else {

                $er8 = 1;
            }
        } else {
            $er7 = 1;
        }
    }
                       
  
  if($er2!=1 && $er3!= 1 && $er4!= 1 && $er5!= 1 && $er6!= 1&& $er7!= 1 && $er8!= 1)
    {
     
      $ins =mysql_query("insert into store values($_REQUEST[storetype],$_REQUEST[duration],'$_SESSION[user]',0,'$_REQUEST[name]',$_REQUEST[state],$_REQUEST[city],$_REQUEST[area],'$_REQUEST[address]','$_REQUEST[storemap]','$_REQUEST[email]','$_REQUEST[mobile]','$_REQUEST[website]','$path1','$path3',0,0,0,'$_REQUEST[timeduration]','$_REQUEST[registration]',0,'$_REQUEST[since]','$_REQUEST[fax]','$_REQUEST[regdate]','0000-00-00','0000-00-00','$_REQUEST[foodtype]','$path5')");
         
      
         $smx=mysql_query("select max(storeid) from store");
         $smxx=(mysql_fetch_array($smx));
         if(isset($_REQUEST[highlight]))
         {
                 foreach ($_REQUEST[highlight] as $val )
                 {
                     $hia=mysql_query("insert into  highlightassign values($val,$smxx[0],0,0)");
                 }
         }
       move_uploaded_file($_FILES[storeimage][tmp_name], $path2);
       move_uploaded_file($_FILES[visitingcard][tmp_name], $path4);
       move_uploaded_file($_FILES[coverphoto][tmp_name], $path6);
       
     header("location:packagebill.php");
       
     
   }  
                        
}

?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" onload="cap();">

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
                           <form action="" method="post" name="store" class="form-group" enctype="multipart/form-data" >
                        <div class="col-md-6">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="profile-pic text-center">
                                               <?php
                                                $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                                               $inn=  mysql_fetch_array($in);
                                               ?>
                                                <img src="../<?php echo $inn[12]; ?>" />
                                                <div class="text-center">
                                                   <?php
                            $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                 
                                    ?>
                                               <font>Welcome : <?php echo $inn[0]; ?></font>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-md-12" >
                                    <div class="panel" >
                                        <div class="panel-body" >
                                                  
                                                    <div class="form-group">
                                                    <label>Select Store Type</label>
                                                    <div class="input-group">
                                                        <select name="storetype" class="form-control" required="">
                                                            <option value="">--Select Store Type--</option>
                                                            <?php
                                                            $get = mysql_query("select * from storetype where del=0");
                                                            while ($row = mysql_fetch_array($get)) {
                                                                ?>
                                                                <option value="<?php echo $row[0]; ?>" style="text-transform: capitalize;"><?php echo $row[1]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                  <div class="form-group">
                                                    <label>Duration Time</label>
                                                    <div class="input-group">
                                                        <select name="duration" class="form-control" required="">
                                                            <option value="">--Select Duration Time--</option>
                                                            <?php
                                                            $get = mysql_query("select * from duration where del=0");
                                                            while ($row = mysql_fetch_array($get)) {
                                                                ?>
                                                                <option value="<?php echo $row[0]; ?>" style="text-transform: capitalize;"><?php echo $row[1]; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                   
                                                    <div class="form-group">
                                                        <label> Store Name</label><?php echo  $ins;   echo  $hia; ?>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="name" required="" pattern="^[a-z_- ]+$" placeholder="Enter Store Name"/>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Select State</label>
                                                        <div class="input-group">
                                                            <select name="state" class="form-control" required="" onchange="getcity('city',this.value);getcity('area', 0);">
                                                                <option  value="">--Select State--</option>
                                                                <?php
                                                                $get = mysql_query("select * from state  where del=0");
                                                                while ($row = mysql_fetch_array($get)) {
                                                                    ?>
                                                                    <option value="<?php echo $row[0]; ?>"  style="text-transform: capitalize;"><?php echo $row[1]; ?></option>
                                                                    <?php
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
                                                            <select name="city" class="form-control" required="" id="city"  onchange="getcity('area',this.value);">
                                                               
                                                            </select>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Area-</label>
                                                        <div class="input-group">
                                                            <select name="area" class="form-control"  required="" id="area" >
                                                               
                                                            </select>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <div class="input-group">

                                                            <textarea  rows="3"  class="form-control" title="Address" name="address" required="" pattern="^[a-zA-Z/-, ]+$" placeholder="Enter Address"></textarea>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Store Map</label>
                                                        <div class="input-group">

                                                            <textarea  rows="4"  class="form-control" title="store map" name="storemap"  frameborder="0" allowfullscreen required="" >https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.9643584744463!2d72.86207479997083!3d21.233261886073205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f3b4425c7c3%3A0x288e95a9756e83ca!2sRoyal+Square%2C+Uttran%2C+Surat%2C+Gujarat+394105!5e0!3m2!1sen!2sin!4v1455270089282</textarea>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <div class="input-group">
                                                            <input type="email" class="form-control"  name="email" required="" placeholder="Enter Email"/>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                        </div>
                                    </div>
                                </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-6">
                       <div class="row" >
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body p-states" style="padding-top: 55px;">
                                            <div class="summary pull-left">
                                                
                                                <div class="form-group">
                                                        <label>Mobile No</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"  name="mobile" maxlength="10"  required="" pattern="^[0-9]+$" placeholder="Enter Mobile No"/>
                                                            <div class="input-group-addon">
                                                                <i  class="fa fa-globe"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group">
                                                    <label>Web site</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="website"  required="" pattern="^[a-zA-Z0-9@.-_ ]+$" placeholder="Enter Website"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body" style="padding-top: 30px;">
                                            <ul class="p-info">
                                                <div class="form-group">
                                                    <label>Store Image</label>
                                                    <div class="input-group">
                                                        <input type="file" name="storeimage" required="" class="form-control" title="Store Image" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($er3 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid Profile</font>";
                                                    }
                                                    if ($er4 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                 
                                                 <div class="form-group">
                                                    <label>Visiting Card</label>
                                                    <div class="input-group">
                                                        <input type="file" name="visitingcard" required="" class="form-control" title="visitingcard" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if ($er5 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid visitingcard</font>";
                                                    }
                                                    if ($er6 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Time duration</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="timeduration" required=""  pattern="^[a-zA-Z0-9-:, ]+$" placeholder="Enter opening and closing time"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Goverment Registration</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="registration" required="" pattern="^[a-z_- ]+$" placeholder="Enter Registration"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                  
                                              
                                                <div class="form-group">
                                                    <label>Since</label>
                                                    <div class="input-group">
                                                        <input type="text" name="since" class="form-control" required="" pattern="^[0-9]+$" placeholder="Enter Since"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Fax No</label>
                                                    <div class="input-group">
                                                        <input type="text" name="fax" class="form-control"  required="" pattern="^[0-9 ]+$" placeholder="Enter Fax"/>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Reg Date</label>
                                                    <div class="input-group">
                                                        <input type="date" name="regdate" class="form-control"  required="" />
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    <div class="form-group">
                                                    <label>Food Type</label>
                                                    <div class="input-group">
                                                        <select name="foodtype" class="form-control" required="">
                                                            <option>--Food Type--</option>
                                                            <option value="veg">Veg</option>
                                                            <option value="nonveg" >Non Veg</option>
                                                            <option value="mix">MIX</option>
                                                           
                                                        </select>
                                                        <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                     <div class="form-group">
                                                    <label>Cover Photo</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" required="" name="coverphoto" title="Cover Photo" />
                                                    <div class="input-group-addon">
                                                            <i  class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                     <?php
                                                    if ($er7 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Invalid cover photo</font>";
                                                    }
                                                    if ($er8 == 1)
                                                    {
                                                        echo "<font style=color:red;font-size:12;>Maximum 5 MB Allow</font>";
                                                    }
                                                ?>
                                                </div>
                                                
                                                <div class="row">
                                                   <div class="form-group">
                                                    <label>&nbsp;&nbsp;&nbsp;High Light</label>
                                                    <div class="input-group">
                                                        <?php
                                                        $hh=mysql_query("select * from highlight where del=0");
                                                        while ($hhl = mysql_fetch_array($hh))
                                                        {
                                                        ?>
                                                        
                                                        <div class="col-md-12">
                                                            <font style="text-transform: capitalize;"><input type="checkbox" name="highlight[]" value="<?php echo $hhl[0]; ?>" />&nbsp;&nbsp;<?php echo $hhl[1]; ?></font><br/>
                                                        </div>
                                                         <?php
                                                           }
                                                         ?>
                                                    </div>
                                                </div>
                                                    
                                            <div class="col-md-5">
                                                <div  style="background: #f8a631;background-repeat: no-repeat;padding:2px; color:#fff;" name="dekocapcha" id="capcha">
                                                </div>

                                            </div>
                                            <div class="col-md-1 text-center" style="padding-top: 13px; margin-left: -3%;">
                                                <i class="fa fa-rotate-right refreshbtn"  onclick="cap();" ></i>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12" >
                                                <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" placeholder="Enter Capcha" name="capcha" required="" pattern="^[a-zA-Z0-9]+$" style="padding: 10px;" />
                                                <div class="input-group-addon regi">
                                                    <i class="fa fa-pencil "></i>
                                                </div>
                                            </div>
                                        </div>
                                                
                                                <?php
                                                if ($er2 == 1) {
                                                    echo '<font color=red size=2>not match..!</font>';
                                                }
                                                ?>
                                            </div>


                                        </div>
                                          
                                        </div>
                                    </div>
                                </div>
  
                            </div>
                       
                       <div class="container">
                        <button type="submit" name="send" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                   </div>
                    
                    </form>
                        
                </div>
                    
            </div>
                
                
                    <?php
                     require_once 'footer.php';
                    ?>

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

        <script>

           
            function initialize() {
                var myLatlng = new google.maps.LatLng(-37.815207, 144.963937);
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: 'Hello World!'
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>

    </body>

   
</html>






