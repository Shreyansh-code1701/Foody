<?php
require_once 'conection.php';
?>
<header id="ht-header" class="">
    <div class="mobile-control-toggle">
        <div class="container">
            <button type="button" class="mobile-nav-toggle" data-target="#menu-list">
                <span class="sr-only">Toggle mobile menu</span>
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
            </button>
        </div>
    </div>

    <div class="mobile-nav">
        <form class="ht-search-form" action="#">
            <input type="text" placeholder="Type keyword ..." class=""/>
            <button type="button" class="ht-search-form-toggle">
                <span class="sr-only">Toggle search</span>
                <i class="fa fa-search"></i>
            </button>
        </form>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li class="mega-menu menu-item-has-children">
                <i class="sub-menu-toggle fa fa-chevron-down"></i>
                <a href="cuisine.php">CUISINE</a>
                <ul>
                    <li class="menu-item-has-children">
                        <i class="sub-menu-toggle fa fa-chevron-down"></i>
                        <a href="#"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;SOUTH INDIAN</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-book"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-bullhorn"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-coffee"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Menu level 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <i class="sub-menu-toggle fa fa-chevron-down"></i>
                        <a href="#"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;PUNJABI</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-book"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-bullhorn"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-coffee"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Menu level 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <i class="sub-menu-toggle fa fa-chevron-down"></i>
                        <a href="#"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;CHINES</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-book"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-bullhorn"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-coffee"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Menu level 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <i class="sub-menu-toggle fa fa-chevron-down"></i>
                        <a href="#"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;ITALIAN</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-book"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-bullhorn"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-coffee"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Menu level 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <i class="sub-menu-toggle fa fa-chevron-down"></i>
                        <a href="#"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;ICE-CREAM</a>
                        <ul>
                            <li><a href="#"><i class="fa fa-book"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-bullhorn"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-coffee"></i> Menu level 3</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Menu level 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="event.php">EVENT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="policy.php">POLICY</a></li>
            <li><a href="sitemap.php">SITE MAP</a></li>
    </div>

  

    <div class="ht-main-navbar logo-center sticky-nav scroll-up-nav">
        <div class="container">
            <div class="inner">
                <h1 id="ht-logo">
                    <a href="index.php">
                        <img src="images/foodlocker.png" alt="" style="width: 15%;padding-top: 6px;"/>
                    </a>

                </h1>

                <div class="ht-main-nav-wrapper">
                    <nav id="ht-main-nav">
                        <ul>
                            <?php
                            if ($_SESSION[page] == "index") {
                                ?>
                                <li><a href="index.php" class="activemenu" >HOME</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="index.php" >HOME</a></li>
                                <?php
                            }
                            ?>
                            <li class="mega-menu menu-item-has-children">
                                <?php
                                if ($_SESSION[page] == "cuisine") {
                                    ?>
                                    <a href="#" class="ero activemenu">CUISINE&nbsp;<i class="fa fa-caret-down"></i></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#" class="ero">CUISINE&nbsp;<i class="fa fa-caret-down"></i></a>
                                    <?php
                                }
                                ?>
                                <ul>

                                    <li class="menu-item-has-children">
                                       
                                        <ul>
                                            <?php $cs=  mysql_query("select * from maincategory where del=0 limit 0,4");
 while ($ro = mysql_fetch_array($cs)) 
     {                                       ?>
                                            <li style="text-transform: capitalize;"><a href="filter.php?search=<?php echo $ro[1]; ?> "><font class="submenu" style="color: #232323;"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; <?php echo $ro[1]; ?></font></a></li>
                                         <?php
     }
                                         ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <ul>
                                            <?php $cs=  mysql_query("select * from maincategory where del=0 limit 4,4");
 while ($ro1 = mysql_fetch_array($cs)) 
     {                                       ?>
                                            <li style="text-transform: capitalize;"><a href="filter.php?search=<?php echo $ro1[1]; ?> "><font class="submenu" style="color: #232323;"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; <?php echo $ro1[1]; ?></font></a></li>
                                         <?php
     }
                                         ?>
                                        </ul>
                                    </li>
                                    
                                    <li class="menu-item-has-children">
                                        <ul>
                                            <?php $cs=  mysql_query("select * from maincategory where del=0 limit 8,4");
 while ($ro1 = mysql_fetch_array($cs)) 
     {                                       ?>
                                            <li style="text-transform: capitalize;"><a href="filter.php?search=<?php echo $ro1[1]; ?> "><font class="submenu" style="color: #232323;"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; <?php echo $ro1[1]; ?></font></a></li>
                                         <?php
     }
                                         ?>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <ul>
                                            <?php $cs=  mysql_query("select * from maincategory where del=0 limit 12,4");
 while ($ro1 = mysql_fetch_array($cs)) 
     {                                       ?>
                                            <li style="text-transform: capitalize;"><a href="filter.php?search=<?php echo $ro1[1]; ?> "><font class="submenu" style="color: #232323;"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; <?php echo $ro1[1]; ?></font></a></li>
                                         <?php
     }
                                         ?>
                                        </ul>
                                    </li>
                                    
                                    
                                    <li class="menu-item-has-children">
                                        <ul>
                                            <?php $cs=  mysql_query("select * from store where del=0 limit 0,4");
 while ($ro1 = mysql_fetch_array($cs)) 
     {                                       ?>
                                            <li style="text-transform: capitalize;"><a href="index.php?search=<?php echo $ro1[4]; ?> "><font class="submenu" style="color: #232323;"><i class="fa fa-cutlery"></i>&nbsp;&nbsp; <?php echo $ro1[4]; ?></font></a></li>
                                         <?php
     }
                                         ?>
                                        </ul>
                                    </li>
                                    
                                    
                                    
                                    
                                    
                                    
                                </ul>
                            </li>

                             <?php
                            if ($_SESSION[page] == "food") {
                                ?>
                                <li><a href="filter.php" class="blog activemenu">FOOD</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="filter.php">FOOD</a></li>
                                <?php
                            }
                            ?>
                            
                            <?php
                            if ($_SESSION[page] == "restaurant") {
                                ?>
                                <li><a href="restaurant.php" class="activemenu">RESTAURANT</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="restaurant.php" >RESTAURANT</a></li>
                                <?php
                            }
                            ?>
                                 <?php
