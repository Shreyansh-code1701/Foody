<?php
require_once 'sellersecure.php';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <link href="images/tablogo.png" rel="icon"/>
    

    <title>Seller</title>


    <link href="js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/blue.css" rel="stylesheet"/>

    <link href="css/animate.css" type="text/css" rel="stylesheet"/>
    
    <link href="css/clndr.css" rel="stylesheet"/>

    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/style-responsive.css" rel="stylesheet"/>

     <script src="js/jquery-1.10.2.min.js"></script>
     <script src="js/myscript.js" type="text/javascript"></script>
     
     <script src="js/set.js" type="text/javascript"/>
     

     
     
     <script type="text/javascript">
       

cn=0;
function login()
{
    cn++;
    s=0;
    $j=$("#mg");
    function inte()
    {
        s++;
        $j.text(s);
        if(s==60)
        {
            window.location.href="../logout.php";
        }
    }
    if(cn==1)
    {
        setInterval(inte,1000);
    }
}

    $(document).ready(function(){
        
        login();
        $(document).keydown(function(){
            login();
        });
        $(document).keyup(function(){
            login();
        });
        $(document).keypress(function(){
            login();
        });
        $(document).mousemove(function(){
            login();
        });
        $(document).mouseout(function(){
            login();
        });
        $(document).mouseover(function(){
            login();
        });
        $(document).mouseup(function(){
            login();
        });
        $(document).mousedown(function(){
            login();
        });
    });
    
    
    
    

</script>




</head>