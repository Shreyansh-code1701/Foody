<?php
    require_once 'conection.php';
   
    unset($_SESSION[ch]);
     
    $_SESSION[page]="index";
    
    if($_REQUEST[stid]!="")
    {
        $_SESSION[stid]=$_REQUEST[stid];
        header("location:product.php");
    }
    
    if($_REQUEST[cid]!="")
    {
        $_SESSION[cid]=$_REQUEST[cid];
        $_SESSION[qty]=$_REQUEST[qty];
        
        $price=mysql_query("select price from item where productid=$_SESSION[cid]");
        $pricee=mysql_fetch_array($price);
        
        $tot=(($_SESSION[qty])*($pricee[0]));
        $grand=$tot-0;
        
        $z=mysql_query(("select * from cart where productid=$_SESSION[cid]"));
        $zz=mysql_fetch_array($z);
        
        if($zz[1]=="")
        {
             $in=mysql_query("insert into cart values('$_SESSION[user]',$_SESSION[cid],0,$_SESSION[qty],$pricee[0],$tot,0,$grand)");
        }
        else
        {
            $_SESSION[ch]=1;
        }
          
//echo $in;
        header("location:product.php");
    }
    
  
    
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<?php
require_once 'head.php';

?>

    <body class="smooth-scroll" onload="avgrate('ratedekho'); misscart('cart',0,0);<?php  if($_REQUEST[search]!="") {?> mainsearch('misssearch','0','list','<?php echo $state; ?>','<?php echo $city; ?>','<?php echo $area; ?>','<?php echo $_REQUEST[search]; ?>');<?php }else{?> misssearch('misssearch','6','list');<?php } ?>">

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
                <header class="hs-header">
                    <div class="container">
                        <h2 class="heading">Recent recipes</h2>
                       
                    </div>
