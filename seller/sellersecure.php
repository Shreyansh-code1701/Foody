<?php
require_once 'connection.php';

if($_SESSION[type]=="")
{
    header("location:../index.php");
}
if($_SESSION[type]!=1)
{
    header("location:../index.php");
}



?>
