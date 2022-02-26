<?php*
require_once 'connection.php';
require_once 'sellersecure.php';
?>

<?php
if ($_REQUEST[konuma] == "misscuisine") {
    echo "<option>-- Select Cuisine --</option>";
    $mc = mysql_query("select c.*,m.mcatname from cuisine c,maincategory m where m.mcatid = c.mcatid and c.storeid =$_REQUEST[id]");
                        while ($mcc = mysql_fetch_array($mc)) {
                            ?>
                            <option value="<?php echo $mcc[0]; ?>"><?php echo $mcc[3]; ?></option>
                            <?php
                        }
}
?>
                            
                       
 <?php
if ($_REQUEST[konuma] == "missstoreevent") {
    echo "<option>-- Select Event --</option>";
    $mc = mysql_query("select e.* from event e,storeevent se,store s where e.eventid=se.eventid and s.storeid=se.storeid and se.storeid=$_REQUEST[id]");
                        while ($mcc = mysql_fetch_array($mc)) {
                            ?>
                            <option value="<?php echo $mcc[0]; ?>"><?php echo $mcc[1]; ?></option>
                            <?php
                        }
}
?>
                            

<?php
if ($_REQUEST[tbl] == "city") {
    echo "<option>-- Select City --</option>";
    $city = mysql_query("select * from city where del=0 and stateid=$_REQUEST[id]");
    while ($row = mysql_fetch_array($city)) {
        ?>
        <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
        <?php
    }
}
?>

<?php
if ($_REQUEST[tbl] == "area") {
    echo "<option>-- Select Area --</option>";
    $city = mysql_query("select * from area where del=0 and cityid=$_REQUEST[id]");
    while ($row = mysql_fetch_array($city)) {
        ?>
        <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
        <?php
    }
}
?>


<!-----------------------------------------MANAGE PRODUCT-------------------------------------------->


<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "item") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
   <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa  fa-windows"></i>
                    </div>
                    <input type="text" class="form-control" name="productname" autofocus="" required="" pattern="^[a-z ]+$" placeholder="Product Name"/>

                </div>
            </div>

 <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-cutlery"></i>
                    </div>
                    <select name="maincategory" required="" class="form-control" id="misscuisine">
                        
                        <option value="">--Select Cuisine--</option>                                               
                        
                    </select>
                </div>
            </div>

  <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa- fa-list-ol" style="font-size: 12px" ></i>
                    </div>
                    <select name="foodtype" required="" class="form-control">
                        <option value="">--Select Type--</option>                                               
                        <option value="veg">veg</option>
                        <option value="non veg">non veg</option>  
                    </select>
                </div>
            </div>

 <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-rupee" style="font-size: 20px" ></i>
                    </div>
                    <input type="text" class="form-control" name="price" required="" pattern="^[0-9 ]+$" placeholder="Product Price"/>

                </div
            </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-book" ></i>
                    </div>
                    <textarea title="discription" rows="2" name="dis" required="" placeholder="Enter discription" pattern="^[a-zA-Z-&, ]+$"  class="form-control"></textarea>
                </div>
            </div>
            
            
              <div class="form-group">
                <div class="input-group">        
                    <div class="input-group-addon">
                        <i  class="fa  fa-picture-o"></i>
                    </div>
                    <input type="file" class="form-control" name="productpic" required="" />
                </div>
                <?php
                   if($er4==1)
                   {
                       echo "<font color=red size=2> Undefind extension...!</font>";
                   }
                ?>
            </div>
                                
                                
            <button type="submit" name="send" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
                                            
                                  
            <?php
        }
        else {
            $_SESSION[uid]=$_REQUEST[id];
        $in=  mysql_query("select * from item where del=0 and productid=$_REQUEST[id]");
        $du=  mysql_fetch_array($in);
        ?>
            
            
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa  fa-windows"></i>
                    </div>
                    <input type="text" class="form-control" name="upproductname" value="<?php echo $du[3]; ?>" autofocus="" required="" pattern="^[a-z ]+$" placeholder="Product Name"/>

                </div
            </div>
            </div>
            
          
            
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-cutlery"></i>
                    </div>
                    <select name="upmaincategory" required="" class="form-control">
                        <option value=""><?php echo $du[0]; ?></option>                                               
                        <?php
                        $mc = mysql_query("select * from maincategory where del=0");
                        while ($mcc = mysql_fetch_array($mc)) {
                            ?>
                            <option value="<?php echo $mcc[0]; ?>"><?php echo $mcc[1]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa- fa-list-ol" style="font-size: 12px" ></i>
                    </div>
                    <select name="upfoodtype" required="" class="form-control">
                        <option value=""><?php echo $du[4]; ?></option>                                               
                        <option value="veg">veg</option>
                        <option value="non veg">non veg</option>  
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-rupee" style="font-size: 20px" ></i>
                    </div>
                    <input type="text" class="form-control" name="upprice" value="<?php echo $du[5]; ?>" required="" pattern="^[0-9 ]+$" placeholder="Product Price"/>

                </div
            </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-book" ></i>
                    </div>
                    <textarea title="discription" rows="2" name="updis" required="" placeholder="Enter discription" pattern="^[a-zA-Z-&, ]+$"  class="form-control"><?php echo $du[6]; ?></textarea>
                </div>
            </div>
            </div>

            <div class="form-group">
                <div class="input-group">        
                    <div class="input-group-addon">
                        <i  class="fa  fa-picture-o"></i>
                    </div>
                    <input type="file" class="form-control" value="<?php echo $du[7]; ?>" name="upproductpic" required="" />
                </div>
                <?php
                   if($er2==1)
                   {
                       echo "<font color=red size=2> Undefind extension...!</font>";
                   }
                ?>
            </div>
            </div>


            <button type="submit" name="upsend" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            
            <?php
    }
    }
}
?>


  
 <?php

