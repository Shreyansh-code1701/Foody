<?php
require_once 'connection.php';
if($_SESSION[user]=="")
{
    header("location:registration.php");
}
$_SESSION[page] = "feedback";

if (isset($_REQUEST[send])) 
    {
         $insert =mysql_query("insert into feedbackstore values($_REQUEST[storeid],0,'$_REQUEST[name]','$_REQUEST[sms]')");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="misscon('missfeedbackstore',0);">

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
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">F</font><b style="color: #F8A631;">EEDBACK</b>&nbsp; <font style="font-size:30px;">S</font><b style="color:#F8A631;">T<i class="fa fa-circle" ></i>RE</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>

            <div class="container " ><BR></br>
                 <form  action="" method="post" name="feedbackstore" class="form-group maru"  >
        <div class="col-md-4 col-sm-12 col-xs-12">
                    
                    <div class="row">
                          
                         <?php
                                                            $feedbackstore=mysql_query("select * from store where del=0 and active=1");
                                                            
                                                        ?>
                        <select class="form-control combocap" style="border: 2px dotted #f8a631;" name="storeid"  onchange="misscon('missfeedbackstore',this.value);">
                                                            <option value="0">--Select Store--</option>
                                                            <?php
                                                                while($feedstore=  mysql_fetch_array($feedbackstore))
                                                                {
                                                             ?>
                                                            <option value="<?php echo $feedstore[3]; ?>"><?php echo $feedstore[4]; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select> 
                    </div>
                    <br>
                </div>
                <br></br>
                <div class="col-md-12 col-sm-12 col-xs-12"  >
                    
                    <div id="missfeedbackstore">
                        
                    </div>
                   
                </div>
                 </form>
            </div>
        </div>





        <?php
        require_once 'footer.php';
        ?>

    </div>


</body>


</html>