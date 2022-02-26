<?php
require_once 'conection.php';

if($_SESSION[user]!="")
{
    if($_SESSION[type]==0)
    {
        header("location:admin/adminprofile.php");
    }
    else if($_SESSION[type]==1)
    {
        header("location:seller/seller.php");
    }
    else 
    {
        header("location:userprofile.php");
    }
}

?>