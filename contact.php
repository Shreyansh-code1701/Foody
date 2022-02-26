
<?php
require_once 'conection.php';

$_SESSION[page] = "contact";

if (isset($_REQUEST[send])) {
    $insert = mysql_query("insert into contactus values(0,'$_REQUEST[name]','$_REQUEST[email]',$_REQUEST[mobile],'$_REQUEST[message]')");
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
                        <div class="col-md-12 col-sm-12 col-xs- text-center " >
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">C</font><b style="color: #F8A631;">ONTACT</b>&nbsp; <font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>

            <div class="container " ><BR></br>

                <div class="col-md-12 col-sm-12 col-xs-12" >
                    <div class="row" >
                        <div class="container-fuild ht-widget hw-popular-categories" >
                            <h3  class="contactline"style="font-size: 15px;  ">OVER LOCATION</h3>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.9643584744463!2d72.86207479997083!3d21.233261886073205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f3b4425c7c3%3A0x288e95a9756e83ca!2sRoyal+Square%2C+Uttran%2C+Surat%2C+Gujarat+394105!5e0!3m2!1sen!2sin!4v1455270089282" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-7 ht-widget hw-popular-categories" >
                            <h3 class="contactline" style="font-size: 15px; width: 25%;">CREATE CONTACT</h3>
                            <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;<font >contact people with the best restaurants around them.</font><br><br>
                            <div class="row">
                                <form  action="" method="post" name="contact" class="form-group maru">
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="text" name="name" placeholder="Name" style="padding: 20px;" required=""  pattern='^[a-zA-Z ]+$'  class="form-control "  />
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user"></i></div>
                                    </div>  
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="email" name="email" placeholder="Email" style="padding: 20px;" required=""   class="form-control" /> 
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-envelope"></i></div>
                                    </div>
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <input type="text" name="mobile" placeholder="Mobile" style="padding: 20px;"  required=""  maxlength="10" pattern='^[0-9]{10}$'    class="form-control"  />
                                        <div class="input-group-addon " style="background:#f8a631;"><i class="fa fa-phone"></i></div>
                                    </div>
                                    <div class="col-md-12 input-group" style="margin-bottom: 3%;">
                                        <textarea  class="form-control"  rows="5" name="message" placeholder="Message" required=""  ></textarea>
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-pencil"></i></div>
                                    </div>
                                    <div class="co-md-12 text-center" >
                                        <button type="submit" name="send" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                        <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=" col-md-offset-1 col-md-4 ht-widget hw-popular-categories">
                            <h3 class="contactline" style="font-size: 15px; width: 36%;">CONTACT INFO</h3>
                            <ul style="display: inline;" >
                                <li style="list-style: none; margin-top: 12%;"> <i class="fa fa-map-marker"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>348,Royal Square,VIP cercle,Utran-Kapodara Road, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat. </font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-mobile-phone"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>7874259262 , 8758722336</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-envelope"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>foodlocker111@gmail.com</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-facebook"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>www.foodlocker/Facebook</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-twitter"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>www.foodlocker/Twitter</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-google-plus"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>www.foodlocker/Google</font></li>
                                <li style="list-style: none; margin-top: 7%;"><i class="fa fa-instagram"style="color: #f8a631; font-size: 16px; "></i>&nbsp;&nbsp;&nbsp;<font>www.foodlocker/Instagram</font></li>
                                <li class="contactstore"><a href="contacttostore.php"><font style="padding-left: 30px;">Contact To Store ?</font></a></li>
                            </ul>
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