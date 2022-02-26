<?php
    require_once 'conection.php';
    require_once 'usersecure.php'; 
    if($_SESSION[cartche]!=1)
    {
        header("location:product.php");
}

$_SESSION[confirm]=1;
   
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
require_once 'head.php';
?>

    <body class="smooth-scroll" onload="avgrate('ratedekho');confirmcart('confirmcart');">

        <script type="text/javascript">
            $(document).ready(function()
            {
                $('[data-toggle="tooltip"]').tooltip({
                  
                });
                $('[data-toggle="popover"]').popover({
               
                });
           
            });
        </script>

        <div class="ht-page-wrapper">
<?php
require_once 'toppati.php';
?>

            <?php
            require_once 'menu.php';
            ?>

          


            <section class="ht-section hs-recipes grid">
              
                <div class="hs-content">
                    <div class="container">
                        <div class="row">
                            
                            
                            <div class="col-md-12 col-xs-12 col-sm-12 "  style="border:1px dotted #333;">
                                
                                <div class="row">
                                    <div class="col-md-12 cartt">
                                        &nbsp; &nbsp;<i class="fa fa-briefcase"></i>&nbsp;&nbsp;&nbsp;
                                        Cart
                                    </div>
                                    
                                </div>
                               
                                <div id="confirmcartdata">
                                    
                                    <form action="" method="post" name="qtyform">
                                        
                                    </form>
                                    
                                </div>
                                
                                
                                </div>
                                
                            </div>
                            
                            
                        </div>

                    
                    </div>


                </div>
                
                

            </section>




<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>