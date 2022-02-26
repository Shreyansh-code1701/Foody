<?php
require_once 'connection.php';
require_once 'sellersecure.php';
?>
<script>
    noti('inquiryid');
</script>

<div class="header-section">

    <a class="toggle-btn"><i class="fa fa-bars"></i></a>

    <form class="searchform" action="http://adminex.themebucket.net/index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
    </form>

    <div class="menu-right">
        <ul class="notification-menu">
            <?php
             $in=  mysql_query("select count(*) from inquiry where notification=0");
          $i=  mysql_fetch_array($in);
            ?>
           
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" id="inquiryin"><?php echo $i[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right" id="inquiryid">
                    
                </div>
            </li>
           
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php
                    $in=mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=mysql_fetch_array($in);
                        ?>
                     <img src="../<?php echo $inn[12]; ?>" />
                     
                   <?php echo $_SESSION[user];?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="seller.php"><i class="fa fa-user"></i>  Profile</a></li>
                    <li><a href="editprofile.php"><i class="fa fa-cog"></i>  Settings</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>

        </ul>
    </div>

</div>

