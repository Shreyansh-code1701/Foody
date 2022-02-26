<?php
  require_once 'connection.php';
require_once 'sellersecure.php';
?>
<div class="left-side sticky-left-side">


        <div class=" logo col-md-12">
            <a href="../index.php"><img src="../images/tablogo.png" alt="" width="30%" class="img img-responsive text-center"/></a>
        </div>

        <div class="logo-icon text-center">
            <a href="../index.php"><img src="../images/about.png" alt="" class="img img-responsive"/></a>
        </div>


        <div class="left-side-inner">


            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <?php
                    $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                        ?>
                     <img src="<?php echo $inn[12]; ?>" width="30%"/>
                    <div class="media-body">
                        <h4><a href="#"><?php echo $_SESSION[user]; ?> </a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>
<ul class="nav nav-pills nav-stacked custom-nav">
                      <li class="menu-list"><a href="#"><i class="fa fa-map-marker"></i> <span>Account Information</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                        <li><a href="editprofile.php"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                    </ul>
                  
                 
                </ul>
               
             
            </div>

            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                </li>
                   
                <li class="menu-list"><a href="#"><i class="fa  fa-briefcase"></i> <span>Business</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="store.php"> Post Store</a></li>
                        <li><a href="additem.php">Add Items</a></li>
                        <li><a href="postbanner.php"> Post Banner</a></li>
                        <li><a href="manageoffer.php"> Post Offer</a></li>
                        
                    </ul>
                </li>
                
                <li><a href="viewpackagebill.php"><i class="fa  fa-money"></i><span> View Package Bill </span></a></li>
                
                <li><a href="viewbannerbill.php"><i class="fa  fa-money"></i><span> View Banner Bill </span></a></li>
                
                <li><a href="addcusine.php"><i class="fa  fa-cutlery"></i><span> Include Cuisine </span></a></li>
                
                <li><a href="addevent.php"><i class="fa  fa-cutlery"></i> <span> Include Event </span></a></li>
                
                 <li><a href="managebrochure.php"><i class="fa  fa-cogs"></i> <span>Add Brochure</span></a></li>
                
                 <li><a href="managecontact.php"><i class="fa  fa-cogs"></i> <span>Manage Contact</span></a></li>
                 
                 <li><a href="managefeedback.php"><i class="fa  fa-cogs"></i> <span>Manage Feedback</span></a></li>
                 
                 <li><a href="manageeventprice.php"><i class="fa  fa-cogs"></i> <span>Manage Event Price</span></a></li>
                 
                 <li><a href="sellerpackmis.php"><i class="fa  fa-cogs"></i> <span>Store Pack MIS</span></a></li>
                 
                 <li><a href="sellerbannermis.php"><i class="fa  fa-cogs"></i> <span>Store Banner MIS</span></a></li>
                
                <li><a href="businessprofile.php"><i class="fa  fa-cutlery"></i><span>Business Profile</span></a></li>
                
                <li><a href="businesseditprofile.php"><i class="fa  fa-cutlery"></i><span>Business Edit Profile</span></a></li>
               
                <li><a href="allbill.php"><i class="fa  fa-cutlery"></i><span>User Bill</span></a></li>
                
                <li><a href="manageusermis.php"><i class="fa  fa-cutlery"></i><span>Manag Transaction</span></a></li>
                
                <li><a href="manageinquiry.php"><i class="fa  fa-cutlery"></i><span>Manage Inquiry</span></a></li>
                
                <li><a href="manageeventbook.php"><i class="fa  fa-cutlery"></i><span>Manage Event Book</span></a></li>
                 
               

            </ul>

        </div>
    </div>