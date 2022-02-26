<?php
require_once 'connection.php';

if($_SESSION[type]=="")
{
    header("location:../index.php");
}
if($_SESSION[type]!=0)
{
    header("location:../index.php");
}


?>