if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "item") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update item set del=1 where productid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update item set del=1 where del=0");
        }

        $pp = 8;
        $s=mysql_query("select storeid from store where userid like '$_SESSION[user]'");
        $ss=mysql_fetch_array($s);
        $d = mysql_query("select count(productid) from item where del=0 and storeid=$ss[0]");
        $dd = mysql_fetch_array($d);
        $_SESSION[productcount] = $dd[0];
        $page = ceil($_SESSION[productcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
             <th>Product Image</th>
            <th>Main Category</th>
            <th>Store Name</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Discription</th>
           
            
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select m.mcatname,s.storename,s.userid,i.* from maincategory m,store s,item i where i.del=0 and m.mcatid=i.mcatid and s.storeid=i.storeid and s.userid like '$_SESSION[user]' order by proname limit $st,$pp ");
        } else {
            $data = mysql_query("select mcatname,storename,i.* from maincategory m,store s,item i where i.del=0 and m.mcatid=i.mcatid and s.storeid=i.storeid  like '$_REQUEST[ketla]%' or s.storename like '$_REQUEST[ketla]%' or i.proname like '$_REQUEST[ketla]%' order by m.mcatname");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','item',1,'all','vachhe','<?php echo $row[5]; ?>',0);recdis('recdata','item',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td style="text-align: center;width:10%;"><img src="<?php echo $row[10]; ?>"  class="img img-responsive" style="width:100%;"/></td>    
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="8">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','item','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                <?php
            }
            for ($i = $s; $i <= $e; $i++) {
                if ($_REQUEST[page] == $i) {
                    ?>

                                    <li class="pageactive" onclick="dis('data','item','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                        <?php
                    } else {
                        ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','item','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                                    <?php
                                }
                            }
                            if ($page > 4) {
                                if ($_REQUEST[page] != $page) {
                                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','item','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


        <?php
    }
}
?>

            
            
<?php

if ($_REQUEST[kona] == "recdata") {
    if ($_REQUEST[konu] == "item") {
        if($_REQUEST[recid]!=0)
        {
            $up=mysql_query("update item set del=0 where productid=$_REQUEST[recid]");
        }
        if($_REQUEST[delid]!=0)
        {
            $del=mysql_query("delete from item where productid=$_REQUEST[delid]");
        }
        if($_REQUEST[badhudel]=="badhu")
        {
            $del=mysql_query("delete from item where del=1");
        }
        $pp=8;
           $s=mysql_query("select storeid from store where userid like '$_SESSION[user]'");
        $ss=mysql_fetch_array($s);
        $d1=  mysql_query("select count(productid) from item where del=1 and storeid=$ss[0]");
        $dd1=  mysql_fetch_array($d1);
        $_SESSION[durationreccount]=$dd1[0];
        $page=ceil($_SESSION[durationreccount]/$pp);
        
        $st=($_REQUEST[page]*$pp)-$pp;
        
        if($page>4)
        {
            if($_REQUEST[page]>4)
            {
                if($_REQUEST[disha]=="vachhe")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="agal")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="pachhal")
                {
                    $s=$_REQUEST[page];
                    $e=$_REQUEST[page]+3;
                }
            }
            else
            {
                $s=1;
                $e=4;
            }
            
        }
        else
        {
            $s=1;
            $e=$page;
        }
        
        ?>

        <table class="table table-responsive table-hover mytable">
             <th>No</th>
             <th>Product Image</th>
            <th>Main Category</th>
            <th>Store Name</th>
            <th>Product Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Discription</th>
            <th>Product Image</th>
            <th></th>
        <?php
        $c=0;
            $data = mysql_query("select m.mcatname,s.storename,s.userid,i.* from maincategory m,store s,item i where i.del=1 and m.mcatid=i.mcatid and s.storeid=i.storeid and s.userid like '$_SESSION[user]' order by proname limit $st,$pp ");
 
        while ($row = mysql_fetch_array($data)) 
        {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','item',1,'all','vachhe','<?php echo $row[5]; ?>',0,0);dis('data','item',1,'all','vachhe',0,0);">
                      <td><?php echo $c; ?></td>
                     <td style="text-align: center;width:10%;"><img src="<?php echo $row[10]; ?>"  class="img img-responsive" style="width:100%;"/></td>    
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                </tr>
                <?php
            }
            
            ?>
                
                <tr>
                    <td colspan="9">
                        <ul class="pageing">
                            <?php
                            if($_REQUEST[page]>4)
                            {
                                ?>
                            <li title="<?php echo $s-1; ?>" onclick="recdis('recdata','item','<?php echo $s-1; ?>','all','pachhal',0,0,0);"><</li>
                            <?php
                            }
                            for($i=$s;$i<=$e;$i++)
                            {
                                if($_REQUEST[page]==$i)
                                {
                            ?>
                            
                            <li class="pageactive" onclick="recdis('recdata','item','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                                else
                                {
                                    ?>
                            
                                    
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','addbanner','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                            }
                            if($page>4)
                            {
                                if($_REQUEST[page]!=$page)
                                {
                            ?>
                            
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','item','<?php echo $i; ?>','all','agal',0,0,0);">></li>
                            
                            
                            <?php
            
                    }
                }
                            ?>
                        </ul>
                    </td>
                </tr>
                
        </table>


            <?php
        }
}
?>
           
            
        
            
            
<!----------------------------------------MANAGE PACKAGE BILL----------------------------------------->

<?php
if($_REQUEST[konu]=='missuserbill')
{
   
    if($_REQUEST[kona]=='badha')
    {
        $sel=  mysql_query("select st.statename,c.cityname,a.areaname,s.* from state st,city c,area a,store s where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and s.userid like '$_SESSION[user]'");
    }
    else
    {
        $sel=  mysql_query("select st.statename,c.cityname,a.areaname,s.* from state st,city c,area a,store s where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and s.storeid=$_REQUEST[kona]");
    
    }
      
        while ($row = mysql_fetch_array($sel)) {
    ?>
<table class="table table-responsive"  >
                                         <div  class="col-md-12 col-sm-12 col-xs-12 " style="padding:5px;">
                                             <div class="col-md-4" ></div>
                                            <div class="col-md-4 text-center"><img src="images/ganpatiji.png" style="max-width:10%;"/></div>
                                             <?php
                            $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                            if($inn[2]=="male")
                            {
                                ?>
                                             <div class="col-md-offset-2 col-md-2" style="padding-top: 15px;">Mr.<?php echo $inn[0]; ?></div>
                           
                              <?php
                            }
                            else
                            {
                                ?>
                                 <div class="col-md-4" style="padding-top: 15px;">Mrs.<?php echo $inn[0]; ?></div>
                           <?php
                                 }
                                    ?>
                                            
                                         </div>  
                                      
                                            <tr>
                                        <td colspan="4" style="background: #65CEA7;padding:7px 0px 7px 0px;" align="center">
                                            <div style="font-size:16px;color:#FFFFFF; text-transform:capitalize;"><?php echo $row[5]; ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;" colspan="2"><img src="../admin/images/about.png" width="40%" /></td>
                                        <td colspan="1"><h2><b>FOOD LOCKER</b></h2></td>
                                            <td style="text-align: center; padding-top: 38px;">
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
                                            <th colspan="4" style="text-align: center;"><font>Seller Information </font></th>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;">Store Name : <?php echo $row[5]; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;">Address : <?php echo $row[11]; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" style="text-transform:capitalize;">State : <?php echo $row[0]; ?></td>
                                            <td colspan="" style="text-transform:capitalize;">City : <?php echo $row[1]; ?></td>
                                            <td colspan="" style="text-transform:capitalize;">Area : <?php echo $row[2]; ?></td>
                                        </tr>

    <?php
    $sel = mysql_query("select * from duration where durationid=$row[4]");
    $gg = mysql_fetch_array($sel);
    ?>

                                        <tr>
                                            <th colspan="2">Duration</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>

                                        <tr>
                                            <td colspan="2" style="text-transform:capitalize;"><?php echo $gg[1]; ?></td>
                                            <td style="text-transform:capitalize;"><?php echo $gg[2]; ?></td>
                                            <td style="text-transform:capitalize;"><?php echo $gg[2]; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="1">Seller Sign :</td>
                                            <td colspan="2" >[Cashier]Sign : <div style="position: absolute; "><img src="images/sign.png" width="90%" class="img-responsive" /></div></td>
                                            <td>
                                                <table class="table table-responsive">

                                                    <tr>
                                                        <td>Total : <?php echo $gg[2]; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="background-color: #65CEA7;color:#FFFFFF;">Grand Total : <?php echo $gg[2]; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <th colspan="4">Rules :</th>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;">
                                                <i class="fa fa-hand-o-right"></i>&nbsp; If you can't pay cash from next seven days i discard the store.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;">
                                               <i class="fa fa-hand-o-right"></i>&nbsp; If you give payment for cash.
                                            </td>
                                        </tr>
                                        <tr>
                                        <td colspan="4" style="background-color: #65CEA7;color:#FFFFFF;">
                                            <div class="col-md-7">348,Royal Square,VIP cercle,Utran-Kapodara Road,Surat. </div>
                                            <div class="col-md-offset-2 col-md-2">THANK YOU...</div>
                                        </td>
                                    </tr>
                                    </table>
                                     

<?php
    } 
}
?>

<!-----------------------------------------MANAGE ADD BANNER-------------------------------------------->


<?php

if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "addbanner") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa  fa-windows"></i>
                    </div>
                    <input type="text" class="form-control" name="bannername" autofocus="" required="" pattern="^[a-z0-9 ]+$" placeholder="Banner Name"/>

                </div>
            </div>
 
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-cutlery"></i>
                    </div>
                    <select name="timeperiod" required="" class="form-control">
                        <option value="">--Select Package Time--</option>                                               
                        <?php
                        $mc = mysql_query("select * from timeperiod where del=0");
                        while ($mcc = mysql_fetch_array($mc)) {
                            ?>
                            <option value="<?php echo $mcc[0]; ?>"><?php echo $mcc[1]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">        
                    <div class="input-group-addon">
                        <i  class="fa  fa-picture-o"></i>
                    </div>
                    <input type="file" class="form-control" name="addbanner" required="" />
                </div>
                <?php
                   if($er4==1)
                   {
                       echo "<font color=red size=2> Undefind extension...!</font>";
                   }
                ?>
            </div>
           
            <button type="submit" name="send" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>

            <?php
        }
        else {
            $_SESSION[uid]=$_REQUEST[id];
        $in=  mysql_query("select * from addbanner where del=0 and adid=$_REQUEST[id]");
        $du=  mysql_fetch_array($in);
        ?>
            
         <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa  fa-windows"></i>
                    </div>
                    <input type="text" class="form-control" name="upbannername" autofocus="" required="" pattern="^[a-z0-9 ]+$" placeholder="Banner Name"/>

                </div>
            </div>
 
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fa fa-cutlery"></i>
                    </div>
                    <select name="uptimeperiod" required="" class="form-control">
                        <option value="">--Select Package Time--</option>                                               
                        <?php
                        $mc = mysql_query("select * from timeperiod where del=0");
                        while ($mcc = mysql_fetch_array($mc)) {
                            ?>
                            <option value="<?php echo $mcc[0]; ?>"><?php echo $mcc[1]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">        
                    <div class="input-group-addon">
                        <i  class="fa  fa-picture-o"></i>
                    </div>
                    <input type="upfile" class="form-control" value="<?php echo $du[7]; ?>" name="upproductpic" required="" />
                </div>
                <?php
                   if($er2==1)
                   {
                       echo "<font color=red size=2> Undefind extension...!</font>";
                   }
                ?>
            </div>
           

            <button type="submit" name="upsend" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
            
            <?php
    }
    }
}
?>



<?php

