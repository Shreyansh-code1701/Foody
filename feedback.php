<?php
require_once 'conection.php';

$_SESSION[page] = "feedback";

if (isset($_REQUEST[send])) {
    $insert = mysql_query("insert into feedback values(0,'$_REQUEST[name]','$_REQUEST[email]','$_REQUEST[subject]','$_REQUEST[sms]',0)");
}
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
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">F</font><b style="color: #F8A631;">EEDBACK</b>&nbsp; <font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>

            <div class="container " ><BR></br>

                <div class="row">
                    <div class="col-md-6">
                        <img src="images/feed.png" style="max-width:80%; margin-top:20%;" class="img img-responsive animated  bounceInLeft"/>
                        <li class="contactstore" style="list-style: none; "><a href="feedbackstore.php"><font style="padding-left: 90px;">Feed Back To Store ?</font></a></li>
                    </div>
                    <div class="col-md-6">
                        <div class="row ht-widget hw-popular-categories" >
                            <h3 class="widget-title" style="font-size: 15px;">SEND YOUR FEEDBACK</h3>
                        </div>
                        <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;<font >If You Satisfy a website and give me feedback. </font><br><br>
                        <div class="row">
                            <form  action="" method="post" name="contact" class="form-group maru"  >
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" placeholder="Name" style="padding: 20px;" required=""  pattern='^[a-zA-Z ]+$'  class="form-control "  />

                                </div>
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon " style="background:#f8a631;"><i class="fa fa-envelope-o"></i></div>
                                    <input type="email" name="email" style="padding: 20px;" placeholder="Email" class="form-control"  />

                                </div>
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon " style="background:#f8a631;"><i class="fa fa-list-alt"></i></div>
                                    <input type="text" name="subject" style="padding: 20px;" placeholder="Subject" required=""  pattern='^[a-zA-Z ]+$'    class="form-control"  />

                                </div>
                                <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                    <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-keyboard-o"></i></div>
                                    <textarea  class="form-control"  rows="5" name="sms" placeholder="Sms" required=""  ></textarea>

                                </div>

                                <div class="co-md-12 text-center" >
                                    <button type="submit" name="send" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                    <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>





        <?php
        require_once 'footer.php';
        ?>

    </div>


</body>


</html>