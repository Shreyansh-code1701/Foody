<?php
require_once 'connection.php';
require_once 'sellersecure.php';


?>


<!DOCTYPE html>
<html lang="en">

    <?php
    require_once 'head.php';
    ?>

    <body class="sticky-header" >

        <section>
            <?php
            require_once 'menu.php';
            ?>

            <div class="main-content" >

                <?php
                require_once 'toppati.php';
                require_once 'sellerpati.php';
                ?>

                <div class="wrapper">

                        
                         <div class="col-md-10 ol-sm-12 col-xs-12">
                        <section class="panel state">
                            <header class="panel-heading" style="background: #e0e1e7 !important;">
                                PACKAGE BILL
                            </header>
                            <div class="panel-body">
                                
                                <?php
                                $get=mysql_query ("select st.statename,c.cityname,a.areaname,s.* from state st,city c,area a,store s where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and s.storeid=(select max(storeid) from store where userid like '$_SESSION[user]')");
                                
                                $row=  mysql_fetch_array($get);
                                    ?>
                                
                                <table class="table table-responsive" style="background:url(../seller/images/food.png) no-repeat 50% 50%;" >
                                      <div  class="col-md-12 col-sm-12 col-xs-12" style="padding:5px">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 text-center"><img src="images/ganpatiji.png" style="max-width:10%;"/></div>
                                     </div>  
                                     <tr>
                                            <td colspan="4" style="background: #65CEA7;padding: 5px;" align="center">
                                                     <div style="font-size:16px;color:#FFFFFF;"><?php echo $row[7]; ?></div>
                                          </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td style="width:40%;" colspan="2"><img src="../admin/images/about.png" width="40%" /></td>
                <td colspan="1"><h2>FOOD LOCKER</h2></td>
                <td   style="text-align: center; padding-top: 38px;">
                                            <?php
                                            if($row[19]==0)
                                            {
                                            ?>
                                            <i class="fa fa-thumbs-o-down" style="color:red;" title="unactive"></i>
                                            <?php
                                            }
                                            else
                                            {
                                              ?>
                                            <i class="fa fa-thumbs-o-up" style="color: green;" title="active"></i>
                                            <?php
                                            }
                                            ?>
                                        </td> 
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2">Start Date : <?php echo $row[26]; ?></td>
                                        <td colspan="1">End Date : <?php echo $row[27]; ?></td>
                                        <td>Mobile : 8758722336</td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="4" style="text-align: center; font-size: 14px;"><font>Seller Information </font></th>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="4">Store Name : <?php echo $row[7]; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="4">Address : <?php echo $row[11]; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="2">State : <?php echo $row[0]; ?></td>
                                          <td colspan="1">City : <?php echo $row[1]; ?></td>
                                          <td colspan="1">Area : <?php echo $row[2]; ?></td>
                                    </tr>
                                    
                                    <?php
                                    $g = mysql_query("select * from duration where durationid=$row[4]");
                                    $gg = mysql_fetch_array($g);
                                    ?>
                                    
                                    <tr>
                                        <th colspan="2">Duration</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                    </tr>
                                   
                                    <tr>
                                        <td colspan="2"><?php echo $gg[1]; ?></td>
                                        <td><?php echo $gg[2]; ?></td>
                                        <td><?php echo $gg[2]; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="1">Seller Sign :</td>
                                        <td colspan="2">[Cashier]Sign : <div style="position: absolute; "><img src="images/sign.png" width="90%" class="img-responsive" /></div></td>
                                        
                                        <td>
                                            <table class="table table-responsive">
                                                
                                                <tr>
                                                    <td>Total : <?php echo $gg[2]; ?></td>
                                                </tr>
                                             
                                                <tr>
                                                    <td>Grand Total : <?php echo $gg[2]; ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="4">Rules :</th>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="4">
                                            * If you can't pay cash from next seven days i discard the store.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            * If you give payment for cash.
                                        </td>
                                    </tr>
                                    <tr>
                <td colspan="4" style="background-color: #65CEA7;color:#FFFFFF;">
                    <div class="col-md-7">348,Royal Square,VIP cercle,Utran-Kapodara Road,Surat. </div>
                    <div class="col-md-offset-2 col-md-2">THANK YOU...</div>
                </td>
            </tr>
                                </table>
                               
    
                            </div>
                        </section>
        
                        
                    </div>
                    
                </div>
                <div style="margin-top: 16%;">
                    <?php
                    require_once 'footer.php';
                    ?>
                </div>
        </section>


        <?php
require_once 'javascript.php';
?>

    </body>


</html>