if ($_SESSION[page] == "bestseller") {
    ?>

                                <li><a href="bestseller.php" class="activemenu">BEST SELLER</a></li>
    <?php
} else {
    ?>
                                <li><a href="bestseller.php">BEST SELLER</a></li>
                                <?php
                            }
                            ?>


                        </ul>
                        <ul>
                            <?php
                            if ($_SESSION[page] == "contact") {
                                ?>
                                <li><a href="contact.php" class="activemenu">CONTACT</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="contact.php" >CONTACT</a></li>
                                <?php
                            }
                            ?>
                            
                            <?php
                            if ($_SESSION[page] == "feedback") {
                                ?>
                                <li><a href="feedback.php" class="activemenu">FEEDBACK</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="feedback.php">FEEDBACK</a></li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION[page] == "about") {
                                ?>
                                <li><a href="about.php" class="activemenu">ABOUT</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="about.php">ABOUT</a></li>
                                <?php
                            }
                            ?>

                             
  
             
<?php
if ($_SESSION[page] == "services") {
    ?>

                                <li><a href="services.php" class="activemenu">SERVICES</a></li>
    <?php
} else {
    ?>
                                <li><a href="services.php">SERVICES</a></li>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION[page] == "sitemap") {
                                ?>
                                <li><a href="sitemap.php" class="activemenu">SITE MAP</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="sitemap.php">SITE MAP</a></li>
                                <?php
                            }
                            ?>



                        </ul>
                    </nav>

                </div>

            </div>

        </div>

        <button type="button" class="search-toggle" onclick="searchbox('open');">
            <span class="inner">
                <i class="fa fa-search"></i>
            </span>
        </button>

    </div>

</header>

<!--search bar-->

<div id="search" >
    <div class="cl">
        <i class="fa fa-times" onclick="searchbox('close');" title="Close"></i>
    </div>
    <div class="row">
        <form action="filter.php" method="post" name="searchform"  >
            
            <div class="col-md-offset-1 col-md-10 " style="margin-top: 15%;">
                <h1 class="text-center" style="color: #f8a631; font-weight: 600;">Enter Your Address To Find Your Local Restaurants</h1><br></br>
                <div class="col-md-4 search-select ">
                    <select  required="" name="state"   class="form-control" id="searchstate" onchange="getcity('searchcity',this.value);getcity('searcharea', 0)">
                        <option value="" style="color: #f8a631;">-Select  State-</option>
                            <?php
                            $state = mysql_query("select * from state where del=0");
                            while ($row = mysql_fetch_array($state)) {
                                ?>

                                <option value="<?php echo $row[0]; ?>" style="color: #f8a631;"><?php echo $row[1]; ?></option>
                                <?php
                            }
                            ?>

                        </select>
                </div>
                <div class="col-md-4 search-select">
                    <select name="city" id="searchcity" onchange="getcity('searcharea',this.value);">
                        <option style="color: #f8a631;">--Select City--</option>
                    </select>
                </div>
                <div class="col-md-4 search-select">
                    <select name="area" id="searcharea">
                        <option style="color: #f8a631;">--Select Area--</option>
                    </select>
                </div>
                <div class="col-md-offset-2 col-md-8" >
                    <input type="text" name="search" id="keyword" placeholder="Search Your Keyword..." style="margin-top: 5%; padding: 10px; border: 1px solid #F8A631; color: #fff;height: 20%;" />
                </div>
                <div class="col-md-12 text-center" style="margin-top: 1%;">
                    <button type="submit" name="mainsearch" class="searchbtn ">SEARCH&nbsp;&nbsp;<i class="fa fa-search"></i>
                    </button>
                </div>
              
            </div>

        </form>

    </div>

</div>
