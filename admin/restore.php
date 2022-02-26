<?php
require_once 'connection.php';

require_once 'adminsecure.php';

?>

<!---------------------------------------MANAGE RESTORE STATE--------------------------------->

<?php
if ($_REQUEST[tbl] == "state") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update state set del = 0 where stateid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from state where del = 1");
        }
        else 
        {
            mysql_query("delete from state where stateid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from state where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>State Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from state where del=1 order by statename  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('state','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('state','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('state','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('state','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('state','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('state','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!-------------------------------------------------MANAGE RESTORE CITY-------------------------------------------------->


<?php

if ($_REQUEST[tbl] == "city") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update city set del = 0 where cityid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from city where del = 1");
        }
        else 
        {
            mysql_query("delete from city where cityid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from city where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>City Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from city where del=1 order by cityname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('city','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>');display('city','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('city','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('city','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('city','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('city','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!-------------------------------------------------MANAGE RESTORE AREA-------------------------------------------------->


<?php

if ($_REQUEST[tbl] == "area") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update area set del = 0 where areaid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from area where del = 1");
        }
        else 
        {
            mysql_query("delete from area where areaid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from area where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>Area Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from area where del=1 order by areaname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('area','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>');display('area','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('area','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('area','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('area','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('area','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!---------------------------------------MANAGE RESTORE MAIN CATEGORY--------------------------------->

<?php
if ($_REQUEST[tbl] == "maincategory") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update maincategory set del = 0 where mcatid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from mainctegory where del = 1");
        }
        else 
        {
            mysql_query("delete from maincategory where mcatid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from maincategory where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>Main category Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from maincategory where del=1 order by mcatname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('maincategory','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('maincategory','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('maincategory','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('maincategory','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('maincategory','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('maincategory','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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




<!---------------------------------------MANAGE RESTORE STORE TYPE--------------------------------->

<?php
if ($_REQUEST[tbl] == "storetype") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update storetype set del = 0 where typeid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from storetype where del = 1");
        }
        else 
        {
            mysql_query("delete from storetype where typeid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from storetype where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>Type Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from storetype where del=1 order by typename  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('storetype','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('storetype','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('storetype','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('storetype','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('storetype','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('storetype','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!---------------------------------------MANAGE RESTORE TIME PERIOD--------------------------------->

<?php
if ($_REQUEST[tbl] == "timeperiod") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update timeperiod set del = 0 where timeperiodid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from timeperiod where del = 1");
        }
        else 
        {
            mysql_query("delete from timeperiod where timeperiodid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from timeperiod where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>State Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from timeperiod where del=1 order by timeperiod  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('timeperiod','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('timeperiod','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('timeperiod','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('timeperiod','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('timeperiod','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('timeperiod','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!-------------------------------------------------MANAGE RESTORE ADD PRICE-------------------------------------------------->


<?php

if ($_REQUEST[tbl] == "adprice") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update adprice set del = 0 where priceid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from adprice where del = 1");
        }
        else 
        {
            mysql_query("delete from adprice where priceid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from adprice where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>Price</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from adprice where del=1 order by price  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('adprice','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>');display('adprice','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('adprice','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('adprice','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('adprice','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('adprice','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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




<!---------------------------------------MANAGE RESTORE EVENT--------------------------------->

<?php
if ($_REQUEST[tbl] == "event") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update event set del = 0 where eventid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from event where del = 1");
        }
        else 
        {
            mysql_query("delete from event where eventid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from event where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>State Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from event where del=1 order by eventname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('event','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('event','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('event','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('event','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('event','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('event','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!---------------------------------------MANAGE RESTORE PAYMENT--------------------------------->

<?php
if ($_REQUEST[tbl] == "paymethod") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update paymethod set del = 0 where payid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from paymethod where del = 1");
        }
        else 
        {
            mysql_query("delete from paymethod where payid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from paymethod where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
       <th>No</th>
        <th>Paymethod Name</th>
        <th>Payment Symbol</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from paymethod where del=1 order by payname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('paymethod','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('paymethod','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><div ><i class="<?php echo $row[2]; ?>" style="font-size:16px; "></i></div></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('paymethod','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('paymethod','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('paymethod','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('paymethod','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!---------------------------------------MANAGE RESTORE highlight--------------------------------->

<?php
if ($_REQUEST[tbl] == "highlight") 
{
    if($_REQUEST[work]=="restore")
    {
        mysql_query("update highlight set del = 0 where highlightid = $_REQUEST[id]");
    }
    if($_REQUEST[work]=="delete")
    {
        if($_REQUEST[id]=="all")
        {
            mysql_query("delete from highlight where del = 1");
        }
        else 
        {
            mysql_query("delete from highlight where highlightid = $_REQUEST[id]");
        }
    }
    
        $in = mysql_query("select count(*) from highlight where del=1 ");

    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th>No</th>
        <th>highlight Name</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    $get = mysql_query("select * from highlight where del=1 order by highlightname  limit $st,$pp");
    while ($row = mysql_fetch_array($get)) 
        {
        $c++;
        ?>
    <tr ondblclick="restore('highlight','restore','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');display('highlight','display','1','10');">
            <td><?php echo $c; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;" ondblclick="fdel('highlight','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>
            
        </tr>
        <?php
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="recycle('highlight','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="recycle('highlight','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p)
                {
                 echo "class='ac'";
                }
                    ?>  ><?php echo $i; ?></li>
                    <?php
                }
                if ($page != $end) {
                    ?>
                    <li onclick="recycle('highlight','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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
