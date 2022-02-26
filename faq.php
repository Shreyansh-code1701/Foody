<?php
require_once 'conection.php';

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>
    <script type="text/javascript">
       
        $(document).ready(function(){
            
            $('#hide').hide();
            $('#show').click(function(){
                $('#hide').slideToggle(250);
            });
                
            
        });
        
         $(document).ready(function(){
            
            $('#hide1').hide();
            $('#show1').click(function(){
                $('#hide').slideToggle(500);
                $('#hide1').slideToggle(250);
            });
                
            
        });
        
        $(document).ready(function(){
            
            $('#hide2').hide();
            $('#show2').click(function(){
                $('#hide1').slideToggle(500);
                $('#hide2').slideToggle(250);
            });
                
            
        });
        
        $(document).ready(function(){
            
            $('#hide3').hide();
            $('#show3').click(function(){
                $('#hide2').slideToggle(250);
                $('#hide3').slideToggle(250);
            });
                
            
        });
        
            $(document).ready(function(){
            
            $('#hide4').hide();
            $('#show4').click(function(){
                $('#hide3').slideToggle(250);
                $('#hide4').slideToggle(250);
            });
            
              });
              
             $(document).ready(function(){
            
            $('#hide5').hide();
            $('#show5').click(function(){
                $('#hide4').slideToggle(250);
                $('#hide5').slideToggle(250);
            });
                
                  });
                
            $(document).ready(function(){
            
            $('#hide6').hide();
            $('#show6').click(function(){
                $('#hide5').slideToggle(250);
                $('#hide6').slideToggle(250);
            });
            
              });
            
             $(document).ready(function(){
            
            $('#hide7').hide();
            $('#show7').click(function(){
                $('#hide6').slideToggle(250);
                $('#hide7').slideToggle(250);
            });
            
            
        });
       
    </script>

    <body class="smooth-scroll">

        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            ?>
            <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg');">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs- text-center " >
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">F</font><b style="color: #F8A631;">AQ</b>&nbsp; <font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>
            <div class="myline"></div>
            
            <div class="container" style="margin-top: 6%;">
                
            </div>
            <div class="container">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show">
                    <font style="font-size:15px; color:#F8A631;"> Where is my order ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;After you place your order, we send it directly to the restaurant, which starts preparing it immediately.<br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Our restaurants do everything they can to get your food delivered as quickly as possible. However, sometimes restaurants receive very large amount of orders,
                    or drivers get stuck in heavy traffic - this unfortunately might cause delays.<br></br>
                     <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;if the amount of time you've wanted has exceeded the estimated delivery time, you can contact us and we'll look into what's going on.
                </div>
            </div>
            
            <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show1">
                    <font style="font-size:15px; color:#F8A631;">How to order online at Food Locker ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide2">
                    <i class="fa fa-star "></i>&nbsp;&nbsp;&nbsp; It is really easy, as easy as 1, 2, 3:<br>
                                                <br/>
                                                <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;1. Tell us where you are: Enter your location so that we can show you which restaurants deliver to you.<br/><br/>
                                                <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;2. Choose what you would like: Pick a restaurant and select items youd like to order. You can search by restaurant name, cuisine type, dish name or by keyword.<br/><br/>
<i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;3. Checkout: Enter your exact delivery address, payment method and your phone number. Always make sure that you enter the correct phone number to help us contact you regarding your order, if needed.

                                                Now sit back, relax, and well get your food delivered to your doorstep.<br></br>
                   
                    
                </div>
            </div> 
            
            <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" >
                    <font style="font-size:15px; color:#F8A631;">What are the delivery costs ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;" id="show2"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide2">
                   <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp; Delivery costs, just like delivery time, are determined by restaurants individually. Usually the ones closest to you will charge a small delivery fee. <br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;If a delivery driver has to travel a long way, they may charge a little extra for the service. <br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;There are many restaurants offering free delivery as well. You can easily check the delivery cost for each restaurant whilst browsing our website.<br>
                </div>
            </div> 
            
            <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show3">
                    <font style="font-size:15px; color:#F8A631;">How long does it take for my order to get delivered ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide3">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;  Delivery time varies from restaurant to restaurant. It also depends on the number of orders that the restaurant has to prepare and on the distance between the restaurant and your delivery address.<br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;You can see the estimated delivery time for each restaurant in your area on our website. After placing an order, a more precise delivery time will be communicated to you by SMS.<br></br>
                </div>
            </div> 
            
             <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show4" >
                    <font style="font-size:15px; color:#F8A631;"> I have a voucher code. how can i use it ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide4">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Vocher After you place your order, we send it directly to the restaurant, which starts preparing it immediately.<br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Our restaurants do everything they can to get your food delivered as quickly as possible. However, sometimes restaurants receive very large amount of orders, or drivers get stuck in heavy traffic - this unfortunately might cause delays. <br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;if the amount of time you've wanted has exceeded the estimated delivery time, you can contact us and we'll look into what's going on.
                    
                </div>
            </div> 
             <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show5" >
                    <font style="font-size:15px; color:#F8A631;"> Do i have to create an  account to place an order ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide5">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Creating an account is not mandatory. You can order using our guest checkout without having to sign up. We make sure that ordering food online at streetfood is quick and fuss-free. After placing your order, you will have the option of creating an account.<br></br>
                  
                    
                </div>
            </div> 
            
            <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show6">
                    <font style="font-size:15px; color:#F8A631;"> Are there any discount available at Food Locker  right now ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide6">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Vocher After you place your order, we send it directly to the restaurant, which starts preparing it immediately.<br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Our restaurants do everything they can to get your food delivered as quickly as possible. However, sometimes restaurants receive very large amount of orders, or drivers get stuck in heavy traffic - this unfortunately might cause delays. <br></br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;if the amount of time you've wanted has exceeded the estimated delivery time, you can contact us and we'll look into what's going on.
                    
                </div>
            </div> 
            
             <div class="container" style="margin-top: 2%;">
               
                <div class= "col-md-offset-3 col-md-6 text-center" style="background:#232323; padding:6px;border-radius:20px;" id="show7">
                    <font style="font-size:15px; color:#F8A631;">I need to cancel or change my order! How can i do this ?&nbsp;&nbsp;&nbsp;</font><i class="fa fa-plus" style="color: #fff;cursor: pointer;"></i>
                </div>
                <div class="col-md-offset-3 col-md-6" style=" padding:10px;" id="hide7">
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;Please give us a call as soon as possible, we can let the restaurant know before it starts preparing your order.<br><br>
                    <i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;With regards to any refund of a payment you have made online, please contact Food Locker and not the restaurant.<br><br>

                </div>
            </div> 
            
            
            
            
            
            <div class="container" style="margin-top: 6%;">
                
            </div>



            <?php
            require_once 'footer.php';
            ?>

        </div>


    </body>


</html>