if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "addbanner") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update addbanner set del=1 where adid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update addbanner set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(adid) from addbanner where del=0");
        $dd = mysql_fetch_array($d);
        $_SESSION[durationcount] = $dd[0];
        $page = ceil($_SESSION[durationcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Time Period</th>
            <th>Banner Name</th>
            <th>Banner Image</th>
            <th>Upload Date</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Active</th>
            <th></th>
        <?php
        $bb=mysql_query("select * from store where userid like '$_SESSION[user]'");
        $bbb=mysql_fetch_array($bb);
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
         
            $data = mysql_query("select * from addbanner where del=0 and storeid=$bbb[3]  limit $st,$pp ");
        } else {
            $data = mysql_query("select * from addbanner  where adbannername like '$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','addbanner',1,'all','vachhe','<?php echo $row[0]; ?>',0);recdis('recdata','addbanner',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td style="text-align: center;width:10%;"><img src="<?php echo $row[4]; ?>" width="100%"/></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td>
                        <?php
                        if($row[8]==0)
                        {
                        ?>
                        <i class="fa fa-thumbs-o-down" style="color:red;"></i>
                        <?php
                        }
                        else
                        {    
                        ?>
                        <i class="fa fa-thumbs-o-up" style="color:green;"></i>
                       <?php
                        }
                        ?>
                    </td>
                    <td onclick="form('form','addbanner','update','<?php echo $row[0]; ?>');"><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" ></i></td>
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="8">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','addbanner','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                <?php
            }
            for ($i = $s; $i <= $e; $i++) {
                if ($_REQUEST[page] == $i) {
                    ?>

                                    <li class="pageactive" onclick="dis('data','addbanner','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                        <?php
                    } else {
                        ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','addbanner','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                                    <?php
                                }
                            }
                            if ($page > 4) {
                                if ($_REQUEST[page] != $page) {
                                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','addbanner','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


        <?php
    }
}
?>

            
            
<?php

if ($_REQUEST[kona] == "recdata") {
    if ($_REQUEST[konu] == "addbanner") {
        if($_REQUEST[recid]!=0)
        {
            $up=mysql_query("update addbanner set del=0 where adid=$_REQUEST[recid]");
        }
        if($_REQUEST[delid]!=0)
        {
            $del=mysql_query("delete from addbanner where adid=$_REQUEST[delid]");
        }
        if($_REQUEST[badhudel]=="badhu")
        {
            $del=mysql_query("delete from addbanner where del=1");
        }
        $pp=8;
        $d1=  mysql_query("select count(adid) from item where del=1");
                            $dd1=  mysql_fetch_array($d1);
                            $_SESSION[durationreccount]=$dd1[0];
        $page=ceil($_SESSION[durationreccount]/$pp);
        
        $st=($_REQUEST[page]*$pp)-$pp;
        
        if($page>4)
        {
            if($_REQUEST[page]>4)
            {
                if($_REQUEST[disha]=="vachhe")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="agal")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="pachhal")
                {
                    $s=$_REQUEST[page];
                    $e=$_REQUEST[page]+3;
                }
            }
            else
            {
                $s=1;
                $e=4;
            }
            
        }
        else
        {
            $s=1;
            $e=$page;
        }
        
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Time Period</th>
            <th>Banner Name</th>
            <th>Banner Image</th>
            <th>Upload Date</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Active</th>
            <th></th>
        <?php
        $c=0;
            $data = mysql_query("select * from addbanner where del=1 order by adbannername limit $st,$pp ");
 
        while ($row = mysql_fetch_array($data)) 
        {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','addbanner',1,'all','vachhe','<?php echo $row[2]; ?>',0,0);dis('data','addbanner',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td style="text-align: center;width:10%;"><img src="<?php echo $row[4]; ?>" width="100%"/></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td>
                        <?php
                        if($row[8]==0)
                        {
                        ?>
                        <i class="fa fa-thumbs-o-down" style="color:red;"></i>
                        <?php
                         }
                         else
                         {
                        ?>
                        <i class="fa fa-thumbs-o-up" style="color:green;"></i>
                        <?php
                         }
                        ?>
                    </td>
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','addbanner',1,'all','vachhe',0,'<?php echo $row[0]; ?>',0);"></i></td>
                </tr>


                <?php
            }
            
            ?>
                
                <tr>
                    <td colspan="8">
                        <ul class="pageing">
                            <?php
                            if($_REQUEST[page]>4)
                            {
                                ?>
                            <li title="<?php echo $s-1; ?>" onclick="recdis('recdata','addbanner','<?php echo $s-1; ?>','all','pachhal',0,0,0);"><</li>
                            <?php
                            }
                            for($i=$s;$i<=$e;$i++)
                            {
                                if($_REQUEST[page]==$i)
                                {
                            ?>
                            
                            <li class="pageactive" onclick="recdis('recdata','addbanner','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                                else
                                {
                                    ?>
                            
                                    
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','addbanner','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                            }
                            if($page>4)
                            {
                                if($_REQUEST[page]!=$page)
                                {
                            ?>
                            
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','addbanner','<?php echo $i; ?>','all','agal',0,0,0);">></li>
                            
                            
                            <?php
            
                    }
                }
                            ?>
                        </ul>
                    </td>
                </tr>
                
        </table>


            <?php
        }
}
?>

            
 
<!-----------------------------------------MANAGE  BANNER  BILL-------------------------------------------->
            
            
            
            <?php
                                                                
if($_REQUEST[konu]=='missbannerbill')
{
   
    if($_REQUEST[kona]=='badha')
    {
        $sel = mysql_query("select s.storename,s.address,a.* from store s,addbanner a where a.storeid = s.storeid and userid like '$_SESSION[user]'");
    }
    else
    {       
         $sel = mysql_query("select s.storename,s.address,a.* from store s,addbanner a where a.storeid = s.storeid and  a.storeid =$_REQUEST[kona]");
    }
      
        while ($row = mysql_fetch_array($sel)) {
    ?>
<div >
<table class="table table-responsive"  style="background:url(../seller/images/food.png) no-repeat 50% 50%;">
                                         <div  class="col-md-12 col-sm-12 col-xs-12" style="padding:5px">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4 text-center"><img src="images/ganpatiji.png" style="max-width:10%;"/></div>
                                             <?php
                            $in=  mysql_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=  mysql_fetch_array($in);
                            if($inn[2]=="male")
                            {
                                ?>
                                             <div class="col-md-offset-2 col-md-2" style="padding-top: 15px;">Mr.<?php echo $inn[0]; ?></div>
                           
                              <?php
                            }
                            else
                            {
                                ?>
                                 <div class="col-md-4" style="padding-top: 15px;">Mrs.<?php echo $inn[0]; ?></div>
                           <?php
                                 }
                                    ?>
                                         </div>  
                                      
                                            <tr>
                                        <td colspan="4" style="background: #65CEA7;padding: 5px;" align="center">
                                            <div style="font-size:16px;color:#FFFFFF;"><?php echo $row[0]; ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:40%;" colspan="2"><img src="../admin/images/about.png" width="40%" /></td>
                                        <td colspan="1"><h2>FOOD LOCKER</h2></td>
                                            <td style="text-align: center; padding-top: 38px;">
                                                <?php
                                            if($row[10]==0)
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
                                            <td colspan="2">Start Date : <?php echo $row[8]; ?></td>
                                            <td colspan="1">End Date : <?php echo $row[9]; ?></td>
                                            <td>Mobile : 8758722336</td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" style="text-align: center;"><font>Seller Information </font></th>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;"> Store Name : <?php echo $row[0]; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" style="text-transform:capitalize;">Address : <?php echo $row[1]; ?></td>
                                        </tr>

                                        

    <?php
    $sel = mysql_query("select * from timeperiod where timeperiodid=$row[3]");
    $gg = mysql_fetch_array($sel);
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
                                            <td colspan="2" >[Cashier]Sign : <div style="position: absolute; "><img src="images/sign.png" width="90%" class="img-responsive" /></div></td>
                                            <td>
                                                <table class="table table-responsive">

                                                    <tr>
                                                        <td>Total : <?php echo $gg[2]; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="background-color: #65CEA7;color:#FFFFFF;">Grand Total : <?php echo $gg[2]; ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <th colspan="4" style="text-transform:capitalize;">Rules :</th>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                <i class="fa fa-hand-o-right"></i>&nbsp; If you can't pay cash from next seven days i discard the store.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <i class="fa fa-hand-o-right"></i>&nbsp;If you give payment for cash.
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
                                     

<?php
    } 
}

?>


<!-----------------------------------------MANAGE  CUISINE-------------------------------------------->
    
<?php
if ($_REQUEST[cuisine] == "cuisine") {
    if ($_REQUEST[shu] == "update") {

        $upcusinie = mysql_query("insert into cuisine values($_REQUEST[mcatid],$_REQUEST[storeid],0)");
    }
}


if ($_REQUEST[cuisine] == "cuisine" && $_REQUEST[shema] == "store" && ($_REQUEST[shu] == "dis" || $_REQUEST[shu] == "update" || $_REQUEST[shu] == "up")) {
    ?>                                               
    <form action="" method="post" name="addcuisine" class="form-group storetable">
        <table class="table table-responsive">
    <?php
    $cuisine = mysql_query("select * from maincategory where mcatid not in (select mcatid from cuisine where storeid = $_REQUEST[storeid]) and del=0");
    while ($fcui = mysql_fetch_array($cuisine)) {
        ?>
                <tr>
                    <td><i class="fa fa-plus" style=" cursor:pointer; text-align: center;color:#65CEA7;" onclick="restore('cuisine','store','update','<?php echo $_REQUEST[storeid] ?>','<?php echo $fcui[0]; ?>'); backup('mcat','store','update','<?php echo $_REQUEST[storeid] ?>','<?php echo $fcui[0]; ?>','backup');"></i></td>
                    <td style="text-transform: capitalize; "><?php echo $fcui[1]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
            <?php
        }


        if ($_REQUEST[backup] == "backup") {
            if ($_REQUEST[cuisine] == "cuisine" || $_REQUEST[mcat] == "mcat") {
                if ($_REQUEST[shu] == "del") {
                    $upcusinie = mysql_query("delete from foodlocker.cuisine where storeid=$_REQUEST[storeid] and  mcatid=$_REQUEST[mcatid] ");
                }
            }
            if (($_REQUEST[cuisine] == "cuisine" || $_REQUEST[mcat] == "mcat") && $_REQUEST[shema] == "store" && ($_REQUEST[shu] == "dis" || $_REQUEST[shu] == "update" || $_REQUEST[shu] == "up" || $_REQUEST[shu] == "del")) {
                ?>                                               
        <form action="" method="post" name="addcuisine" class="form-group storetable">
            <table class="table table-responsive">
        <?php
        $cuisine = mysql_query("select c.*,m.mcatname from cuisine c,maincategory m where m.mcatid=c.mcatid and c.storeid=$_REQUEST[storeid] and m.del=0");

        while ($fcui = mysql_fetch_array($cuisine)) {
            ?>
                    <tr>
                        <td class="td1"><i class="fa fa-minus"   style=" cursor: pointer; text-align: center;color:#424F63;" onclick="backup('mcat','store','del','<?php echo $_REQUEST[storeid] ?>','<?php echo $fcui[0]; ?>','backup'); restore('cuisine','store','dis','<?php echo $_REQUEST[storeid]; ?>','0'); "></i></td>
                        <td style="text-transform: capitalize; "><?php echo $fcui[3]; ?></td>
                    </tr>
            <?php
        }
        ?>
            </table>
        </form>
                <?php
            }
        }
        ?>


<!-----------------------------------------MANAGE  EVENT-------------------------------------------->
    
<?php
if ($_REQUEST[storeevent] == "storeevent") {
    if ($_REQUEST[shu] == "update") {

        $upstoreevent = mysql_query("insert into storeevent values($_REQUEST[storeid],$_REQUEST[eventid],0)");
    }
}


if ($_REQUEST[storeevent] == "storeevent" && $_REQUEST[shema] == "store" && ($_REQUEST[shu] == "dis" || $_REQUEST[shu] == "update" || $_REQUEST[shu] == "up")) {
    ?>                                               
    <form action="" method="post" name="addstoreevent" class="form-group storetable">
        <table class="table table-responsive">
    <?php
    $even = mysql_query("select * from event where eventid not in (select eventid from storeevent where storeid = $_REQUEST[storeid]) and del=0");
    while ($fev = mysql_fetch_array($even)) {
        ?>
                <tr>
                    <td><i class="fa fa-plus" style=" cursor:pointer; text-align: center;color:#65CEA7;" onclick="reestore('storeevent','store','update','<?php echo $_REQUEST[storeid] ?>','<?php echo $fev[0]; ?>'); bbackup('event','store','update','<?php echo $_REQUEST[storeid] ?>','<?php echo $fcui[0]; ?>','backup');"></i></td>
                    <td style="text-transform: capitalize; "><?php echo $fev[1]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </form>
            <?php
        }


        if ($_REQUEST[backup] == "backup") {
            if ($_REQUEST[storeevent] == "storeevent" || $_REQUEST[event] == "event") {
                if ($_REQUEST[shu] == "del") {
                    $upstoreevent = mysql_query("delete from foodlocker.storeevent where storeid=$_REQUEST[storeid] and  eventid=$_REQUEST[eventid] ");
                }
            }
            if (($_REQUEST[storeevent] == "storeevent" || $_REQUEST[event] == "event") && $_REQUEST[shema] == "store" && ($_REQUEST[shu] == "dis" || $_REQUEST[shu] == "update" || $_REQUEST[shu] == "up" || $_REQUEST[shu] == "del")) {
                ?>                                               
        <form action="" method="post" name="adddevent" class="form-group storetable">
            <table class="table table-responsive">
        <?php
        $storeevent = mysql_query(" select se.*,e.eventname from storeevent se,event e where e.eventid=se.eventid and se.storeid=$_REQUEST[storeid] and e.del=0");

        while ($fcu = mysql_fetch_array($storeevent)) {
            ?>
                    <tr>
                        <td class="td1"><i class="fa fa-minus"   style=" cursor: pointer; text-align: center;color:#424F63;" onclick="bbackup('event','store','del','<?php echo $_REQUEST[storeid] ?>','<?php echo $fcu[1]; ?>','backup'); reestore('storeevent','store','dis','<?php echo $_REQUEST[storeid]; ?>','0'); "></i></td>
                        <td style="text-transform: capitalize; " title="<?php echo $fcu[3]; ?>"><?php echo $fcu[3]; ?></td>
                    </tr>
            <?php
        }
        ?>
            </table>
        </form>
                <?php
            }
        }
        ?>


<!-----------------------------------------MANAGE  FEEDBACK STORE-------------------------------------------->
    
<?php
if ($_REQUEST[konu] == "feedbackstore") {
    if ($_REQUEST[sukam] == "delete") {
        $ds = mysql_query("delete from feedbackstore where feedbackid=$_REQUEST[id]");
    }
    ?>
    <table class="table table-responsiv hale">
        <th>StoRe Name</th>
        <th>MemBer Name</th>
        <th>MesSage</th>
        <th></th>
    <?php
    $se = mysql_query("select storeid from store where userid like '$_SESSION[user]'");
    while ($see = mysql_fetch_array($se)) {
        $sc = mysql_query("select f.*,s.storename from feedbackstore f, store s where s.storeid=f.storeid and s.storeid=$see[0]");
        while ($scc = mysql_fetch_array($sc)) {
            ?>
                                                     
                <tr>

                    <td style="text-transform: capitalize;"><?php echo $scc[4]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[2]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[3]; ?></td>
                    <td><i class="fa  fa-trash-o" style="cursor: pointer;"  ondblclick="if(confirm('Are You Sure You Wont To  Permanataly DELETE')){missstore('feedbackstore','delete',<?php echo $scc[1]; ?>)}"></i></td>
                                                   
                </tr>
            <?php
        }
    }
    ?>
    </table>
                                        
        <?php
    }
    ?>
    
    
<!-----------------------------------------MANAGE  CONTACT STORE-------------------------------------------->
    
    
<?php
if ($_REQUEST[konu] == "contactstore") {
    if ($_REQUEST[sukam] == "delete") {
        $ds = mysql_query("delete from contactstore where contactid=$_REQUEST[id]");
    }
    ?>
    <table class="table table-responsive hale">
        <th>StoRe Name</th>
        <th>MemBer Name</th>
        <th>EmAil</th>
        <th>SubJect</th>
        <th>MesSage</th>
    <?php
    $se = mysql_query("select storeid from store where userid like '$_SESSION[user]'");
    while ($see = mysql_fetch_array($se)) {
        $sc = mysql_query("select c.*,s.storename from contactstore c, store s where s.storeid=c.storeid and s.storeid=$see[0]");
        while ($scc = mysql_fetch_array($sc)) {
            ?>
                <tr>
                    <td style="text-transform: capitalize;"><?php echo $scc[6]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[2]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[3]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[4]; ?></td>
                    <td style="text-transform: capitalize;"><?php echo $scc[5]; ?></td>
                    <td><i class="fa  fa-trash-o" style="cursor: pointer;" ondblclick="if(confirm('Are You Sure You Wont To  Permanataly DELETE')){missstore('contactstore','delete',<?php echo $scc[1]; ?>)}"></i></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <?php
}
?>



<!----------------------------------------MANAGE STORE PACKAGE MIS----------------------------------------->

<?php
if($_REQUEST[kona]=="sellerseapack")
{
  
?>

    <table class="table table-responsive mis">
    
    <tr>
        <th>No.</th>
        <th>Store Name</th>
        <th>Package Duration</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>
                                   
    <?php
    $c = 0;
       
   
            if($_REQUEST[koni]=="badhu")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and s.userid like '$_SESSION[user]' ");
            }
            if($_REQUEST[koni]=="business")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and s.storename like '$_REQUEST[su]%' and s.userid like '$_SESSION[user]' ");
            }
             if($_REQUEST[koni]=="duration")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and d.durationtime like '$_REQUEST[su]%' and s.userid like '$_SESSION[user]' ");
            }
             if($_REQUEST[koni]=="amout")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and d.cost like '$_REQUEST[su]%' and s.userid like '$_SESSION[user]' ");
            }
             if($_REQUEST[koni]=="date")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and b.billdate like '$_REQUEST[su]%' and s.userid like '$_SESSION[user]' ");
            }
            
            while ($row1 = mysql_fetch_array($data1))
            {
            $c++;
        ?>
                                            
            <tr align="center" >
                <td style="text-transform: capitalize;" class="f" title="<?php echo $c; ?>">
            <?php echo $c; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[0]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[1]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[2]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[3]; ?>
                </td>
            </tr>
                                                
                                                
                                                
            <?php
        }
    
    ?>

            <tr  align="center" style="background-color:#65CEA7;color: #FFFFFF;">
        <td colspan="2" style="background-color:#65CEA7;color: #FFFFFF;"  >  Total Package MIS Record Are : <?php echo $c; ?></td>
        <td  colspan="2" style="background-color:#65CEA7;color: #FFFFFF;">
          
        </td>
        <td  colspan="2" style="background-color:#65CEA7;color: #FFFFFF;" >
            <font onclick="sellermis();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>


<!----------------------------------------MANAGE STORE BANNER MIS----------------------------------------->

<?php
if($_REQUEST[kona]=="sellerbannerpack")
{
  
?>
    <table class="table table-responsive mis">
    
     <tr>
        <th>No.</th>
        <th>User Name</th>
        <th>Store Name</th>
        <th>Time Period</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Banner</th>
    </tr>
                                   
    <?php
    $c = 0;
       
   
              if($_REQUEST[koni]=="badhu")
            {
                    $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' ");
            }
             if($_REQUEST[koni]=="seller")
            {
                    $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' and s.userid like '$_REQUEST[su]%'  ");
            }
            if($_REQUEST[koni]=="business")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' and s.storename like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="timeperiod")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' and t.timeperiodname like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="amout")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' and t.price like '$_REQUEST[su]%' ");
            }
            
             if($_REQUEST[koni]=="date")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_SESSION[user]' and b.billdate like '$_REQUEST[su]%' ");
            }
            
            
            while ($row1 = mysql_fetch_array($data1))
            {
            $c++;
        ?>
                                            
             <tr align="center" >
                <td style="text-transform: capitalize;" class="f" title="<?php echo $c; ?>">
            <?php echo $c; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[0]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[1]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[2]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[3]; ?>
                </td>
                <td style="text-transform: capitalize;">
                <?php echo $row1[4]; ?>
                </td>
                <td>
                    <img src="../seller/<?php echo $row1[5]; ?>" style="width: 70px ;height: 70px;border-radius:100px;" title="<?php echo $row1[5]; ?>" />
                </td>
            </tr>                          
                                                
                                                
            <?php
        }
    
    ?>

    <tr  align="center" style="background-color:#65CEA7;color: #FFFFFF;">
        <td colspan="2" style="background-color:#65CEA7;color: #FFFFFF;" >  Total Banner MIS Record Are : <?php echo $c; ?></td>
        <td  class="cont" colspan="3">
          
        </td>
        <td  colspan="2" style="background-color:#65CEA7;color: #FFFFFF;">
            <font onclick="sellermis();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>



