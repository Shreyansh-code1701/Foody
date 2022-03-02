
<?php
require_once 'connection.php';

$_SESSION[page] = "contact";

if (isset($_REQUEST[sendcontact])) {
    $insert1=mysql_query("insert into contactstore values($_REQUEST[storeid],0,'$_REQUEST[name]','$_REQUEST[email]','$_REQUEST[subject]','$_REQUEST[sms]')");

  
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll" onload="misscon('misscontactstore',0);">

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
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">C</font><b style="color: #F8A631;">ONTACT</b>&nbsp; <font style="font-size:30px;">T</font><b style="color:#F8A631;">O</b>&nbsp;&nbsp;<font style="font-size:30px;">S</font><b style="color: #F8A631;">ELLER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>

            <div class="container " ><BR></br>
                 <form  action="" method="post" name="contact" class="form-group maru">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    
                    <div class="row">
                          
                         <?php
                                                            $contactstore=mysql_query("select * from store where del=0 and active=1");
                                                            
                                                        ?>
                                                        <select class="form-control combocap"  style="border: 2px dotted #f8a631;" name="storeid"  onchange="misscon('misscontactstore',this.value);">
                                                            <option value="0">--Select Store--</option>
                                                            <?php
                                                                while($fetcontact=  mysql_fetch_array($contactstore))
                                                                {
                                                             ?>
                                                            <option value="<?php echo $fetcontact[3]; ?>"><?php echo $fetcontact[4]; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select> 
                    </div>
                    <br>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12" id="misscontactstore" >
                   
                </div>
                 </form>
            </div>





            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>