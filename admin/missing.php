<?php
require_once 'connection.php';
require_once 'adminsecure.php';


?>


<!----------------------------------------MANAGE STATE----------------------------------------->


<?php
if ($_REQUEST[tbl] == "state") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from state where statename like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update state set statename = '$_REQUEST[v]' where stateid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update state set del =1");
        } else {
            mysql_query("update state set del =1 where stateid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from state where del=0 ");
    } else {
        $in = mysql_query("select count(*) from state where del=0 and statename like '%$_REQUEST[find]%'  ");
    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from state where del=0 order by statename limit $st,$pp");
    } else {
        $get = mysql_query("select * from state where del=0 and statename like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('state','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('state','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('state','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('state','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
                <?php
                if ($start != 1) {
                    ?>

                    <li onclick="display('state','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="display('state','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p) {
                echo "class='ac'";
            }
                    ?>  ><?php echo $i; ?></li>
                        <?php
                    }
                    if ($page != $end) {
                        ?>
                    <li onclick="display('state','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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

<!---------------------------------------------------MANAGE CITY------------------------------------------>


<?php
if ($_REQUEST[tbl] == "city") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from city where cityname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update city set cityname = '$_REQUEST[v]' where cityid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update city set del =1");
        } else {
            mysql_query("update city set del =1 where cityid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from city where del=0 ");
    } else {
        $in = mysql_query("select count(*) from city where del=0 and cityname like '%$_REQUEST[find]%'  ");
    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from city where del=0 order by cityname  limit $st,$pp");
    } else {
        $get = mysql_query("select * from city where del=0 and cityname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[1]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[2]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('city','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('city','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>');recycle('city','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('city','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
                <?php
                if ($start != 1) {
                    ?> 

                    <li onclick="display('city','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="display('city','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p) {
                echo "class='ac'";
            }
                    ?>  ><?php echo $i; ?></li>
                        <?php
                    }
                    if ($page != $end) {
                        ?>
                    <li onclick="display('city','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!---------------------------------------------------MANAGE AREA------------------------------------------>


<?php
if ($_REQUEST[tbl] == "area") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from area where areaname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update area set areaname = '$_REQUEST[v]' where areaid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update area set del =1");
        } else {
            mysql_query("update area set del =1 where areaid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from area where del=0 ");
    } else {
        $in = mysql_query("select count(*) from area where del=0 and areaname like '%$_REQUEST[find]%'  ");
    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from area where del=0 order by areaname limit $st,$pp");
    } else {
        $get = mysql_query("select * from area where del=0 and areaname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[1]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[2]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('area','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('area','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>');recycle('area','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('area','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[1]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
                <?php
                if ($start != 1) {
                    ?> 

                    <li onclick="display('area','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="display('area','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p) {
                echo "class='ac'";
            }
                    ?>  ><?php echo $i; ?></li>
                        <?php
                    }
                    if ($page != $end) {
                        ?>
                    <li onclick="display('area','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE MAIN CATEGORY----------------------------------------->


<?php
if ($_REQUEST[tbl] == "maincategory") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from maincategory where mcatname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update maincategory set mcatname = '$_REQUEST[v]' where mcatid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update maincategory set del =1");
        } else {
            mysql_query("update maincategory set del =1 where mcatid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from maincategory where del=0 ");
    } else {
        $in = mysql_query("select count(*) from maincategory where del=0 and mcatname like '%$_REQUEST[find]%'  ");
    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from maincategory where del=0 order by mcatname  limit $st,$pp");
    } else {
        $get = mysql_query("select * from maincategory where del=0 and mcatname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('maincategory','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('maincategory','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('maincategory','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('maincategory','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
                <?php
                if ($start != 1) {
                    ?>

                    <li onclick="display('maincategory','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="display('maincategory','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p) {
                echo "class='ac'";
            }
                    ?>  ><?php echo $i; ?></li>
                        <?php
                    }
                    if ($page != $end) {
                        ?>
                    <li onclick="display('maincategory','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE DURATION----------------------------------------->




<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "duration") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="duration" autofocus="" required="" pattern="^[0-9a-z ]+$" placeholder="Enter Duration"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="cost" required="" pattern="^[0-9]+$" placeholder="Enter cost"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="months" required="" pattern="^[0-9]+$" placeholder="Enter month"/>
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
            $in = mysql_query("select * from duration where del=0 and durationid=$_REQUEST[id]");
            $du = mysql_fetch_array($in);
            ?>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="durationupdate" value="<?php echo $du[1]; ?> " required="" pattern="^[0-9a-z ]+$" placeholder="Enter Duration"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="costupdate" required="" value="<?php echo $du[2]; ?> " pattern="^[0-9 ]+$" placeholder="Enter cost"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="updatemonths" required="" value="<?php echo $du[4]; ?> " pattern="^[0-9]+$" placeholder="Enter month"/>
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
    if ($_REQUEST[konu] == "duration") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update duration set del=1 where durationid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update duration set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(durationid) from duration where del=0");
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
            <th>Duration</th>
            <th>Cost</th>
            <th></th>
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select * from duration where del=0  order by durationtime limit $st,$pp ");
        } else {
            $data = mysql_query("select * from duration where del=0 and durationtime like '%$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','duration',1,'all','vachhe','<?php echo $row[0]; ?>',0);recdis('recdata','duration',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td onclick="form('form','duration','update','<?php echo $row[0]; ?>');"><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" ></i></td>
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
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','duration','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                    <?php
                }
                for ($i = $s; $i <= $e; $i++) {
                    if ($_REQUEST[page] == $i) {
                        ?>

                                    <li class="pageactive" onclick="dis('data','duration','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                } else {
                    ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','duration','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','duration','<?php echo $i; ?>','all','agal',0,0);">></li>


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
                    if ($_REQUEST[konu] == "duration") {
                        if ($_REQUEST[recid] != 0) {
                            $up = mysql_query("update duration set del=0 where durationid=$_REQUEST[recid]");
                        }
                        if ($_REQUEST[delid] != 0) {
                            $del = mysql_query("delete from duration where durationid=$_REQUEST[delid]");
                        }
                        if ($_REQUEST[badhudel] == "badhu") {
                            $del = mysql_query("delete from duration where del=1");
                        }
                        $pp = 8;
                        $d1 = mysql_query("select count(durationid) from duration where del=1");
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
            <th>Duration</th>
            <th>Cost</th>
            <th></th>
        <?php
        $c = 0;
        $data = mysql_query("select * from duration where del=1  order by durationtime limit $st,$pp ");



        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','duration',1,'all','vachhe','<?php echo $row[0]; ?>',0,0);dis('data','duration',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','duration',1,'all','vachhe',0,'<?php echo $row[0]; ?>',0);"></i></td>
                </tr>


            <?php
        }
        ?>

            <tr>
                <td colspan="4">
                    <ul class="pageing">
        <?php
        if ($_REQUEST[page] > 4) {
            ?>
                            <li title="<?php echo $s - 1; ?>" onclick="recdis('recdata','duration','<?php echo $s - 1; ?>','all','pachhal',0,0,0);"><</li>
            <?php
        }
        for ($i = $s; $i <= $e; $i++) {
            if ($_REQUEST[page] == $i) {
                ?>

                                <li class="pageactive" onclick="recdis('recdata','duration','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                <?php
            } else {
                ?>


                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','duration','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','duration','<?php echo $i; ?>','all','agal',0,0,0);">></li>


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





<!----------------------------------------MANAGE STORE TYPE----------------------------------------->


                <?php
                if ($_REQUEST[tbl] == "storetype") {
                    if ($_REQUEST[work] == "update") {
                        $get = mysql_query("select * from storetype where typename like '$_REQUEST[v]'");
                        $g = mysql_fetch_array($get);

                        if ($g[0] == "") {
                            mysql_query("update storetype set typename = '$_REQUEST[v]' where typeid = $_REQUEST[id]");
                        }
                    }
                    if ($_REQUEST[work] == "delete") {
                        if ($_REQUEST[id] == "all") {
                            mysql_query("update storetype set del =1");
                        } else {
                            mysql_query("update storetype set del =1 where typeid = $_REQUEST[id]");
                        }
                    }


                    if ($_REQUEST[find] == "") {
                        $in = mysql_query("select count(*) from storetype where del=0 ");
                    } else {
                        $in = mysql_query("select count(*) from storetype where del=0 and typename like '%$_REQUEST[find]%'  ");
                    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from storetype where del=0 order by typename  limit $st,$pp");
    } else {
        $get = mysql_query("select * from storetype where del=0 and typename like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('storetype','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('storetype','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('storetype','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('storetype','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('storetype','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('storetype','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('storetype','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE EMAIL SUBSCRIBER----------------------------------------->


<?php
if ($_REQUEST[tbl] == "subscriber") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from subscriber where email like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update subscriber set email = '$_REQUEST[v]' where sid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from subscriber ");
        } else {
            mysql_query("delete from subscriber where sid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from subscriber");
    } else {
        $in = mysql_query("select count(*) from subscriber where email like '%$_REQUEST[find]%'  ");
    }
    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead >
        <th></th>
        <th>No</th>
        <th>Email</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from subscriber  order by email  limit $st,$pp");
    } else {
        $get = mysql_query("select * from subscriber where  email like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('subscriber','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('subscriber','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('subscriber','display','1','10');">

                <td>
                    <div class="icheck">
                        <div class="flat-grey single-row">
                            <div class="radio ">
                                <input type="checkbox" name="mailsend"/>

                            </div>
                        </div>
                    </div>
                </td>
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('subscriber','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('subscriber','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('subscriber','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE CONTACT US----------------------------------------->


<?php
if ($_REQUEST[tbl] == "contactus") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from contactus where contactname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update contactus set contactname = '$_REQUEST[v]' where contactid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from contactus ");
        } else {
            mysql_query("delete from contactus where contactid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from contactus");
    } else {
        $in = mysql_query("select count(*) from contactus where contactname like '%$_REQUEST[find]%'  ");
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
        <th>Contact Name</th>
        <th>Contact Email</th>
        <th>Contact Mobile</th>
        <th>Message</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from contactus  order by contactname  limit $st,$pp");
    } else {
        $get = mysql_query("select * from contactus where contactname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('contactus','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('contactus','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('contactus','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('contactus','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('contactus','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('contactus','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!----------------------------------------MANAGE FEEDBACK----------------------------------------->


<?php
if ($_REQUEST[tbl] == "feedback") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from feedback where feedbackname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update feedback set feedbackname = '$_REQUEST[v]' where feedbackid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from feedback ");
        } else {
            mysql_query("delete from feedback where feedbackid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from feedback");
    } else {
        $in = mysql_query("select count(*) from feedback where feedbackname like '%$_REQUEST[find]%'  ");
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
        <th>Feedback Name</th>
        <th>Feedback Email</th>
        <th>Feedback Subject</th>
        <th>Message</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from feedback  order by feedbackname  limit $st,$pp");
    } else {
        $get = mysql_query("select * from feedback where feedbackname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('feedback','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('feedback','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('feedback','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('feedback','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('feedback','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('feedback','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE TIME PERIOD----------------------------------------->


<?php
if ($_REQUEST[kona] == "form") {
    if ($_REQUEST[konu] == "timeperiod") {
        if ($_REQUEST[sukam] == "insert") {
            ?>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="timeperiod" autofocus="" required="" pattern="^[0-9a-z ]+$" placeholder="Enter timeperiod name"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="price" required="" pattern="^[0-9 ]+$" placeholder="Enter price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="days" required="" pattern="^[0-9]+$" placeholder="Enter Day"/>
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
            $in = mysql_query("select * from timeperiod where del=0 and timeperiodid=$_REQUEST[id]");
            $du = mysql_fetch_array($in);
            ?>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="timeperiodupdate" value="<?php echo $du[1]; ?> " required="" pattern="^[0-9a-z ]+$" placeholder="Enter timeperiod name"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="priceupdate" required="" value="<?php echo $du[2]; ?> " pattern="^[0-9 ]+$" placeholder="Enter price"/>
                    <div class="input-group-addon">
                        <i  class="fa fa-globe"></i>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="input-group" style="margin-top: 2%;">

                    <input type="text" class="form-control" name="updays" required="" pattern="^[0-9]+$" value="<?php echo $du[4]; ?>" placeholder="Enter Day"/>
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
    if ($_REQUEST[konu] == "timeperiod") {

        if ($_REQUEST[recid] != 0) {
            $up = mysql_query("update timeperiod set del=1 where timeperiodid=$_REQUEST[recid]");
        }

        if ($_REQUEST[delid] == 'badhurec') {
            $del = mysql_query("update timeperiod set del=1 where del=0");
        }

        $pp = 8;
        $d = mysql_query("select count(timeperiodid) from timeperiod where del=0");
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
            <th>Time Period </th>
            <th>Price</th>
            <th></th>
        <?php
        $c = 0;
        if ($_REQUEST[ketla] == "all") {
            $data = mysql_query("select * from timeperiod where del=0  order by timeperiodname limit $st,$pp ");
        } else {
            $data = mysql_query("select * from timeperiod where del=0 and timeperiodname like '%$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','timeperiod',1,'all','vachhe','<?php echo $row[0]; ?>',0);recdis('recdata','timeperiod',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td onclick="form('form','timeperiod','update','<?php echo $row[0]; ?>');"><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" ></i></td>
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
                                <li title="<?php echo $s - 1; ?>" onclick="dis('data','timeperiod','<?php echo $s - 1; ?>','all','pachhal',0,0);"><</li>
                    <?php
                }
                for ($i = $s; $i <= $e; $i++) {
                    if ($_REQUEST[page] == $i) {
                        ?>

                                    <li class="pageactive" onclick="dis('data','timeperiod','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                } else {
                    ?>


                                    <li title="<?php echo $i; ?>" onclick="dis('data','timeperiod','<?php echo $i; ?>','all','vachhe',0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                    <li title="<?php echo $i; ?>" onclick="dis('data','timeperiod','<?php echo $i; ?>','all','agal',0,0);">></li>


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
                    if ($_REQUEST[konu] == "timeperiod") {
                        if ($_REQUEST[recid] != 0) {
                            $up = mysql_query("update timeperiod set del=0 where timeperiodid=$_REQUEST[recid]");
                        }
                        if ($_REQUEST[delid] != 0) {
                            $del = mysql_query("delete from timeperiod where timeperiodid=$_REQUEST[delid]");
                        }
                        if ($_REQUEST[badhudel] == "badhu") {
                            $del = mysql_query("delete from timeperiod where del=1");
                        }
                        $pp = 8;
                        $d1 = mysql_query("select count(timeperiodid) from timeperiod where del=1");
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
            <th>Time Period</th>
            <th>Price</th>
            <th></th>
        <?php
        $c = 0;
        $data = mysql_query("select * from timeperiod where del=1  order by timeperiodname limit $st,$pp ");



        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr ondblclick="recdis('recdata','timeperiod',1,'all','vachhe','<?php echo $row[0]; ?>',0,0);dis('data','timeperiod',1,'all','vachhe',0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><i class="fa fa-trash-o  " style="opacity:0; cursor: crosshair;"  ondblclick="recdis('recdata','timeperiod',1,'all','vachhe',0,'<?php echo $row[0]; ?>',0);"></i></td>
                </tr>


            <?php
        }
        ?>

            <tr>
                <td colspan="4">
                    <ul class="pageing">
        <?php
        if ($_REQUEST[page] > 4) {
            ?>
                            <li title="<?php echo $s - 1; ?>" onclick="recdis('recdata','timeperiod','<?php echo $s - 1; ?>','all','pachhal',0,0,0);"><</li>
            <?php
        }
        for ($i = $s; $i <= $e; $i++) {
            if ($_REQUEST[page] == $i) {
                ?>

                                <li class="pageactive" onclick="recdis('recdata','timeperiod','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                <?php
            } else {
                ?>


                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','timeperiod','<?php echo $i; ?>','all','vachhe',0,0,0);"><?php echo $i; ?></li>

                    <?php
                }
            }
            if ($page > 4) {
                if ($_REQUEST[page] != $page) {
                    ?>

                                <li title="<?php echo $i; ?>" onclick="recdis('recdata','timeperiod','<?php echo $i; ?>','all','agal',0,0,0);">></li>


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



<!----------------------------------------MANAGE USER----------------------------------------->


<?php
if ($_REQUEST[tbl] == "user") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from user where username like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update user set username = '$_REQUEST[v]' where userid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from user ");
        } else {
            mysql_query("delete from user where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[work] == "block") {
        $inb = mysql_query("select * from login where userid like '$_REQUEST[id]'");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[4] == 0) {
            $b = mysql_query("update login set block=1 where userid like '$_REQUEST[id]'");
        } else {
            $b = mysql_query("update login set block=0 where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from user");
    } else {
        $in = mysql_query("select count(*) from user where username like '%$_REQUEST[find]%'  ");
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
        <th>User Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>State</th>
        <th>City</th>
        <th>Area</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>User Id</th>
        <th>Password</th>
        <th>Sque</th>
        <th>Sans</th>
        <th>Profile</th>
        <th>Agree</th>
        <th>Block</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from user where type=2  order by username  limit $st,$pp");
    } else {
        $get = mysql_query("select * from user where type=2 and username like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[8]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('user','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('user','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');recycle('user','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><?php echo $row[8]; ?></td>
                <td><?php echo $row[9]; ?></td>
                <td><?php echo $row[10]; ?></td>
                <td><?php echo $row[11]; ?></td>
                <td>
                    <div><img src="../<?php echo $row[12]; ?>" style="width:200%; height:200%; border-radius:200%; "  class="img img-responsive" /></div>
                </td>
                <td><?php echo $row[13]; ?></td>
                <td  onclick="blk('user','block','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');">
            <?php
            $g = mysql_query("select * from login where userid like '$row[8]'");
            $gg = mysql_fetch_array($g);
            if ($gg[4] == 1) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;"></i>

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
        <td colspan="14">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('user','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('user','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('user','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE SELLER----------------------------------------->


<?php
if ($_REQUEST[tbl] == "seller") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from user where username like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update user set username = '$_REQUEST[v]' where userid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from user ");
        } else {
            mysql_query("delete from user where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[work] == "block") {
        $inb = mysql_query("select * from login where userid like '$_REQUEST[id]'");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[4] == 0) {
            $b = mysql_query("update login set block=1 where userid like '$_REQUEST[id]'");
        } else {
            $b = mysql_query("update login set block=0 where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from user");
    } else {
        $in = mysql_query("select count(*) from user where username like '%$_REQUEST[find]%'  ");
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
        <th>User Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>State</th>
        <th>City</th>
        <th>Area</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>User Id</th>
        <th>Password</th>
        <th>Sque</th>
        <th>Sans</th>
        <th>Profile</th>
        <th>Agree</th>
        <th>Block</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from user where type=1  order by username  limit $st,$pp");
    } else {
        $get = mysql_query("select * from user where type=1 and username like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[8]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('seller','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('seller','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');recycle('seller','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><?php echo $row[8]; ?></td>
                <td><?php echo $row[9]; ?></td>
                <td><?php echo $row[10]; ?></td>
                <td><?php echo $row[11]; ?></td>
                <td>
                    <div><img src="../<?php echo $row[12]; ?>" style="width:200%; height:200%; border-radius:200%; "  class="img img-responsive" /></div>
                </td>
                <td><?php echo $row[13]; ?></td>
                <td  onclick="blk('seller','block','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');">
            <?php
            $g = mysql_query("select * from login where userid like '$row[8]'");
            $gg = mysql_fetch_array($g);
            if ($gg[4] == 1) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;"></i>

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
        <td colspan="14">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('seller','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('seller','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('seller','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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




<!----------------------------------------MANAGE EVENT----------------------------------------->


        <?php
        if ($_REQUEST[tbl] == "event") {
            if ($_REQUEST[work] == "update") {
                $get = mysql_query("select * from event where eventname like '$_REQUEST[v]'");
                $g = mysql_fetch_array($get);

                if ($g[0] == "") {
                    mysql_query("update event set eventname = '$_REQUEST[v]' where eventid = $_REQUEST[id]");
                }
            }
            if ($_REQUEST[work] == "delete") {
                if ($_REQUEST[id] == "all") {
                    mysql_query("update event set del =1");
                } else {
                    mysql_query("update event set del =1 where eventid = $_REQUEST[id]");
                }
            }


            if ($_REQUEST[find] == "") {
                $in = mysql_query("select count(*) from event where del=0 ");
            } else {
                $in = mysql_query("select count(*) from event where del=0 and eventname like '%$_REQUEST[find]%'  ");
            }
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
        <th>Event Name</th>
        <th></th>

    </thead>
                <?php
                $c = $st;
                if ($_REQUEST[find] == "") {
                    $get = mysql_query("select * from event where del=0 order by eventname limit $st,$pp");
                } else {
                    $get = mysql_query("select * from event where del=0 and eventname like '%$_REQUEST[find]%'   limit $st,$pp");
                }
                while ($row = mysql_fetch_array($get)) {
                    $c++;
                    if ($_REQUEST[uid] == $row[0]) {
                        ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('event','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('event','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('event','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('event','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('event','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('event','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('event','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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

<!----------------------------------------MANAGE PAYMENT----------------------------------------->


<?php
if ($_REQUEST[tbl] == "paymethod") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from paymethod where payname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update paymethod set payname = '$_REQUEST[v]' where payid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update paymethod set del =1");
        } else {
            mysql_query("update paymethod set del =1 where payid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from paymethod where del=0 ");
    } else {
        $in = mysql_query("select count(*) from paymethod where del=0 and payname like '%$_REQUEST[find]%'  ");
    }
    $a = mysql_fetch_array($in);
//    echo $a[0];
    $pp = $_REQUEST[pp];
    $p = $_REQUEST[p];


    $page = ceil($a[0] / $pp);
    $st = ($p * $pp) - $pp;
    ?>
    <table class="table table-responsive table-hover mytable">
        <thead>
        <th>No</th>
        <th>Paymethod Name</th>
        <th>Payment Symbol</th>
        <th></th>

        <th></th>

    </thead>
                <?php
                $c = $st;
                if ($_REQUEST[find] == "") {
                    $get = mysql_query("select * from paymethod where del=0 order by payname limit $st,$pp");
                } else {
                    $get = mysql_query("select * from paymethod where del=0 and payname like '%$_REQUEST[find]%'   limit $st,$pp");
                }
                while ($row = mysql_fetch_array($get)) {
                    $c++;
                    if ($_REQUEST[uid] == $row[0]) {
                        ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><input type="text" value="<?php echo $row[2]; ?>" id="val" class="form-control" /></td>
                <td></td>
                <td><i class="fa fa-pencil " style=" opacity:0;cursor: move;"  onclick="update('paymethod','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('paymethod','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('paymethod','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><div ><i class="<?php echo $row[2]; ?>" style="font-size:16px; "></i></div></td>
                <td></td>
                <td><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('paymethod','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('paymethod','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('paymethod','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('paymethod','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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


<!----------------------------------------MANAGE PACKAGE BILL----------------------------------------->
    
<?php
if ($_REQUEST[konu] == 'missbill') {

    if ($_REQUEST[stid] != 0) {
        $bdate = date('Y-m-d');
        
        $s = mysql_query("select durationid from store where storeid=$_REQUEST[stid]");
        $ss = mysql_fetch_array($s);
        
        $dn=mysql_query("select months from duration where durationid=$ss[0]");
        $dnn=mysql_fetch_array($dn);
        $dd=date('Y-m-d',strtotime('+'.$dnn[0]. 'month'));
        
        //echo $dd;
       $in = mysql_query("insert into packagebill values($ss[0],$_REQUEST[stid],0,'$bdate')");
        
      $up = mysql_query("update store set active=1,startingdate='$bdate',endingdate='$dd' where storeid=$_REQUEST[stid]");
    }

    if ($_REQUEST[kona] == 'today') {
        $bdate = date('Y-m-d');
        $sel = mysql_query("select st.statename,c.cityname,a.areaname,s.* from state st,city c,area a,store s where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and s.regdate like '$bdate'");
       
        $su = mysql_query("select count(storeid) from store where regdatedate like '$bdate'");
        $sell = mysql_fetch_array($su);
    } else {
        $sel = mysql_query("select st.statename,c.cityname,a.areaname,s.* from state st,city c,area a,store s where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and s.storeid =$_REQUEST[kona]");
        
        $su = mysql_query("select count(storeid) from store where storeid =$_REQUEST[kona]");
        $sell = mysql_fetch_array($su);
        }

    if ($sell[0] == 0) {
        echo "<center><font style='color:red;font-size:16px;' class='animated rubberBand'>No Bill Found..!</font></center>";
    }

    while ($row = mysql_fetch_array($sel)) {
        
         $bsel =mysql_query("select * from user where userid like '$row[5]' ");
          $bbsel = mysql_fetch_array($bsel);

          $packbil=  mysql_query("select packagebillid from packagebill where storeid=$row[6]");
          $packbill = mysql_fetch_array($packbil); 
        
        ?>
        <table class="table table-responsive" style="background:url(../seller/images/food.png) no-repeat 50% 50%;" >
             <div  class="col-md-12 col-sm-12 col-xs-12" style="padding:5px">
                <div class="col-md-4" style="padding:10px 5px 5px 5px; text-align: center;">Store Owner :  &nbsp;<?php echo $bbsel[0]; ?></div>
                <div class="col-md-4 text-center" ><img src="images/ganpatiji.png" style="max-width:8%;"/></div>
               <div class="col-md-offset-2 col-md-2" style="padding:10px 5px 5px 5px;">BIll NO. <?php echo $packbill[0]; ?></div>
             </div>                                     
                                                
            <tr>
                <td colspan="4" style="background: #65CEA7;padding:5px;" align="center">
                                                        
                    <div style="font-size:16px;color:#FFFFFF; padding-top:4px; text-transform: capitalize;"><?php echo $row[7]; ?></div>
                                                            
                </td>
               
            </tr>
                                                    
            <tr>
                <td style="width:40%;" colspan="2"><img src="../admin/images/about.png" width="40%" /></td>
                <td colspan="1"><h2>FOOD LOCKER</h2></td>
                <td align="center" style="padding-top: 38px;">
            <?php
            if ($row[19] == 0) {
                ?>
                        <i class="fa fa-thumbs-o-down" style="color:red;" title="unactive"></i>
                        <?php
                    } else {
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
                <td >Mobile : 8758722336</td>
            </tr>
                                                    
            <tr>
                <th colspan="4" style="text-align: center; font-size: 14px;"><font>Seller Information :</font></th>
                
            </tr>
                                                    
            <tr>
                <td colspan="4" style="text-transform:capitalize;">Store Name : <?php echo $row[7]; ?></td>
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
            $selg= mysql_query("select * from duration where durationid=$row[4]");
            $gg = mysql_fetch_array($selg);
            ?>
                
            <tr>
                <th colspan="2" style=text-align:left;">Duration</th>
                <th style=text-align:left;">Unit Price</th>
                <th style=text-align:left;">Amount</th>
            </tr>
                                                    
            <tr>
                <td colspan="2" style=text-align:left;"><?php echo $gg[1]; ?></td>
                <td style=text-align:left;"><?php echo $gg[2]; ?></td>
                <td style=text-align:left;"><?php echo $gg[2]; ?></td>
            </tr>
                                                    
            <tr>
                <td colspan="1">Seller Sign :</td>
                <td colspan="2">[Cashier]Sign :<img src="images/sign.png" style="max-width: 40%;" class="img-responsive" /></td>
                                                        
                <td>
                    <table class="table table-responsive">
                                                            
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
                    <i class="fa fa-hand-o-right"></i>&nbsp;If you can't pay cash from next seven days i discard the store.
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-transform:capitalize;">
                    <i class="fa fa-hand-o-right"></i>&nbsp;If you give payment for cash.
                </td>
            </tr>
                                                    
            <tr>
                <?php
        if ($row[19] == 1) {
            ?>
                
                <td colspan="1">
                    <p  class="billpay btn"  style="cursor:pointer; width: 20%;" onclick="sellermis();">Print</p>
                </td>
                   <?php
        }
        
        ?>
                <td colspan="3"  style="text-align: right;">
        <?php
        if ($row[19] == 0) {
            ?>
                        <p class="billpay btn" style="cursor:pointer; width: 20%;"  onclick="missbill('missbill','<?php echo $_REQUEST[kona]; ?>',<?php echo $row[6]; ?>);">&#8377;&nbsp;Pay</p>
            <?php
    
        }
        
        ?>
                </td>
            </tr>
                 <tr>
                <td colspan="4" style="background-color: #65CEA7;color:#FFFFFF;">
                    <div class="col-md-7">348,Royal Square,VIP cercle,Utran-Kapodara Road,Surat. </div>
                    <div class="col-md-offset-3 col-md-2">THANK YOU..<i class=""></i></div>
                </td>
            </tr>                                   
        </table>
                                                
                                                
                    <?php
                }
            }
            ?>
    
    
<!----------------------------------------MANAGE BANNER----------------------------------------->    

    
<?php
if ($_REQUEST[kona] == "data") {
    if ($_REQUEST[konu] == "addbanner") {

        if ($_REQUEST[active] != "") {

            $act = mysql_query("select * from addbanner where adid=$_REQUEST[active]");
            $actt = mysql_fetch_array($act);
            if ($actt[8] == 0) {

                $ac = mysql_query("update addbanner set active=1 where adid=$_REQUEST[active]");
            } else
                {
                    $ac = mysql_query("update addbanner set active=0 where adid=$_REQUEST[active]");
                }
        }

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
        $c = 0;
        if ($_REQUEST[ketla] == "all") {

            $data = mysql_query("select * from addbanner where del=0  limit $st,$pp ");
        } else {
            $data = mysql_query("select * from addbanner where adbannername like '$_REQUEST[ketla]%'");
        }

        while ($row = mysql_fetch_array($data)) {
            $c++;
            ?>
                <tr  ondblclick="dis('data','addbanner',1,'all','vachhe','<?php echo $row[0]; ?>',0);recdis('recdata','addbanner',1,'all','vachhe',0,0,0);">
                    <td><?php echo $c; ?></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td style="text-align: center;width:10%;"><img src="../seller/<?php echo $row[4]; ?>" width="100%"/></td>
                    <td><?php echo $row[5]; ?></td>
                    <td><?php echo $row[6]; ?></td>
                    <td><?php echo $row[7]; ?></td>
                    <td>
                        
            <?php
            if ($row[8] == 0) {
                ?>
                            <i class="fa fa-thumbs-o-down" style="color:red;" ></i>
                            <?php
                        } else {
                            ?>
                            <i class="fa fa-thumbs-o-up" style="color:green;" ></i>
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


<!----------------------------------------MANAGE BANNER BILL----------------------------------------->
    
<?php
if ($_REQUEST[konu] == 'missbannerbill') {

    if ($_REQUEST[stid] != 0) {
        $bdate = date('Y-m-d');
        $s = mysql_query("select timeperiodid from addbanner where adid=$_REQUEST[id]");
        $ss = mysql_fetch_array($s);

        $in =mysql_query("insert into bannerbill values($ss[0],$_REQUEST[stid],0,'$bdate')");
      
        $dnn=mysql_query("select days from timeperiod where timeperiodid=$ss[0]");
        $dn1=mysql_fetch_array($dnn);
        $dd=date('Y-m-d',strtotime('+'.$dn1[0]. 'day'));
        
       $up = mysql_query("update addbanner set startdate='$bdate',enddate='$dd',active=1 where adid=$_REQUEST[id]");
    }
    


    if ($_REQUEST[kona] == 'today') {
        $bdate = date('Y-m-d');
        $sel = mysql_query("select u.username,s.storename,s.address,a.* from user u,store s,addbanner a where a.storeid = s.storeid and u.userid=s.userid and uploaddate like '$bdate'");

        $su = mysql_query("select count(adid) from addbanner where uploaddate like '$bdate'");
        $sell = mysql_fetch_array($su);
        
    } else {
        
        $sel = mysql_query("select u.username,s.storename,s.address,a.* from user u,store s,addbanner a where a.storeid = s.storeid and u.userid=s.userid and  a.storeid =$_REQUEST[kona]");
        
        $su = mysql_query("select count(adid) from addbanner where storeid =$_REQUEST[kona]");
        $sell = mysql_fetch_array($su);
        }

    if ($sell[0] == 0) {
         echo "<center><font style='color:red;font-size:16px;' class='animated rubberBand'>No Bill Found..!</font></center>";
    }


    while ($row = mysql_fetch_array($sel)) {
        
         $b=mysql_query("select username from user where userid like '$row[6]' ");
          $bb= mysql_fetch_array($b);

          $packbill=  mysql_query("select bannerbillid from bannerbill where storeid=$row[3]");
          $banbi = mysql_fetch_array($packbill); 
        
        ?>
        <table class="table table-responsive" style="background:url(../seller/images/food.png) no-repeat 50% 50%;">
            
            <div  class="col-md-12 col-sm-12 col-xs-12" style="padding:5px">
                <div class="col-md-4" style="padding:10px 5px 5px 5px; text-align: center;">Store Owner :  &nbsp;<?php echo $row[0]; ?></div>
                <div class="col-md-4 text-center" ><img src="images/ganpatiji.png" style="max-width:8%;"/></div>
                <?php
        if ($row[11] == 1) {
            ?>
                
                <div class="col-md-offset-2 col-md-2" style="padding:10px 5px 5px 5px;">BIll NO. <?php echo $banbi[0]; ?></div>
            <?php
            }
            ?>
            </div>  
            <tr>
                <td colspan="4" style="background: #65CEA7;padding: 5px;" align="center">                                 
                    <div style="font-size:16px;color:#FFFFFF;padding-top:4px;text-transform: capitalize;"><?php echo $row[1]; ?></div>
                                                            
                </td>
                
            </tr>
                                                    
            <tr>
                <td style="width:40%;" colspan="2"><img src="../admin/images/about.png" width="40%" /></td>
                <td colspan="1"><h2 style="color:#65CEA7;">FOOD LOCKER</h2></td>
                <td align="center" style=" text-align: center; padding-top: 38px;">
            <?php
            if ($row[11] == 0) {
                ?>
                        <i class="fa fa-thumbs-o-down" style="color:red;" title="unactive"></i>
                        <?php
                    } else {
                        ?>
                        <i class="fa fa-thumbs-o-up" style="color: green;" title="active"></i>
                        <?php
                    }
                    ?>
                </td>
                
            </tr>
                                                    
            <tr>
                <td colspan="2">Start Date : &nbsp;&nbsp;&nbsp;<?php echo $row[9]; ?></td>
                <td colspan="1">End Date : &nbsp;&nbsp;&nbsp;<?php echo $row[10]; ?></td>
                 <td >Mobile : 8758722336</td>
            </tr>
                                                    
            <tr>
                <th colspan="4" style="text-align: center; font-size: 14px;"><font>Seller Information :</font></th>
               
            </tr>
                                                    
            <tr>
                <td colspan="4" style="text-transform:capitalize;">Store Name : &nbsp;&nbsp;&nbsp;<?php echo $row[1]; ?></td>
            </tr>
                                                    
            <tr>
                <td colspan="4" style="text-transform:capitalize;">Address : &nbsp;&nbsp;&nbsp;<?php echo $row[2]; ?></td>
            </tr>
                                                    
                                                    
            <?php
            $selg = mysql_query("select * from timeperiod where timeperiodid=$row[4]");
            $gg = mysql_fetch_array($selg);
            ?>
                
            <tr>
                <th colspan="2"  style=text-align:left;">Time Period</th>
                <th style=text-align:left;">Unit Price</th>
                <th style=text-align:left;">Amount</th>
            </tr>
                                                    
            <tr>
                <td colspan="2" style="text-transform:capitalize;text-align:left;"><?php echo $gg[1]; ?></td>
                <td style="text-transform:capitalize;text-align:left;"><?php echo $gg[2]; ?></td>
                <td style="text-transform:capitalize;text-align:left;"><?php echo $gg[2]; ?></td>
            </tr>
                                                    
            <tr>
                <td colspan="1">Seller Sign :</td>
                <td colspan="2">[Cashier]Sign :<img src="images/sign.png" width="40%" /></td>
                                                        
                <td>
                    <table class="table table-responsive" >
                                                                
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
                <td colspan="4" style="font-size: 13px; text-transform:capitalize;">
                    <i class="fa fa-hand-o-right"></i>&nbsp; If you can't pay cash from next seven days i discard the store.
                </td>
            </tr>
            <tr>
                <td colspan="4" style="font-size: 13px; text-transform:capitalize;">
                    <i class="fa fa-hand-o-right"></i>&nbsp;If you give payment for cash.
                </td>
            </tr>
                                                    
            <tr>
                  <?php
        if ($row[11] == 1) {
            ?>
                
                <td colspan="1">
                    <p  class="billpay btn"  style="cursor:pointer; width: 20%;" onclick="sellermis();">Print</p>
                </td>
                   <?php
        }
        ?>
        
                <td colspan="3" align="right">
        <?php
        if ($row[11] == 0) {
            ?>
                        <p class="billpay btn " style="cursor:pointer;"  onclick="missbill('missbannerbill','<?php echo $_REQUEST[kona]; ?>',<?php echo $row[3]; ?>,'<?php echo $row[5] ?>');">&#8377;&nbsp;Pay</p>
            <?php
    
        }
        
        ?>
                </td>
            </tr>
            
            <tr>
                <td colspan="4" style="background-color: #65CEA7;color:#FFFFFF;">
                    <div class="col-md-7">348,Royal Square,VIP cercle,Utran-Kapodara Road,Surat. </div>
                    <div class="col-md-offset-3 col-md-2">THANK YOU..<i class=""></i></div>
                </td>
            </tr>
                                                    
        </table>
         
                                                
                                                
                    <?php
                }
            }
            ?>



<!----------------------------------------MANAGE highlight----------------------------------------->


<?php
if ($_REQUEST[tbl] == "highlight") {
    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from highlight where highlightname like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update highlight set highlightname = '$_REQUEST[v]' where highlightid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("update highlight set del =1");
        } else {
            mysql_query("update highlight set del =1 where highlightid = $_REQUEST[id]");
        }
    }


    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from highlight where del=0 ");
    } else {
        $in = mysql_query("select count(*) from highlight where del=0 and highlightname like '%$_REQUEST[find]%'  ");
    }
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
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select * from highlight where del=0 order by highlightname limit $st,$pp");
    } else {
        $get = mysql_query("select * from highlight where del=0 and highlightname like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[0]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" required="" pattern='^[a-z0-9]+$' id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('highlight','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('highlight','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>');recycle('highlight','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td ><i class="fa fa-pencil-square-o  " style="opacity:0; cursor:wait;" onclick="up('highlight','up','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[0]; ?>')"></i></td>

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
        <td colspan="4">
            <ul class="pageing">
                <?php
                if ($start != 1) {
                    ?>

                    <li onclick="display('highlight','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
                    <?php
                }
                for ($i = $start; $i <= $end; $i++) {
                    ?>
                    <li onclick="display('highlight','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
            if ($i == $p) {
                echo "class='ac'";
            }
                    ?>  ><?php echo $i; ?></li>
                        <?php
                    }
                    if ($page != $end) {
                        ?>
                    <li onclick="display('highlight','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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

                    

 

<!----------------------------------------MANAGE PACKAGE MIS----------------------------------------->

<?php
if($_REQUEST[kona]=="seapack")
{
  
?>
    <table class="table table-responsive mis">
    
    <tr style="background-color:#65CEA7;color: #FFFFFF;">
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
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid");
            }
            if($_REQUEST[koni]=="business")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and s.storename like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="duration")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and d.durationtime like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="amout")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and d.cost like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="date")
            {
                $data1=mysql_query("select s.storename,d.durationtime,d.cost,b.billdate from store s,duration d,packagebill b where s.storeid=b.storeid and d.durationid=s.durationid and d.durationid=b.durationid and b.billdate like '$_REQUEST[su]%' ");
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

     <tr  align="center">
        <td colspan="2" style="background-color:#65CEA7;color: #FFFFFF;" >  Total Package MIS Record Are : <?php echo $c; ?></td>
        <td   colspan="2" style="background-color:#65CEA7;color: #FFFFFF;">
        </td>
        <td  colspan="2" style="background-color:#65CEA7;color: #FFFFFF;">
            <font onclick="sellermis();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>




<!----------------------------------------MANAGE  BUSINESS PROFILE----------------------------------------->




<?php
if ($_REQUEST[tbl] == "sellerbusiness") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from store where username like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update user set username = '$_REQUEST[v]' where userid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from store ");
        } else {
            mysql_query("delete from store where storeid=$_REQUEST[id]");
        }
    }

    if ($_REQUEST[work] == "block") {
        $inb = mysql_query("select * from login where userid like '$_REQUEST[id]'");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[4] == 0) {
            $b = mysql_query("update login set block=1 where userid like '$_REQUEST[id]'");
        } else {
            $b = mysql_query("update login set block=0 where userid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from user");
    } else {
        $in = mysql_query("select count(*) from user where username like '%$_REQUEST[find]%'  ");
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
        <th>State</th>
        <th>City</th>
        <th>Area</th>
        <th>Type Name</th>
        <th>Duration Time</th>
        <th>User Id</th>
        <th>Store Name</th>
        <th>Address</th>
        <th>Store Map</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Web Site</th>
        <th>Store Profile</th>
        <th>Visiting Card</th>
        <th>Time Duration</th>
         <th>Gov.No</th>
        <th>Since</th>
        <th>Fax</th>
        <th>Register Date</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Food Type</th>
        <th>Cover</th>
    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select st.statename,c.cityname,a.areaname,t.typename,d.durationtime,s.* from state st,city c,area a,store s,storetype t,duration d where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and t.typeid=s.typeid and d.durationid=s.durationid and s.del=0 and s.active=1   limit $st,$pp");
    } else {
        $get = mysql_query("select st.statename,c.cityname,a.areaname,t.typename,d.durationtime,s.* from state st,city c,area a,store s,storetype t,duration d where st.stateid=s.stateid and c.cityid=s.cityid and a.areaid=s.areaid and t.typeid=s.typeid and d.durationid=s.durationid and s.del=0 and s.active=1 s.storename like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[8]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('sellerbusiness','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('sellerbusiness','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');recycle('sellerbusiness','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><?php echo $row[9]; ?></td>
                <td><?php echo $row[13]; ?></td>
                <td><?php echo $row[15]; ?></td>
                <td><?php echo $row[16]; ?></td>
                <td><?php echo $row[17]; ?></td>
                <td><img src="<?php echo $row[18]; ?>" /></td>
                <td><img src="<?php echo $row[19]; ?>" /></td>
                <td><?php echo $row[23]; ?></td>
                <td><?php echo $row[24]; ?></td>
                <td><?php echo $row[26]; ?></td>
                <td><?php echo $row[27]; ?></td>
                <td><?php echo $row[28]; ?></td>
                <td><?php echo $row[29]; ?></td>
                <td><?php echo $row[30]; ?></td>
                <td><?php echo $row[31]; ?></td>
                <td><img src="<?php echo $row[32]; ?>" /></td>
                <td  onclick="blk('sellerbusiness','block','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[8]; ?>');">
            <?php
            $g = mysql_query("select * from login where userid like '$row[7]'");
            $gg = mysql_fetch_array($g);
            if ($gg[4] == 1) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;"></i>

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
        <td colspan="14">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('sellerbusiness','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('sellerbusiness','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('sellerbusiness','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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




<!----------------------------------------MANAGE BANNER MIS----------------------------------------->

<?php
if($_REQUEST[kona]=="seabanner")
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
                    $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid");
            }
             if($_REQUEST[koni]=="seller")
            {
                    $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.userid like '$_REQUEST[su]%'  ");
            }
            if($_REQUEST[koni]=="business")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and s.storename like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="timeperiod")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and t.timeperiodname like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="amout")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and t.price like '$_REQUEST[su]%' ");
            }
             if($_REQUEST[koni]=="date")
            {
                $data1=mysql_query("select s.userid,s.storename,t.timeperiodname,t.price,b.billdate,a.adbanner from store s,timeperiod t,bannerbill b,addbanner a where s.storeid=b.storeid and t.timeperiodid=b.timeperiodid and a.timeperiodid=t.timeperiodid and b.billdate like '$_REQUEST[su]%' ");
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
        <td colspan="2"  style="background-color:#65CEA7;color: #FFFFFF;" >  Total Banner MIS Record Are : <?php echo $c; ?></td>
        <td  class="cont" colspan="3">
          
        </td>
        <td  colspan="2"  style="background-color:#65CEA7;color: #FFFFFF;">
            <font onclick="sellermis();" style="cursor: pointer;"> Print &nbsp;<i class="fa fa-print"></i></font>
        </td>
    </tr>
                                        
</table>

<?php
}
?>




<!----------------------------------------MANAGE SELLER REVIEW----------------------------------------->


<?php
if ($_REQUEST[tbl] == "sreview") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from reviewstore where review like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update reviewstore set review = '$_REQUEST[v]' where reviewstoreid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from reviewstore ");
        } else {
            mysql_query("delete from reviewstore where reviewstoreid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[work] == "block") {
        $inb = mysql_query("select * from reviewstore where reviewstoreid=$_REQUEST[id]");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[5] == 0) {
            $b = mysql_query("update reviewstore set status=1 where reviewstoreid=$_REQUEST[id]");
        } else {
            $b = mysql_query("update reviewstore set status=0 where reviewstoreid=$_REQUEST[id]");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from reviewstore");
    } else {
        $in = mysql_query("select count(*) from reviewstore where review like '%$_REQUEST[find]%'  ");
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
        <th>User Name</th>
        <th>Review</th>
        <th>Date & Time</th>
        <th>Status</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select u.username,r.* from user u,reviewstore r where u.userid=r.userid limit $st,$pp");
    } else {
        $get = mysql_query("select u.username,r.* from user u,reviewstore r where u.userid=r.userid and username like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[1]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('sreview','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('sreview','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>');recycle('sreview','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                
                <td  onclick="blk('sreview','block','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>');">
            <?php
            
            if ($row[6] == 0) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;"></i>

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
        <td colspan="14">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('sreview','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('sreview','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('sreview','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!----------------------------------------MANAGE SELLER REVIEW----------------------------------------->


<?php
if ($_REQUEST[tbl] == "preview") {

    if ($_REQUEST[work] == "update") {
        $get = mysql_query("select * from reviewproduct where review like '$_REQUEST[v]'");
        $g = mysql_fetch_array($get);

        if ($g[0] == "") {
            mysql_query("update reviewproduct set review = '$_REQUEST[v]' where reviewid = $_REQUEST[id]");
        }
    }
    if ($_REQUEST[work] == "delete") {
        if ($_REQUEST[id] == "all") {
            mysql_query("delete from reviewproduct ");
        } else {
            mysql_query("delete from reviewproduct where reviewid like '$_REQUEST[id]'");
        }
    }

    if ($_REQUEST[work] == "block") {
        $inb = mysql_query("select * from reviewproduct where reviewid=$_REQUEST[id]");
        $inbb = mysql_fetch_array($inb);
        if ($inbb[5] == 0) {
            $b = mysql_query("update reviewproduct set active=1 where reviewid=$_REQUEST[id]");
        } else {
            $b = mysql_query("update reviewproduct set active=0 where reviewid=$_REQUEST[id]");
        }
    }

    if ($_REQUEST[find] == "") {
        $in = mysql_query("select count(*) from reviewproduct");
    } else {
        $in = mysql_query("select count(*) from reviewproduct where review like '%$_REQUEST[find]%'  ");
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
        <th>User Name</th>
        <th>Review</th>
        <th>Date & Time</th>
        <th>Status</th>
        <th></th>

    </thead>
    <?php
    $c = $st;
    if ($_REQUEST[find] == "") {
        $get = mysql_query("select u.username,r.* from user u,reviewproduct r where u.userid=r.userid limit $st,$pp");
    } else {
        $get = mysql_query("select u.username,r.* from user u,reviewproduct r where u.userid=r.userid and username like '%$_REQUEST[find]%'   limit $st,$pp");
    }
    while ($row = mysql_fetch_array($get)) {
        $c++;
        if ($_REQUEST[uid] == $row[1]) {
            ?>
            <tr>
                <td><?php echo $c; ?></td>
                <td><input type="text" value="<?php echo $row[1]; ?>" id="val" class="form-control" /></td>
                <td><i class="fa fa-pencil " style="opacity:0; cursor: move;"  onclick="update('preview','update','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>')"></i></td>

            </tr>
            <?php
        } else {
            ?>
            <tr ondblclick="del('preview','delete','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>');recycle('preview','display','1','10');">
                <td><?php echo $c; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                
                <td  onclick="blk('preview','block','<?php echo $p; ?>','<?php echo $pp; ?>','<?php echo $row[3]; ?>');">
            <?php
            
            if ($row[6] == 0) {
                ?>
                        <i class="fa fa-thumbs-down" style="cursor:pointer;"></i>
                <?php
            } else {
                ?>
                        <i class="fa fa-thumbs-up" style="cursor:pointer;"></i>

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
        <td colspan="14">
            <ul class="pageing">
    <?php
    if ($start != 1) {
        ?>

                    <li onclick="display('preview','display','<?php echo $p - 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-left" ></i></li>
        <?php
    }
    for ($i = $start; $i <= $end; $i++) {
        ?>
                    <li onclick="display('preview','display','<?php echo $i; ?>','<?php echo $pp; ?>');"  <?php
        if ($i == $p) {
            echo "class='ac'";
        }
        ?>  ><?php echo $i; ?></li>
        <?php
    }
    if ($page != $end) {
        ?>
                    <li onclick="display('preview','display','<?php echo $p + 1; ?>','<?php echo $pp; ?>');"><i class="fa fa-angle-double-right"></i></li>
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



<!----------------------------------------MANAGE USER BILL----------------------------------------->



<?php
   if($_REQUEST[kona]=="adminbill")
   {

        if($_REQUEST[su]=="last")
       {
           $ubb=mysql_query("select * from bill where billid=(select  max(billid) from bill)");
           
       }
       if($_REQUEST[su]=="user")
       {
           $ubb=mysql_query("select * from bill where  userid='$_REQUEST[val]' ");
       }
       if($_REQUEST[su]=="billid")
       {
           $ubb=mysql_query("select * from bill where  billid=$_REQUEST[val] ");
       }
       if($_REQUEST[su]=="payname")
       {
           $ubb=mysql_query("select * from bill where paymethod like '$_REQUEST[val]' ");
           
       }
        if($_REQUEST[su]=="date")
       {
           $ubb=mysql_query("select * from bill where billdate='$_REQUEST[val]' ");
       }
   ?>
                                     
                                     
                <div class="col-md-offset-3 col-md-7" >
                   
                    <?php
                    $c=0;
                    $q=0;
                    $pb=0;
                    $p=0;
                    $d=0;
                    
                
                          while ($ubill = mysql_fetch_array($ubb)) 
                        {
                        
                        $cs=  mysql_query("select c.cityname,a.areaname,s.* from city c,area a,shipping s where c.cityid=s.cityid and a.areaid=s.areaid  ");
                        $csh = mysql_fetch_array($cs); 
                            
                    
                        
                    
                     
                    ?>
                    <div class=" col-md-12" style="background:whitesmoke;padding: 15px;margin-top: 40px">
                        <div class="col-md-offset-4 col-md-8">
                                <img  src="images/about.png" width="40%"/>
                        </div>
                            
                        <div class="text-center">
                           348,Royal Squre, VIP Circle,Utran,Surat
                        </div>
                        <div class="text-center">
                            <strong>Mo :</strong><font>7874259262 , 8758722336</font>
                        </div>
                        <div style="border-bottom: 1px solid #000;padding: 5px;">
                            
                        </div>
                        <div class="col-md-12">
                        <div class="col-md-6" style="padding: 15px;">
                            <strong>Name :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[6]; ?></font>
                        </div>
                         <div class="col-md-offset-3 col-md-3" style="padding: 15px;">
                                <strong>Bill No :</strong>&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[1]; ?></font>
                        </div>
                        </div>
                        <div class="col-md-12">
                           <div class="col-md-12" style="padding: 5px 5px 5px 15px;">
                               <strong>Date :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[2]; ?></font>
                        </div>    
                        </div>
                         <div class="col-md-12">
                           <div class="col-md-12" style="padding: 5px 5px 5px 15px;">
                               <strong>Cashier :</strong>&nbsp;&nbsp;&nbsp;<font>1</font>
                        </div>    
                        </div>
                         <div class="col-md-12">
                           <div class="col-md-12" style="padding: 5px 5px 5px 15px;">
                               <strong>Address :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $ubill[5]; ?></font>
                        </div>    
                        </div>
                        
                        <div class="col-md-12">
                           <div class="col-md-6" style="padding: 5px 5px 5px 15px;">
                               <strong>City :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[0]; ?></font>
                        </div>  
                            <div class="col-md-6" style="padding: 5px 5px 5px 15px;">
                               <strong>Area :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[1]; ?></font>
                        </div> 
                        </div>
                        
                         <div class="col-md-12">
                           <div class="col-md-6" style="padding: 5px 5px 5px 15px;">
                               <strong>Pin Code :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[9]; ?></font>
                        </div>    
                        </div>
                        <div class="col-md-12">
                           <div class="col-md-6" style="padding: 5px 5px 5px 15px;">
                               <strong>Mo :</strong>&nbsp;&nbsp;&nbsp;<font style="text-transform: capitalize;"><?php echo $csh[8]; ?></font>
                        </div>    
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div class="col-md-12" >
                                <table class="table table-responsive">
                                    <tr >
                                        <th style="border: 1px solid #f8a631 !important; text-transform: capitalize;font-size: 13px;">No.</th>
                                     <th style="border: 1px solid #f8a631 !important; text-transform: capitalize;font-size: 13px;">STORE</th>
                                    <th style="border: 1px solid #f8a631 !important; text-transform: capitalize;font-size: 13px;">ITEM</th>
                                    <th style="border: 1px solid #f8a631 !important; text-transform: capitalize;font-size: 13px;">QTY</th>
                                    <th style="border: 1px solid #f8a631 !important;text-transform: capitalize;font-size: 13px;">PRICE</th>
                                    <th style="border: 1px solid #f8a631 !important; text-transform: capitalize;font-size: 13px;">AMOUNT</th>
                                    </tr>
                                    <?php
                          
                        
                           $sp=mysql_query("select i.proname,s.storename,t.* from item i,transaction t,store s where i.productid = t.productid and s.storeid = i.storeid and t.billid=$ubill[1]"); 
                           while ($spp = mysql_fetch_array($sp)) 
                           {
                               $q=$q+$spp[6];
                               $p=$p+$spp[7];
                               $pb=$pb+($spp[10]);
                               
                            $c++;
                                    ?>
                                    <tr >
                                        <td style=" border: 1px solid #f8a631;text-transform: capitalize; font-size: 13px;"><?php echo $c; ?></td>
                                         <td style="border: 1px solid #f8a631;text-transform: capitalize;font-size: 13px;"><?php echo $spp[1]; ?></td>
                                         <td style="border: 1px solid #f8a631;text-transform: capitalize;font-size: 13px;"><?php echo $spp[0]; ?></td>
                                         <td style="border: 1px solid #f8a631;text-transform: capitalize;font-size: 13px;"><?php echo $spp[6]; ?></td>
                                         <td style="border: 1px solid #f8a631;text-transform: capitalize;font-size: 13px;"><?php echo $spp[7]; ?></td>
                                         <td style="border: 1px solid #f8a631;text-transform: capitalize;font-size: 13px;"><?php echo ($spp[7])*($spp[6]); ?></td>
                                    </tr>
                                    <?php
                                    
                           }
                                    ?>
                                     </table>
                                <div style="border-top: 1px solid #232323;"></div>
                                <div class="col-md-12">
                                     <div class="  col-md-6" style="padding-top: 10px">
                                    <strong> Total QTY : </strong><font><?php echo $q; ?></font>
                                </div>
                                     <div class="  col-md-6" style="padding-top: 10px">
                                    <strong> Payable Amount : </strong><font><?php echo $pb; ?></font>
                                </div>
                                </div>
                               
                            </div>
                        </div>
                        
                        
                    </div><br/><br/><br/><br/>
                    <?php
                      $c=0;
                      $q=0;
   }
                      
                    ?>
                </div>

       
     <?php
   }

     ?>
                                     
<!----------------------------------------MANAGE Notification-----------------------------------------> 


<?php
if($_REQUEST[konu]=="feed")
{
    if($_REQUEST[badhu]=="all")
    {
  
          $un=mysql_query("update  feedback set feednotification=1");

    echo "0";
        
    }
    else
    {
    $un=mysql_query("update  feedback set feednotification=1 where feedbackid=$_REQUEST[id]");

    $fbb=  mysql_query("select count(*) from feedback where feednotification=0");
          $fb=  mysql_fetch_array($fbb);
          echo $fb[0];
    }

    ?>


<?php
    
}

if($_REQUEST[olkhan]=='feedid')
{
    ?>
<h5 class="title">You have <?php echo $fb[0]; ?> Feed Back </h5>
                    <ul class="dropdown-list normal-list" >
                        <?php
                         $fb=  mysql_query("select * from feedback where feednotification=0 order by feedbackid desc limit 0,5");
                         while ($f=  mysql_fetch_array($fb))
                         {
                             ?>
                        <li class="new" onclick="notification('feed',<?php echo $f[0]; ?>,0);noti('feedid');">
                            <a href="#">
                                <span class="thumb"><img src="images/photos/user1.png" alt="" /></span>
                                <span class="desc">
                                    <span class="name" style="text-transform: capitalize; "><?php echo $f[1]; ?><span class="badge badge-success">new</span></span>
                                    <span class="msg"><?php echo $f[4]; ?></span>
                                </span>
                            </a>
                        </li>
                       <?php
                         }
                       ?>
                        <li class="new"  onclick="notification('feed',0,'all');"><a href="managefeedback.php">Read All Feed Back</a></li>
                    </ul>
<?php
}
?>



<?php

if($_REQUEST[konu]=="store")
{
    if($_REQUEST[badhu]=="all")
    {
  
          $un=mysql_query("update  store set notification=1");

    echo "0";
        
    }
    else
    {
    $un=mysql_query("update  store set notification=1 where storeid=$_REQUEST[id]");

    $ss=  mysql_query("select count(*) from store where notification=0");
          $s=  mysql_fetch_array($ss);
          echo $s[0];
    }
  ?>


<?php
}

if($_REQUEST[olkhan]=="storeid")
{
?>

<h5 class="title">You have <?php echo $s[0]; ?> Store </h5>
                    <ul class="dropdown-list normal-list">
                     <?php
                     $ss=  mysql_query("select * from store where notification=0 order by storeid desc limit 0,5");
                     while ($s=  mysql_fetch_array($ss))
                     {
                    ?>
                    <li class="new" onclick="notification('store',<?php echo $s[3]; ?>,0);noti('storeid');">
                            <a href="#">
                                <span class="thumb"><img src="../seller/<?php echo $s[13]; ?>" alt="" /></span>
                                <span class="desc">
                                    <span class="name" style="text-transform: capitalize;"><?php echo $s[4]; ?> <span class="badge badge-success">new</span></span>
                                    <span class="msg"><?php echo $s[8]; ?> </span>
                                </span>
                            </a>
                        </li>
                      <?php
                     }
                      ?> 
                        <li class="new" onclick="notification('store',0,'all');"><a href="managebusiness.php">View All Store</a></li>
                    </ul>

<?php
}
?>



<?php

if($_REQUEST[konu]=="reviewp")
{
    if($_REQUEST[badhu]=="all")
    {
  
          $un=mysql_query("update reviewproduct set notification=1");

    echo "0";
        
    }
    else
    {
    $un=mysql_query("update reviewproduct set notification=1 where reviewid=$_REQUEST[id]");

    $rp=  mysql_query("select count(*) from reviewproduct where notification=0");
          $r=  mysql_fetch_array($rp);
          echo $r[0];
    }
}


if($_REQUEST[olkhan]=="reviewid")
{
  ?>

<h5 class="title">You have <?php echo $p[0]; ?> Review Product </h5>
                    <ul class="dropdown-list normal-list">
                        <?php
                     $rpp=  mysql_query("select u.url,u.username,r.* from user u,reviewproduct r where u.userid=r.userid and r.notification=0  order by r.reviewid desc");
                     while ($pp=  mysql_fetch_array($rpp))
                     {
                    ?>
                        <li class="new" onclick="notification('reviewp',<?php echo $pp[4]; ?>,0);noti('reviewid');">
                            <a href="#">
                                <span class="thumb"><img src="../<?php echo $pp[0]; ?>" alt="" /></span>
                                <span class="desc">
                                    <span class="name" style="text-transform: capitalize"><?php echo $pp[1]; ?><span class="badge badge-success">new</span></span>
                                    &nbsp; <em class="small"><?php echo substr($pp[6],0,10);  ?></em>
                                    <span class="msg"><?php echo $pp[5];  ?></span>
                                </span>
                            </a>
                        </li>
                        <?php
                     }
                        ?>
                        <li class="new" onclick="notification('reviewp',0,'all');"><a href="manageproductreview.php">Read All Review</a></li>
                    </ul>

<?php
}
?>


<?php

if($_REQUEST[konu]=="reviews")
{
    if($_REQUEST[badhu]=="all")
    {
  
          $un=mysql_query("update reviewstore set notification=1");

    echo "0";
        
    }
    else
    {
    $un=mysql_query("update reviewstore set notification=1 where reviewstoreid=$_REQUEST[id]");

    $rs=  mysql_query("select count(*) from reviewstore where notification=0");
          $s= mysql_fetch_array($rs);
          echo $s[0];
    }
}


if($_REQUEST[olkhan]=="reviewstoreid")
{
  ?>

<h5 class="title">You have 5 Mails </h5>
                    <ul class="dropdown-list normal-list">
                        <?php
                     $rss=  mysql_query("select u.url,u.username,r.* from user u,reviewstore r where u.userid=r.userid and r.notification=0  order by r.reviewstoreid desc");
                     while ($ss=  mysql_fetch_array($rss))
                     {
                    ?>
                        <li class="new" onclick="notification('reviews',<?php echo $ss[4]; ?>,0);noti('reviewstoreid');">
                            <a href="#">
                                <span class="thumb"><img src="../<?php echo $ss[0]; ?>" alt="" /></span>
                                <span class="desc">
                                    <span class="name"><?php echo $ss[1]; ?><span class="badge badge-success">new</span></span>
                                    &nbsp;<em class="small"><?php echo substr($ss[6],0,10);  ?></em>
                                    <span class="msg"><?php echo $ss[5]; ?></span>
                                </span>
                            </a>
                        </li>
                       <?php
                     }
                       ?>
                        <li class="new" onclick="notification('reviews',0,'all');"><a href="managesellerreview.php">Read All Review Store</a></li>
                    </ul>

<?php
}
?>