<!----------------------------------------MANAGE INQUIRY----------------------------------------->


<?php

if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "inquiry") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("delete from inquiry where inid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("delete from inquiry");
        }

        $pp = 8;
        $d = mysql_query("select count(inid) from inquiry where del=0");
        $dd = mysql_fetch_array($d);
        $_SESSION[durationcount] = $dd[0];
        $page = ceil($_SESSION[durationcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Store Name</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Message</th>
            
        <?php
       
        
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
        
           
            $data = mysql_query("select s.storename,i.proname,i.url,ii.* from store s,item i,inquiry ii where s.storeid=ii.storeid and i.productid=ii.productid and ii.storeid in (select storeid from store where userid like '$_SESSION[user]') limit $st,$pp ");
        } else {
            $data = mysql_query("select s.storename,i.proname,i.url,ii.* from store s,item i,inquiry ii where s.storeid=ii.storeid and i.productid=ii.productid and ii.storeid in (select storeid from store where userid like 'navjivan') and i.proname like '$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','inquiry',1,'all','vachhe','<?php echo $row[5]; ?>',0);recdis('recdata','inquiry',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td style="text-align: center;width:10%;"><img src="<?php echo $row[2]; ?>" width="100%"/></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="8">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','inquiry','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                <?php
            }
            for ($i = $s; $i <= $e; $i++) {
                if ($_REQUEST[page] == $i) {
                    ?>

                                    <li class="pageactive" onclick="dis('data','inquiry','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                        <?php
                    } else {
                        ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','inquiry','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                                    <?php
                                }
                            }
                            if ($page > 4) {
                                if ($_REQUEST[page] != $page) {
                                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','inquiry','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


        <?php
    }
}
?>




<!--------------------------------------------------------VIEW SELLER USER BILL-------------------------------------------->


<?php

if($_REQUEST[kona]=="sellbill")
{
    
    if($_REQUEST[id]!='0')
    {
        if($_REQUEST[shu]=="store")
        {
            $_SESSION[store]=$_REQUEST[id];
             $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i,user u where u.userid=b.userid and i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and i.storeid=$_REQUEST[id] group by b.billid order by b.billid desc ");
        }
       
        if($_REQUEST[shu]=="billno")
        {
             $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.billid=$_REQUEST[id] and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
        }
        if($_REQUEST[shu]=="user")
        {
             $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and t.userid like '$_REQUEST[id]' and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
        }
        if($_REQUEST[shu]=="payname")
        {
             $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.paymethod like '$_REQUEST[id]' and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
        }
        if($_REQUEST[shu]=="date")
        {
             $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.billdate like '$_REQUEST[id]' and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
        }
        if($_REQUEST[shu]=="lprice" || $_REQUEST[shu]=="hprice")
        {
        if($_REQUEST[lp]=="" && $_REQUEST[hp]!="")
        {
          
            $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.finalamount between 0 and $_REQUEST[hp] and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
        }
        if($_REQUEST[lp]!="" && $_REQUEST[hp]!="")
        {
             
        }  $gh=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.finalamount between $_REQUEST[lp] and $_REQUEST[hp] and s.userid like '$_SESSION[user]' group by b.billid order by b.billid desc ");
     }
    }
    
    while($ghh=  mysql_fetch_array($gh))
    {
   
    ?>
                                         
<div class="col-md-offset-3 col-md-7"  >
                    <table class="table table-responsive" style="width:100%;background-color: whitesmoke;  border: 1px dotted #f8a631 !important;">
                        
                            <tr>
                                <td colspan="2" style="border:none;text-align: center;">
                                     <img  src="../images/about.png" width="40%"/>
                                </td>
                            </tr>
                    <?php
                    $c=0;
                    $q=0;
                    $pb=0;
                    $p=0;
                    $d=0;
                    $dis=0;
                    
                        $cs=  mysql_query("select c.cityname,a.areaname,s.* from city c,area a,shipping s where c.cityid=s.cityid and a.areaid=s.areaid and s.userid like '$ghh[3]'");
                        $csh = mysql_fetch_array($cs); 
                        
                     
                    ?>
                    
                       <tr>
                           <td colspan="2" style="text-align: center; border: 1px dotted #f8a631 !important;">
                               348,Royal Squre, VIP Circle,Utran,Surat
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2" style=" border: 1px dotted #f8a631 !important;text-align: center;">
                               <strong>Mo :</strong><font>7874259262 , 8758722336</font>
                           </td>
                       </tr>
                            
                        <tr>
                            <td style="border:none;">
                               <strong>Name :</strong>&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[6]; ?></font>
                           </td>
                           <td>
                              <strong>Bill No :</strong>&nbsp;<font style="text-transform: capitalize;"><?php echo $ghh[12]; ?></font>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2" style="border:none;">
                               <strong>Date :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ghh[13]; ?></font>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2" style="border:none;">
                              <strong>Address :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ghh[16]; ?></font>
                           </td>
                       </tr>
                        
                        <tr>
                           <td style="border:none;">
                               <strong>City :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[0]; ?></font>
                           </td>
                           <td style="border:none;">
                               <strong>Area :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[1]; ?></font>
                           </td>
                        </tr>
                      
                      <tr>
                           <td colspan="2" style="border:none;">
                               <strong>Pin Code :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[9]; ?></font>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2" style="border:none;">
                               <strong>Mo :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[8]; ?></font>
                           </td>
                       </tr>
                       
                       <tr>
                           <td colspan="2" >
                               <table class="table table-responsive" style="width:100%;">
                                    <tr>   
                                        <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">No.</th>
                                     <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">STORE</th>
                                    <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">ITEM</th>
                                     <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">DISCOUNT</th>
                                    <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">QTY</th>
                                    <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">PRICE</th>
                                    <th style=" border: 1px dotted #f8a631 !important; text-transform: capitalize;font-size: 13px;">AMOUNT</th>
                                   
                                    </tr>
                                    <?php
                          
                        
                           $sp=mysql_query("select i.proname,i.url,s.storename,t.* from item i,transaction t,store s where i.productid = t.productid and s.storeid = i.storeid and t.transactionid in(select t.transactionid from transaction t,item i,bill b where i.productid=t.productid and b.billid=t.billid and i.storeid=$ghh[storeid] and b.billid=$ghh[billid])"); 
                           while ($spp = mysql_fetch_array($sp)) 
                           {
                               $q=$q+$spp[7];
                               $p=$p+$spp[8];
                               $dis=$dis+$spp[10];
                               $pb=$pb+($spp[11]);
                               
                            $c++;
                                    ?>
                                    <tr >
                                        <td style="  border: 1px dotted #f8a631 !important;text-transform: capitalize; font-size: 13px;"><?php echo $c; ?></td>
                                         <td style=" border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;"><?php echo $spp[2]; ?></td>
                                         <td style=" border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;"><?php echo $spp[0]; ?></td>
                                         <td style="width:10%; border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;">
                                        <?php echo $spp[10]; ?>&#8377;
                                         </td>
                                         <td style=" border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;"><?php echo $spp[7]; ?></td>
                                         <td style=" border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;"><?php echo $spp[8]; ?>&#8377;</td>
                                         <td style=" border: 1px dotted #f8a631 !important;text-transform: capitalize;font-size: 13px;"><?php echo ($spp[7])*($spp[8]); ?>&#8377;</td>
                                    </tr>
                                    <?php
                                    
                           }
                                    ?>
                                     </table>
                           </td>
                       </tr>
                        
                       <tr>
                           <td style="border:none;">
                               <strong> Total QTY : </strong><font><?php echo $q; ?></font><br/>
                               <strong> Services Charge Text consultant 2% : </strong><font><?php echo $chupay=ceil(($pb*2)/(100));?>&#8377;</font><br/>
                               <strong> Shipping charge : </strong><font>100 &#8377;</font><br/>
                           </td>
                           <?php 
                           $np=($chupay+$pb+100)-$dis;
                           ?>
                           <td style="border:none;">
                                 <strong> Payable Amount : </strong><font><?php echo $np; ?>&#8377;</font>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <div onclick="printbill();" style="cursor: pointer;">Print</div>
                                     
                           </td>
                       </tr>
                       
                       
                                     <div class="  col-md-6" style="padding-top: 10px">
                                  
                                    
                                </div>
                                </table>
                            </div>
                        </div>
                        
                        
                    </div><br/><br/><br/><br/>
                    <?php
                      $c=0;
                      $q=0;
                      $pb=0;
                      $dis=0;
                      $chupay=0;
                      
//                    }
                      
                    ?>
                </div>

   

<?php
}
}
?>





                
 <?php
if($_REQUEST[kona]=="sellerusemis")
{
  
?>

    <table class="table table-responsive mis">
    
    <tr>
        <th>Index.</th>
        <th>Bill No.</th>
        <th>Tra.Id</th>
        <th>Buyer Name</th>
        <th>Bill Date</th>
         <th>Bill Amount</th>
        <th>Discount</th>
        <th>Payment Type</th>
    </tr>
                                
    <?php
    $c = 0;
       
       if($_REQUEST[koni]=="store")
            {
                $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and t.productid in ( select productid from item where storeid =$_REQUEST[su]  )");
            }
            if($_REQUEST[koni]=="badhu")
            {
                $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and t.productid in ( select productid from item where storeid =$_REQUEST[su]  )");
            }
            if($_REQUEST[koni]=="billno")
            {
                $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.billid=$_REQUEST[su] and s.userid like '$_SESSION[user]'  ");
            }
             if($_REQUEST[koni]=="paymethod")
            {
                $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.paymethod like '$_REQUEST[su]' and s.userid like '$_SESSION[user]'   ");
            }
            
             if($_REQUEST[koni]=="fdate")
            {
                $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and b.billdate like '$_REQUEST[su]' and s.userid like '$_SESSION[user]'  ");
            }
            
             if($_REQUEST[koni]=="lprice" || $_REQUEST[koni]=="hprice")
        {
        if($_REQUEST[lp]=="" && $_REQUEST[hp]!="")
        {
          
            $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and t.grandtotal between 0 and $_REQUEST[hp] and s.userid like '$_SESSION[user]'  ");
        }
        if($_REQUEST[lp]!="" && $_REQUEST[hp]!="")
        {
             
        }  $data1=mysql_query("select s.userid,s.storeid,t.*,b.* from bill b, transaction t,store s,item i where i.productid = t.productid and s.storeid = i.storeid and b.billid = t.billid and t.grandtotal between $_REQUEST[lp] and $_REQUEST[hp] and s.userid like '$_SESSION[user]'  ");
     }
           
            
            while ($row1 = mysql_fetch_array($data1))
            {
            $c++;
        ?>
                                            
            <tr align="center" >
                <td style="text-transform: capitalize;" class="f" title="<?php echo $c; ?>">
            <?php echo $c; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[2]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[5]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[3]; ?>
                </td>
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[13]; ?>
                </td>
                  <td style="text-transform: capitalize;">
                    <?php echo $row1[10]; ?>
                </td>
                <td style="text-transform: capitalize;">
                    <?php echo $row1[9]; ?>
                </td>
              
                                                    
                <td style="text-transform: capitalize;">
                <?php echo $row1[17]; ?>
                </td>
                
            </tr>
                                                
                                                
                                                
            <?php
        }
    
    ?>

            <tr  align="center"  style=" background-color:#65CEA7;color: #FFFFFF;">
                <td colspan="4" style="background-color:#65CEA7;color: #FFFFFF;"  >  Total Package MIS Record Are : <?php echo $c; ?></td>
        <td colspan="3"  style="background-color:#65CEA7;color: #FFFFFF;">
          
        </td>
        <td colspan="3" style="background-color:#65CEA7;color: #FFFFFF;" >
            <font onclick="printbill();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>
               
                
                
<!----------------------------------------MANAGE OFFER----------------------------------------->




<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "offer") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
            <div class="form-group">
                <div class="input-group">
                    <select name="mcat" class="form-control">
                        <option>--Select Main Category--</option>
                        <?php
                            $mcat=  mysql_query("select m.mcatname,m.mcatid,s.storeid,s.userid from maincategory m,store s,cuisine c where m.mcatid=c.mcatid and s.storeid=c.storeid and s.userid like '$_SESSION[user]'");
                        while($mm=  mysql_fetch_array($mcat))
                        {
                        ?>
                        
                        <option value="<?php echo $mm[1]; ?>"><?php echo $mm[0]; ?></option>
                        
                        <?php
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <select name="store" class="form-control">
                        <option>--Select Store Name--</option>
                        <?php
                            $store=mysql_query("SELECT storename,storeid from store where userid like '$_SESSION[user]'");
                        while($ss=  mysql_fetch_array($store))
                        {
                        ?>
                        
                        <option value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        
                        <?php
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="offname"  required="" pattern="^[a-z ]+$" placeholder="Enter Offer Name"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="date" class="form-control" name="sdate" required="" />
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="date" class="form-control" name="edate" required="" />
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="lprice" required="" pattern="^[0-9]+$" placeholder="Enter Low Price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="hprice" required="" pattern="^[0-9]+$" placeholder="Enter High Price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="rate" required="" pattern="^[0-9]+$" placeholder="Enter Offer Rate"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <button type="submit" name="send" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>


            <?php
        } else {
            $_SESSION[uid] = $_REQUEST[id];
            $in = mysql_query("select * from offer where del=0 and offerid=$_REQUEST[id]");
            $du = mysql_fetch_array($in);
            ?>
            <div class="form-group">
                <div class="input-group">
                    <select name="upmcat" class="form-control">
                        <option>--Select Main Category--</option>
                        <?php
                            $mcat=  mysql_query("select m.mcatname,m.mcatid,s.storeid,s.userid from maincategory m,store s,cuisine c where m.mcatid=c.mcatid and s.storeid=c.storeid and s.userid like '$_SESSION[user]'");
                        while($mm=  mysql_fetch_array($mcat))
                        {
                            if($du[0]==$mm[1])
                            {
                        ?>
                        
                        <option selected="" value="<?php echo $mm[1]; ?>"><?php echo $mm[0]; ?></option>
                        
                        <?php
                        }
                        else
                        {
                         ?>
                        
                        <option value="<?php echo $mm[1]; ?>"><?php echo $mm[0]; ?></option>
                        
                        <?php
                        }
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <select name="upstore" class="form-control">
                        <option>--Select Store Name--</option>
                        <?php
                            $store=mysql_query("SELECT storename,storeid from store where userid like '$_SESSION[user]'");
                        while($ss=  mysql_fetch_array($store))
                        {
                            if($du[1]==$ss[1])
                            {
                        ?>
                        
                        <option selected="" value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        
                        <?php
                        }
                        else
                        {
                        ?>
                        
                        <option value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        <?php
                        }
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="upoffname" value="<?php echo $du[3]; ?>" required="" pattern="^[a-z ]+$" placeholder="Enter Offer Name"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="date" class="form-control" name="upsdate" value="<?php echo $du[4]; ?>" required="" />
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="date" class="form-control" name="upedate" value="<?php echo $du[5]; ?>" required="" />
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="uplprice" required="" value="<?php echo $du[6]; ?>" pattern="^[0-9]+$" placeholder="Enter Low Price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="uphprice" required="" value="<?php echo $du[7]; ?>" pattern="^[0-9]+$" placeholder="Enter High Price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">
                    <input type="text" class="form-control" name="uprate" required="" value="<?php echo $du[8]; ?>" pattern="^[0-9]+$" placeholder="Enter Offer Rate"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            
            <button type="submit" name="upsend" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>

            <?php
        }
    }
}
?>


<?php
if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "offer") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update offer set del=1 where offerid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update offer set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(offerid) from offer where del=0");
        $dd = mysql_fetch_array($d);
        $_SESSION[durationcount] = $dd[0];
        $page = ceil($_SESSION[durationcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Mcat Name</th>
            <th>Store Name</th>
            <th>Offer Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Low Price</th>
            <th>High Price</th>
            <th>Rate</th>
            <th></th>
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select m.mcatname,s.storename,f.* from maincategory m,store s,cuisine c,offer f where f.del=0 and m.mcatid=c.mcatid and s.storeid=c.storeid and m.mcatid=f.mcatid and s.storeid=f.storeid and s.userid like '$_SESSION[user]' order by f.offername limit $st,$pp ");
        } else {
            $data = mysql_query("select m.mcatname,s.storename,f.* from maincategory m,store s,cuisine c,offer f where f.del=0 and m.mcatid=c.mcatid and s.storeid=c.storeid and m.mcatid=f.mcatid and s.storeid=f.storeid and s.userid like '$_SESSION[user]' and f.offername like '%$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','offer',1,'all','vachhe','<?php echo $row[4]; ?>',0);recdis('recdata','offer',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><?php echo $row[10]; ?></td>
                    <td onclick="form('form','offer','update','<?php echo $row[4]; ?>');"><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" ></i></td>
               
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="10">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','offer','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                    <?php
                }
                for ($i = $s; $i <= $e; $i++) {
                    if ($_REQUEST[page] == $i) {
                        ?>

                                    <li class="pageactive" onclick="dis('data','offer','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                } else {
                    ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','offer','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','offer','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


                        <?php
                    }
                }
                ?>


                <?php
                if ($_REQUEST[kona] == "recdata") {
                    if ($_REQUEST[konu] == "offer") {
                        if ($_REQUEST[recid] != 0) {
                            $up = mysql_query("update offer set del=0 where offerid=$_REQUEST[recid]");
                        }
                        if ($_REQUEST[delid] != 0) {
                            $del = mysql_query("delete from offer where offerid=$_REQUEST[delid]");
                        }
                        if ($_REQUEST[badhudel] == "badhu") {
                            $del = mysql_query("delete from offer where del=1");
                        }
                        $pp = 8;
                        $d1 = mysql_query("select count(offerid) from offer where del=1");
                        $dd1 = mysql_fetch_array($d1);
                        $_SESSION[durationreccount] = $dd1[0];
                        $page = ceil($_SESSION[durationreccount] / $pp);

                        $st = ($_REQUEST[page] * $pp) - $pp;

                        if ($page > 4) {
                            if ($_REQUEST[page] > 4) {
                                if ($_REQUEST[disha] == "vachhe") {
                                    $s = $_REQUEST[page] - 3;
                                    $e = $_REQUEST[page];
                                }
                                if ($_REQUEST[disha] == "agal") {
                                    $s = $_REQUEST[page] - 3;
                                    $e = $_REQUEST[page];
                                }
                                if ($_REQUEST[disha] == "pachhal") {
                                    $s = $_REQUEST[page];
                                    $e = $_REQUEST[page] + 3;
                                }
                            } else {
                                $s = 1;
                                $e = 4;
                            }
                        } else {
                            $s = 1;
                            $e = $page;
                        }
                        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Mcat Name</th>
            <th>Store Name</th>
            <th>Offer Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Low Price</th>
            <th>High Price</th>
            <th>Rate</th>
            <th></th>
        <?php
        $c = 0;
        $data = mysql_query("select m.mcatname,s.storename,f.* from maincategory m,store s,cuisine c,offer f where f.del=1 and m.mcatid=c.mcatid and s.storeid=c.storeid and m.mcatid=f.mcatid and s.storeid=f.storeid and s.userid like '$_SESSION[user]' order by f.offername limit $st,$pp ");



        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','offer',1,'all','vachhe','<?php echo $row[4]; ?>',0,0);dis('data','offer',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td><?php echo $row[8]; ?></td>
                    <td><?php echo $row[9]; ?></td>
                    <td><?php echo $row[10]; ?></td>
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','offer',1,'all','vachhe',0,'<?php echo $row[4]; ?>',0);"></i></td>
                    
                </tr>


            <?php
        }
        ?>

            <tr>
                <td colspan="10">
                    <ul class="pageing">
        <?php
        if ($_REQUEST[page] > 4) {
            ?>
                            <li title="<?php echo $s - 1; ?>" onclick="recdis('recdata','offer','<?php echo $s - 1; ?>','all','pachhal',0,0,0);"><</li>
            <?php
        }
        for ($i = $s; $i <= $e; $i++) {
            if ($_REQUEST[page] == $i) {
                ?>

                                <li class="pageactive" onclick="recdis('recdata','offer','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                <?php
            } else {
                ?>


                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','offer','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','offer','<?php echo $i; ?>','all','agal',0,0,0);">></li>


                    <?php
                }
            }
            ?>
                    </ul>
                </td>
            </tr>

        </table>


            <?php
        }
    }
    ?>

            
            
            
<!----------------------------------------MANAGE EVENT PRICE----------------------------------------->




<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "eventprice") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
            

            <div class="form-group">
                <div class="input-group">
                    <select name="store" class="form-control">
                        <option>--Select Store Name--</option>
                        <?php
                            $store=mysql_query("select storename,storeid from store where userid like '$_SESSION[user]'");
                        while($ss=  mysql_fetch_array($store))
                        {
                        ?>
                        
                        <option value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        
                        <?php
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

              <div class="form-group">
                <div class="input-group">
                    <select name="event" class="form-control" id="missstoreevent">
                        <option>--Select Event--</option>
                       
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

           

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="price"  required="" pattern="^[0-9]+$" placeholder="Enter event price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>


            <button type="submit" name="send" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>


            <?php
        } else {
            $_SESSION[uid] = $_REQUEST[id];
            $in = mysql_query("select * from offer where del=0 and offerid=$_REQUEST[id]");
            $du = mysql_fetch_array($in);
            ?>
            

            <div class="form-group">
                <div class="input-group">
                    <select name="upstore" class="form-control">
                        <option>--Select Store Name--</option>
                        <?php
                            $store=mysql_query("SELECT storename,storeid from store where userid like '$_SESSION[user]'");
                        while($ss=  mysql_fetch_array($store))
                        {
                            if($du[1]==$ss[1])
                            {
                        ?>
                        
                        <option selected="" value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        
                        <?php
                        }
                        else
                        {
                        ?>
                        
                        <option value="<?php echo $ss[1]; ?>"><?php echo $ss[0]; ?></option>
                        <?php
                        }
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <select name="upevent" class="form-control">
                        <option>--Select Main Category--</option>
                        <?php
                            $mcat=  mysql_query("select m.mcatname,m.mcatid,s.storeid,s.userid from maincategory m,store s,cuisine c where m.mcatid=c.mcatid and s.storeid=c.storeid and s.userid like '$_SESSION[user]'");
                        while($mm=  mysql_fetch_array($mcat))
                        {
                            if($du[0]==$mm[1])
                            {
                        ?>
                        
                        <option selected="" value="<?php echo $mm[1]; ?>"><?php echo $mm[0]; ?></option>
                        
                        <?php
                        }
                        else
                        {
                         ?>
                        
                        <option value="<?php echo $mm[1]; ?>"><?php echo $mm[0]; ?></option>
                        
                        <?php
                        }
                        }
                        ?>
                    </select>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="upprice" value="<?php echo $du[3]; ?>" required="" pattern="^[a-z ]+$" placeholder="Enter Price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>

           
            
            <button type="submit" name="upsend" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>

            <?php
        }
    }
}
?>


<?php
if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "eventprice") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update eventprice set del=1 where eventid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update eventprice set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(eventid) from eventprice where del=0");
        $dd = mysql_fetch_array($d);
        $_SESSION[durationcount] = $dd[0];
        $page = ceil($_SESSION[durationcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Store Name</th>
            <th>Event Name</th>
            <th>Price</th>
            
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select ep.eventid,s.storename,e.eventname,ep.price from store s,event e,eventprice ep where s.storeid=ep.storeid and e.eventid=ep.eventid and ep.del=0 and userid like '$_SESSION[user]' order by e.eventname limit $st,$pp ");
        } else {
            $data = mysql_query("select ep.eventid,s.storename,e.eventname,ep.price from store s,event e,eventprice ep where s.storeid=ep.storeid and e.eventid=ep.eventid and ep.del=0 and userid like '$_SESSION[user]' order by e.eventname and e.eventname like '%$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','eventprice',1,'all','vachhe','<?php echo $row[0]; ?>',0);recdis('recdata','eventprice',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="10">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','eventprice','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                    <?php
                }
                for ($i = $s; $i <= $e; $i++) {
                    if ($_REQUEST[page] == $i) {
                        ?>

                                    <li class="pageactive" onclick="dis('data','eventprice','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                } else {
                    ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','eventprice','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','eventprice','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


                        <?php
                    }
                }
                ?>


                <?php
                if ($_REQUEST[kona] == "recdata") {
                    if ($_REQUEST[konu] == "eventprice") {
                        if ($_REQUEST[recid] != 0) {
                            $up = mysql_query("update eventprice set del=0 where eventid=$_REQUEST[recid]");
                        }
                        if ($_REQUEST[delid] != 0) {
                            $del = mysql_query("delete from eventprice where eventid=$_REQUEST[delid]");
                        }
                        if ($_REQUEST[badhudel] == "badhu") {
                            $del = mysql_query("delete from eventprice where del=1");
                        }
                        $pp = 8;
                        $d1 = mysql_query("select count(eventid) from offer where del=1");
                        $dd1 = mysql_fetch_array($d1);
                        $_SESSION[durationreccount] = $dd1[0];
                        $page = ceil($_SESSION[durationreccount] / $pp);

                        $st = ($_REQUEST[page] * $pp) - $pp;

                        if ($page > 4) {
                            if ($_REQUEST[page] > 4) {
                                if ($_REQUEST[disha] == "vachhe") {
                                    $s = $_REQUEST[page] - 3;
                                    $e = $_REQUEST[page];
                                }
                                if ($_REQUEST[disha] == "agal") {
                                    $s = $_REQUEST[page] - 3;
                                    $e = $_REQUEST[page];
                                }
                                if ($_REQUEST[disha] == "pachhal") {
                                    $s = $_REQUEST[page];
                                    $e = $_REQUEST[page] + 3;
                                }
                            } else {
                                $s = 1;
                                $e = 4;
                            }
                        } else {
                            $s = 1;
                            $e = $page;
                        }
                        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Store Name</th>
            <th>Event Name</th>
            <th>Price</th>
            
            <th></th>
        <?php
        $c = 0;
        $data = mysql_query("select ep.eventid,s.storename,e.eventname,ep.price from store s,event e,eventprice ep where s.storeid=ep.storeid and e.eventid=ep.eventid and ep.del=1 and userid like '$_SESSION[user]' order by e.eventname limit $st,$pp ");



        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','eventprice',1,'all','vachhe','<?php echo $row[0]; ?>',0,0);dis('data','eventprice',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','eventprice',1,'all','vachhe',0,'<?php echo $row[0]; ?>',0);"></i></td>
                    
                </tr>


            <?php
        }
        ?>

            <tr>
                <td colspan="10">
                    <ul class="pageing">
        <?php
        if ($_REQUEST[page] > 4) {
            ?>
                            <li title="<?php echo $s - 1; ?>" onclick="recdis('recdata','eventprice','<?php echo $s - 1; ?>','all','pachhal',0,0,0);"><</li>
            <?php
        }
        for ($i = $s; $i <= $e; $i++) {
            if ($_REQUEST[page] == $i) {
                ?>

                                <li class="pageactive" onclick="recdis('recdata','eventprice','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                <?php
            } else {
                ?>


                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','eventprice','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','eventprice','<?php echo $i; ?>','all','agal',0,0,0);">></li>


                    <?php
                }
            }
            ?>
                    </ul>
                </td>
            </tr>

        </table>


            <?php
        }
    }
    ?>
            
            
            
 <!----------------------------------------MANAGE EVENT BOOK----------------------------------------->


