<?php
session_start();
ob_start();
    $con=  mysql_connect("localhost","root","");
    if(!$con)
    {
        die ("not connect"). mysql_error();
    }
    mysql_select_db("foodlocker",$con);
    
    
    $d=date('Y-m-d');
    $of=  mysql_query("select * from offer where del=0 and  enddate < '$d'");
    while($offer=  mysql_fetch_array($of))
    {
        mysql_query("update offer set del=1 where offerid = $offer[2] ");
    }
?>