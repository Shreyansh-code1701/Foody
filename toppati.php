

<div class=" loginpage" id="loginpage">
    <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 loginkule"  >
                    <div class="loginweb row">
                        <font style="color:#333;font-weight: 600;font-size: 16px;" >
                        Login
                        </font>
                       
                           
                        <font id="error"  style="padding-left: 120px;">
                        </font>
                            
                        <i class="fa fa-times" onclick="loginbox('close')"></i>
                    </div>
                    <div class="row"  style="background: #fff;border-bottom: 10px solid #f8a631;">
                        
                        
                        <form action="" method="post" name="login" class="maru" id="login">

                            <div class="col-md-offset-1 col-md-10" style="margin-top:   5%;margin-bottom: 5%;">    
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="text" name="user" id="user" placeholder="Enter Your Userid" value="<?php echo $_COOKIE[cookuser]; ?>" autofocus="" required=""  pattern='^[a-zA-Z0-9@_-. ]+$'    class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;"><i class="fa fa-user-plus    "></i></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 input-group" >
                                        <input type="password" name="pass" id="password" placeholder="**********" value="<?php echo $_COOKIE[cookpass]; ?>" required=""  pattern='^[a-zA-Z0-9-,/?()*&%$#! ]{5,20}+$'    class="form-control " /> 
                                        <div class="input-group-addon" style="background:#f8a631;" title="Show Password" id="showpass">
                                            <i class="fa fa-lightbulb-o" title="Show Password" id="showpass"  style="padding:0px 4.5px 0px 4.5px;;"></i>
                                        </div>
                                    </div>
                                </div>                               
                                <div class="row">
                                    <div class="col-md-6" >
                                        <input type="checkbox" name="remember"/> <font>Remember me</font>
                                    </div>

                                    <div class="col-md-6">
                                        <a href="forgotpassword.php"><font>Forgot Password...?</font></a>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center  input-group text-center">
                                     <button type="button" name="login" title="Send" class="btn loginbtn" onclick="loginerr();" style="outline: 0;">Send &nbsp;&nbsp;<i class="fa fa-rocket" ></i></button>&nbsp;&nbsp;
                                    <button type="reset" title="clear" name="clear"class="btn loginbtn" style="outline: 0;">Reset &nbsp;&nbsp;<i class="fa fa-trash-o" ></i></button>
                                </div>
                            </div>

                        </form>
                        
                      
                   
                        <div class="col-md-12">
                            <font class="note">NOTE : If you have entered wrong User Id or Password continue 2 times then you will blocked for 5 minutes. You can't login upto 5 minutes.</font>
                        
                        </div>
                        
                        
                    </div>
                        
                </div>
            </div>



<div class="row toppati" style="margin: 0px;">
    <div class=" col-md-3 col-sm-12 col-xs-12  hidden-xs" style="margin-top: 0.5%;">
        <i class="fa fa-envelope" ></i><font title="Email Address">&nbsp;foodlocker111@gmail.com</font>&nbsp;&nbsp;
        <i class="fa fa-mobile" style="font-size: 17px;"></i><font title="Tollfree no">&nbsp;1800 -123- 456</font>
    </div>
    <div class=" col-md-3 col-sm-12 col-xs-12 ">
        <div id="google_translate_element"></div><script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
   
        
    </div>
    
    <div class=" col-md-offset-1 col-md-2  col-sm-12 col-xs-12 follow " style="margin-top: 0.5%;">
        <a href="https://www.facebook.com/" target="_blank" title="facebook"><i class="fa fa-facebook " ></i></a>
        <a href="https://www.twitter.com/" target="_blank" title="twitter"><i class="fa fa-twitter" ></i></a>
        <a href="https://www.instagram.com/" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a>
        <a href="https://www.google-plus.com/" target="_blank"  title="google-plus"><i class="fa fa-google-plus" ></i></a>
        <a href="https://www.linkedin.com/" target="_blank" title="linkedin"><i class="fa fa-linkedin" ></i></a>
    </div>
    <div class=" col-md-3 col-sm-12 col-xs-12" style="margin-top: 0.5%;">
        <?php
        if($_SESSION[user]!="")
        {
        ?>
         <a href="myaccount.php"><i class="fa fa-user "></i>&nbsp;&nbsp;My Account</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php"><i class="fa fa-power-off "></i>&nbsp;&nbsp;Sign out</a>
        <?php
        }
        else
        {
         ?>
        <a href="registration.php"><i class="fa fa-user-plus "></i>&nbsp;&nbsp;Create Account</a>&nbsp;&nbsp;<font style="color:#232323;">OR</font>&nbsp;&nbsp;
        <a href="#" onclick="loginbox('open');" id="showlogin"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign In</a>
        <?php
        }
         ?>
    </div>
</div>