<?php
if ($_REQUEST[tbl] == "eventbook") {

    
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from eventbook ");
        } else {
            mysql_query("delete from eventbook where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[work] == "confirm") {
        $inb = mysql_query("select * from eventbook where userid like '$_REQUEST[id]'");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[7] == 0) {
            $b = mysql_query("update eventbook set confirm=1 where userid like '$_REQUEST[id]'");
        } else {
            $b = mysql_query("update eventbook set confirm=0 where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from eventbook");
    } else {
        $in = mysql_query("select count(*) from eventbook where date like '%$_REQUEST[find]%'  ");
    }
    $a = mysql_fetch_array($in);
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>Store Name</th>
        <th>Event Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Detail</th>
        <th>Confirm</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $eb=mysql_query("select storeid from store where active=1 and userid like '$_SESSION[user]'");
        $ebb=mysql_fetch_array($eb);
        
        $get = mysql_query("select s.storename,e.eventname,eb.* from store s,event e,eventbook eb where s.storeid=eb.storeid and e.eventid=eb.eventid and eb.storeid=$ebb[0] order by eventname  limit $st,$pp");
    } else {
        
          $eb=mysql_query("select storeid from store where active=1 and userid like '$_SESSION[user]");
        $ebb=mysql_fetch_array($eb);
        $get = mysql_query("select s.storename,e.eventname,eb.* from store s,event e,eventbook eb where s.storeid=eb.storeid and e.eventid=eb.eventid and eb.storeid=$ebb[0] and eb.date like '%$_REQUEST[find]%' limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[2]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('eventbook','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[5]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('eventbook','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[5]; ?>');recycle('eventbook','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><?php echo $row[8]; ?></td> 
                <td>
            <?php
             if ($row[9] == 0) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;" onclick="blk('eventbook','confirm','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[2]; ?>');"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;" onclick="blk('eventbook','confirm','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[2]; ?>');"></i>

                <?php
            }
            ?>
                </td>
                <td></td>

            </tr>
            <?php
        }
    }
    if ($page >= 5) {
        $start = $p - 2;
        $end = $p + 2;

        if ($start < 1) {
            $start = 1;
            $end = 5;
        }
        if ($end > $page) {
            $start = $page - 4;
            $end = $page;
        }
    } else {
        $start = 1;
        $end = $page;
    }
    ?>
    <tr>
        <td colspan="8">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('eventbook','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('eventbook','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('eventbook','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
                <?php
            }
            ?>
            </ul>

        </td>
    </tr>
    </table>
            <?php
        }
        ?>

 
 
 
 <!-----------------------------------------MANAGE BROCHURE-------------------------------------------->