<!--                    <ul class="isotope-filter" data-target="#grid-2">
                        <li class="is-filtered"><a href="#" data-filter="*">ALL</a></li>
                        <li><a href="#" data-filter=".filter-food">FOODS</a></li>
                        <li><a href="#" data-filter=".filter-beverages">BEVERAGES</a></li>
                        <li><a href="#" data-filter=".filter-dessert">DESSERTS</a></li>
                        <li><a href="#" data-filter=".filter-pudding">PUDDING</a></li>
                    </ul>-->
                </header>
                
                <div class="hs-content">
                    <div class="container">
                <div class="col-md-9">
                                
                             <div class="detailihead" style="float: left;">
                                 <i class="fa fa-th" id="list" title="Short View" onclick="misssearch('misssearch',6,'list');"></i>
                                 <i class="fa fa-th-list" id="detail" title="Details View" onclick="misssearch('misssearch',6,'detail');"></i>
                              </div>
                    
                            <div class="col-md-2 selectbox">
                                <select name="filtersearch" onchange="clearfilter();misssearch('misssearch',this.value,'');" id="perpage">
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                    
                            <div style="clear:both;"></div>
                                
                            </div>
                    </div>
                </div><br/>
                        
                <div class="hs-content">
                    <div class="container">
                     
                        <div class="row">
                           
                            <div class="col-md-9" id="misssearch">
                                
                            </div>
                            
                            
                            <form action="" method="post" name="searchpanel" class="form-group" id="filter">
                            <div class="col-md-3 col-xs-12 col-sm-12 ">
                                        <div class="row">
                                            
                                            <div class="col-md-12 cartt">
                                        &nbsp; &nbsp;<i class="fa fa-rupee"></i>&nbsp;&nbsp;&nbsp;
                                        <strong style="color: #232323;">P</strong>RICE 
                                    </div>
                                            
                                    <div class="col-md-12 body" style="overflow:auto;height:228px;">
                                        
                                        <table class="table table-responsive filter" style="text-transform: capitalize;">
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 0 and 50" />
                                                </td>
                                                
                                                <td style="width:90%;border:none;">
                                                     Bellow 50
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 50 and 100"/>
                                                </td>
                                                
                                                <td style="width:90%;border: none;">
                                                      50 - 100
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 100 and 150" />
                                                </td>
                                                
                                                <td style="width:90%;border: none;">
                                                    100 - 150
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 150 and 200" />
                                                </td>
                                                
                                                <td style="width:90%;border: none;">
                                                     150 - 200
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 200 and 250" />
                                                </td>                                                
                                                <td style="width:90%;border: none;">
                                                     200 - 250
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                     <input type="checkbox" onchange="misssearch('misssearch',0,'');" name="price[]" value=" between 250 and 1000" />
                                                </td>
                                                
                                                <td style="width:90%;border: none;">
                                                     Above 250
                                                </td>
                                                
                                            </tr>
                                            
                                        </table>
                                    </div>
                                    </div>
                                            
                                    
                                <br/>
                                    <div class="row">
                                        
                                        <div class="col-md-12 cartt">
                                                        &nbsp; &nbsp;<i class="fa fa-cutlery"></i>&nbsp;&nbsp;&nbsp;
                                                        <strong style="color: #232323;">C</strong>UISINE 
                                                    </div>
                                        
                                        <div class="col-md-12 body" style="overflow:auto;height:228px;">

                                            <table class="table table-responsive" style="text-transform: capitalize;">
                                            
                                            
                                            <?php
                                            $mc=  mysql_query("select * from maincategory where del=0");
                                            while($mcc=  mysql_fetch_array($mc))
                                            {
                                            ?>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                    <input type="checkbox" onchange="misssearch('misssearch',0,'');" value="<?php echo $mcc[0]; ?>" name="main[]"/>
                                                </td>
                                                
                                                <td style="border:none;width:90%;">
                                                    
                                                    <?php echo $mcc[1]; ?>
                                                
                                                </td>
                                                
                                            </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                            
                                            </table>
                                        </div>
                                    </div>
                                    
                                <br/>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12 cartt">
                                        &nbsp; &nbsp;<i class="fa fa-bank"></i>&nbsp;&nbsp;&nbsp;
                                        <strong style="color: #232323;">S</strong>TORE 
                                    </div>
                                        
                                        <div class="col-md-12 body" style="overflow:auto;height:228px;" >
                                            
                                            <table class="table table-responsive" style="text-transform: capitalize;">
                                    
                                            <?php
                                            $st=  mysql_query("select * from store where active=1");
                                            while($stt=  mysql_fetch_array($st))
                                            {
                                            ?>
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                    <input type="checkbox" onchange="misssearch('misssearch',0,'');" value="<?php echo $stt[3]; ?>" name="store[]"/>
                                                </td>
                                                
                                                <td style="border:none;width:90%;">
                                                    
                                                    <?php echo $stt[4]; ?>
                                                
                                                </td>
                                                
                                            </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                            
                                        </table>
                                        
                                </div>
                            </div>
                                
                                <br/>
                                
                                <div class="row">
                                        
                                        <div class="col-md-12 cartt">
                                        &nbsp; &nbsp;<i class="fa fa-bank"></i>&nbsp;&nbsp;&nbsp;
                                        <strong style="color: #232323;">T</strong>YPE 
                                    </div>
                                        
                                        <div class="col-md-12 body">
                                            
                                            <table class="table table-responsive" style="text-transform: capitalize;">
                                    
                                            
                                            <tr>
                                                
                                                <td style="border:none;">
                                                    <input type="checkbox" onchange="misssearch('misssearch',0,'');" value="veg" name="type[]"/>
                                                </td>
                                                
                                                <td style="border:none;width:90%;">
                                                    
                                                    Veg
                                                
                                                </td>
                                                
                                            </tr>
                                            
                                             <tr>
                                                
                                                <td style="border:none;">
                                                    <input type="checkbox" onchange="misssearch('misssearch',0,'');" value="non veg" name="type[]"/>
                                                </td>
                                                
                                                <td style="border:none;width:90%;">
                                                    
                                                    Non-Veg
                                                
                                                </td>
                                                
                                            </tr>
                                            
                                             
                                            
                                            
                                            
                                        </table>
                                        
                                </div>
                            </div>
                               
                            </div>
                            
                            </form> 
                                
                                </div>
                                
                            </div>
                            
                            
                        </div>
            </section>

                    </div>


                
                



           
<?php
require_once 'footer.php';
?>

        </div>


    </body>


</html>