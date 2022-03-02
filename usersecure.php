<?php
require_once 'connection.php';
if($_SESSION[type]=="")
{
    header("location:registration.php");
}
if($_SESSION[type]!=2)
{
    header("location:registration.php");
}
?>