<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "brochure") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
 
 
             <div class="form-group">
                 <div class="input-group">

                     <select name="storeid" class="form-control">
                         <option>--Select Name--</option>
                         <?php
                          $b=mysql_query("select storeid,storename from store where active=1 and userid like '$_SESSION[user]'");
                          while($bb=mysql_fetch_array($b))
                          {
                         ?>
                         
                         <option value="<?php echo $bb[0]; ?>"><?php echo $bb[1]; ?></option>
                         
                         <?php
                            }
                         ?>
                         
                     </select>
                     <div class="input-group-addon">
                         <i  class="fa fa-globe"></i>
                     </div>
                 </div>
             </div>
                                                    
             <div class="form-group">
                 <div class="input-group">

                     <input type="text" class="form-control" name="brochure" required="" pattern="^[a-z ]+$" placeholder="Enter Brochure Name"/>
                     <div class="input-group-addon">
                         <i  class="fa fa-globe"></i>
                     </div>
                 </div>
             </div>
                                                    
             <div class="form-group">
                 <div class="input-group">

                     <input type="file" class="form-control" name="bpath" required="" />
                     <div class="input-group-addon">
                         <i  class="fa fa-globe"></i>
                     </div>
                 </div>
             </div>
             <button type="submit" name="send" class="btn btn-primary">Submit</button>
             <button type="reset" class="btn btn-primary">Reset</button>

         
            <?php
    }
    }
}
?>



