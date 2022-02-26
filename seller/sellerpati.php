<?php
    require_once 'connection.php';
    require_once 'sellersecure.php';
    
    
?>
                    <div class="row timepati">
                        
                        <div class=" col-sm-12 col-xs-12   col-md-6">
                            <?php
                            $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                            if($inn[2]=="male")
                            {
                                ?>
                                <font>Welcome To Over Town : Mr. <?php echo $inn[0]; ?></font>
                           
                              <?php
                            }
                            else
                            {
                                ?>
                                 <font>Welcome To Over Town : Mrs. <?php echo $inn[0]; ?> </font>
                           <?php
                                 }
                                    ?>
                           
                        </div>
                        <div class=" col-sm-12 col-xs-12  col-md-6">
                            <?php
                            $in=mysql_query("select * from logintime");
                            while ($row=  mysql_fetch_array($in))
                            {
                                if($row[0]==$_SESSION[user])
                                {
                                    
                                
                               ?>
                            
                            <font >Your Last Visiting Time :  <?php echo $row[1]; echo "&nbsp;&nbsp;";echo $row[2];   ?></font>
                            <?php
                            }
                            }
                            ?>
                            
                        </div>
                    </div>
                  