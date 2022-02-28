<?php
session_start();
ob_start();
    $con=  mysql_connect("localhost","root","");
    if(!$con)
    {
        die ("not connect"). mysql_error();
    }
    mysql_select_db("foodlocker",$con);
    
    
    
?>