<?php

if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "brochure") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update brochure set del=1 where broid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update brochure set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(broid) from brochure where del=0");
        $dd = mysql_fetch_array($d);
        $_SESSION[durationcount] = $dd[0];
        $page = ceil($_SESSION[durationcount] / $pp);

        $st = ($_REQUEST[page] * $pp) - $pp;

        if ($page > 4) {
            if ($_REQUEST[page] > 4) {
                if ($_REQUEST[disha] == "vachhe") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "agal") {
                    $s = $_REQUEST[page] - 3;
                    $e = $_REQUEST[page];
                }
                if ($_REQUEST[disha] == "pachhal") {
                    $s = $_REQUEST[page];
                    $e = $_REQUEST[page] + 3;
                }
            } else {
                $s = 1;
                $e = 4;
            }
        } else {
            $s = 1;
            $e = $page;
        }
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Store Name</th>
            <th>Brochure Name</th>
            <th>Photo</th>
           
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select s.storename,b.* from store s,brochure b where s.storeid=b.storeid and b.del=0 and userid like'$_SESSION[user]' limit $st,$pp ");
        } else {
            $data = mysql_query("select s.storename,b.* from store s,brochure b where s.storeid=b.storeid and b.del=0 and userid like'$_SESSION[user]' and s.storename like '$_REQUEST[ketla]%' or b.broname like '$_REQUEST[ketla]%' order by broname");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','brochure',1,'all','vachhe','<?php echo $row[2]; ?>',0);recdis('recdata','brochure',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                   
                </tr>


                <?php
            }
            if ($_REQUEST[ketla] == 'all') {
                ?>

                <tr>
                    <td colspan="4">
                        <ul class="pageing">
                <?php
                if ($_REQUEST[page] > 4) {
                    ?>
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','brochure','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                <?php
            }
            for ($i = $s; $i <= $e; $i++) {
                if ($_REQUEST[page] == $i) {
                    ?>

                                    <li class="pageactive" onclick="dis('data','brochure','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                        <?php
                    } else {
                        ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','brochure','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                                    <?php
                                }
                            }
                            if ($page > 4) {
                                if ($_REQUEST[page] != $page) {
                                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','brochure','<?php echo $i; ?>','all','agal',0,0);">></li>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </td>
            </tr>

        </table>


        <?php
    }
}
?>

            
            
<?php

if ($_REQUEST[kona] == "recdata") {
    if ($_REQUEST[konu] == "brochure") {
        if($_REQUEST[recid]!=0)
        {
            $up=mysql_query("update brochure set del=0 where broid=$_REQUEST[recid]");
        }
        if($_REQUEST[delid]!=0)
        {
            $del=mysql_query("delete from brochure where broid=$_REQUEST[delid]");
        }
        if($_REQUEST[badhudel]=="badhu")
        {
            $del=mysql_query("delete from brochure where del=1");
        }
        $pp=8;
        $d1=  mysql_query("select count(broid) from brochure where del=1");
                            $dd1=  mysql_fetch_array($d1);
                            $_SESSION[durationreccount]=$dd1[0];
        $page=ceil($_SESSION[durationreccount]/$pp);
        
        $st=($_REQUEST[page]*$pp)-$pp;
        
        if($page>4)
        {
            if($_REQUEST[page]>4)
            {
                if($_REQUEST[disha]=="vachhe")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="agal")
                {
                    $s=$_REQUEST[page]-3;
                    $e=$_REQUEST[page];
                }
                if($_REQUEST[disha]=="pachhal")
                {
                    $s=$_REQUEST[page];
                    $e=$_REQUEST[page]+3;
                }
            }
            else
            {
                $s=1;
                $e=4;
            }
            
        }
        else
        {
            $s=1;
            $e=$page;
        }
        
        ?>

        <table class="table table-responsive table-hover mytable">
            <th>No</th>
            <th>Store Name</th>
            <th>Brochure Name</th>
            <th>Photo</th>
            <th></th>
        <?php
        $c=0;
            $data = mysql_query("select s.storename,b.* from store s,brochure b where s.storeid=b.storeid and b.del=1 and userid like'$_SESSION[user]' limit $st,$pp ");
        
        
        
        while ($row = mysql_fetch_array($data)) 
        {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','brochure',1,'all','vachhe','<?php echo $row[2]; ?>',0,0);dis('data','brochure',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[0]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                                 
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','brochure',1,'all','vachhe',0,'<?php echo $row[2]; ?>',0);"></i></td>
                </tr>


                <?php
            }
            
            ?>
                
                <tr>
                    <td colspan="5">
                        <ul class="pageing">
                            <?php
                            if($_REQUEST[page]>4)
                            {
                                ?>
                            <li title="<?php echo $s-1; ?>" onclick="recdis('recdata','brochure','<?php echo $s-1; ?>','all','pachhal',0,0,0);"><</li>
                            <?php
                            }
                            for($i=$s;$i<=$e;$i++)
                            {
                                if($_REQUEST[page]==$i)
                                {
                            ?>
                            
                            <li class="pageactive" onclick="recdis('recdata','brochure','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                                else
                                {
                                    ?>
                            
                                    
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','item','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>
                            
                            <?php
                                }
                            }
                            if($page>4)
                            {
                                if($_REQUEST[page]!=$page)
                                {
                            ?>
                            
                            <li title="<?php echo $i; ?>" onclick="recdis('recdata','brochure','<?php echo $i; ?>','all','agal',0,0,0);">></li>
                            
                            
                            <?php
            
                    }
                }
                            ?>
                        </ul>
                    </td>
                </tr>
                
        </table>


            <?php
        }
}
?>

             
             
<!-- --------------------------------------------------------  Inquiry Notification  ------------------------------------------------->
             
             
             
<?php

if($_REQUEST[konu]=="inquiryin")
{
    if($_REQUEST[badhu]=="all")
    {
  
          $un=mysql_query("update inquiry set notification=1");

    echo "0";
        
    }
    else
    {
    $un=mysql_query("update inquiry set notification=1 where inid=$_REQUEST[id]");

    $inn=  mysql_query("select count(*) from inquiry where notification=0");
          $in=  mysql_fetch_array($inn);
          echo $in[0];
    }
}


if($_REQUEST[olkhan]=="inquiryid")
{
  ?>

<h5 class="title">You have 5 Mails </h5>
                    <ul class="dropdown-list normal-list">
                             <?php
                     $pin=  mysql_query("select u.url,u.proname,r.* from item u,inquiry r where u.productid=r.productid and r.notification=0 order by r.inid desc");
                     while ($in=  mysql_fetch_array($pin))
                     {
                    ?>
                        <li class="new" onclick="notification('inquiryin',<?php echo $in[4]; ?>,0);noti('inquiryid');">
                            <a href="#">
                                <span class="thumb"><img src="../seller/<?php echo $in[0]; ?>" style="height: 55px;" class="img img-responsive" alt="" /></span>
                                <span class="desc">
                                    <span class="name"><?php echo $in[5]; ?> <span class="badge badge-success">new</span></span>
                                   
                                    <span class="msg"><?php echo $in[8]; ?></span>
                                 &nbsp;<em class="small"><?php echo $in[6];  ?></em>&nbsp;&nbsp;<em class="small"><?php echo $in[7];  ?></em>
                                </span>
                            </a>
                        </li>
                        <?php
                     }
                        ?>
                        <li class="new" onclick="notification('inquiryin',0,'all');"><a href="manageinquiry.php">Read All Inquiry</a></li>
                    </ul>

<?php
}
?>