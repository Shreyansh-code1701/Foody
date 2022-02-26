<?php
require_once 'conection.php';

if($_SESSION[type]=="")
{
    header("location:registration.php");
}
if($_SESSION[type]!=2)
{
    header("location:registration.php");
}



?>
