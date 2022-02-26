
<?php
require_once 'conection.php';

require_once 'PHPMailerAutoload.php';    
    //sendmail("v.savani5@gmail.com", "university", "bas am j");
    
    function sendmail($email,$sms,$subject)
    {
  
        $mail = new PHPMailer;

        $mail->isSMTP();

        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "savaniramani@gmail.com";

        //Password to use for SMTP authentication
        $mail->Password = "vk232010188111995";

        //Set who the message is to be sent from
        $mail->setFrom('savaniramani@gmail.com', 'foodlocker');

        //Set an alternative reply-to address
        $mail->addReplyTo('savaniramani@gmail.com', 'foodlocker');

        //Set who the message is to be sent to
        $mail->addAddress($email, 'foodlocker');

        //Set the subject line
        $mail->Subject = $subject;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $message=$sms;
        $mail->msgHTML($message, dirname(__FILE__));

        //Replace the plain text body with one created manually
        $mail->AltBody = 'foodlocker';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) 
        {
            $done=1;
            echo "Mailer Error: " . $mail->ErrorInfo;
        } 
        else
        {
            $done=2;
            //echo "Message sent!";
        }
        //echo $done;
    }


if(isset($_REQUEST[sendforget]))
{
    $g=mysql_query("select * from user where userid like '$_REQUEST[user]'");
    $gg=mysql_fetch_array($g);
    
    if($gg[8]=="")
    {
        if($gg[10]==$_REQUEST[sqq])
        {
            $err1=1;
        }
        
        if($gg[11]==$_REQUEST[ans])
        {
            $err2=1;
        }
    }
    else
    {
        $er=1;
    }
    
    
    if($er1!=1 && $err1!=1 && $err2!=1)
    {
        $email=$gg[6];
        sendmail("$email",'Your Forget Password Is :'.$gg[9]);
    }
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
                
            <div class="container " ><BR></br>

                <div class="row ">
                
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center ">
                        <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">F</font><b style="color: #F8A631;">ORGOT</b>&nbsp;<font style="font-size:30px;">P</font><b style="color: #F8A631;">ASSWORD</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                    </div>
                       
                    <br/><br/><br/>
                    <div class="col-md-offset-4 col-md-4">
                        <form action="" method="post" name="forgotpassword">

                            <div class="form-group">    
                                <div class="input-group">
                                    <input type="text" name="user" placeholder="Enter Your Userid" style="padding: 15px;"  required=""  pattern='^[a-zA-Z ]+$'  class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>
               
                            <?php
                                            $in = mysql_query("select * from user where userid like '$_SESSION[user]' ");
                                            $inn = mysql_fetch_array($in);
                                            ?>
                            
                            <div class="form-group">
                                            <div class="input-group">
                                                <select name="sqq" class="form-control" required="" >
                                                    <option value="" style="text-transform: capitalize;">--Select Question--</option>
 <?php
                                                    
                                                        if ($inn[10]=="What is your favorite color ?")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>What is your favorite color ?</option>
                                                    <?php
                                                    }
                                                     if ($inn[10]=="What was the make and model of your first car ?")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>What was the make and model of your first car ?</option>
                                                    <?php
                                                    }
                                                    
                                                     if ($inn[10]=="What was the name of elementary / primary school ?")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>What was the name of elementary / primary school ?</option>
                                                    <?php
                                                    }
                                                    if ($inn[10]=="What is your pets name ?")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>What is your pets name ?</option>
                                                    <?php
                                                    }
                                                    
                                                    if ($inn[10]=="In what country where you born ?")
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>In what country where you born ?</option>
                                                    <?php
                                                    }
                                                     if ($inn[10]=='What is your favorite food ?')
                                                        {
                                                        ?>
                                                    <option  selected=""  style="text-transform: capitalize;"><?php echo $inn[10]; ?></option>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <option>What is your favorite food ?</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="input-group-addon regi">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                            </div>
                                        </div>
                            
                             <div class="form-group">    
                                <div class="input-group">
                                    <input type="text" name="ans" placeholder="Enter Your Ans" style="padding: 15px;"  required=""  pattern='^[a-zA-Z ]+$'  class="form-control"/>
                                    <div class="input-group-addon regi">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="co-md-12 text-center" >
                                        <button type="submit" name="sendforget" class="btn sendbtn">Send &nbsp;&nbsp;<i  class="fa fa-rocket"></i></button>
                                        <button type="reset" class="btn sendbtn">Reset &nbsp;&nbsp;<i class="fa fa-trash-o"></i></button>
                                    </div>

                        </form>

                    </div>
                    
                </div>
          
            </div><br>





            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>
