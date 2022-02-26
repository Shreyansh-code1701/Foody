<?php
require_once 'adminsecure.php';
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <link href="images/tablogo.png" rel="icon"/>

    <title>Admin</title>


    <link href="js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="js/iCheck/skins/square/blue.css" rel="stylesheet"/>
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css"/>

    <link href="css/animate.css" type="text/css" rel="stylesheet"/>
    
    <link href="css/clndr.css" rel="stylesheet"/>

    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/style-responsive.css" rel="stylesheet"/>

     <script src="js/jquery-1.10.2.min.js"></script>
     <script src="../admin/js/myscript.js" type="text/javascript"></script>
     
     <script type="text/javascript">
 
     function form(kona,konu,sukam,id)
{
    $.ajax({
        url:'missing.php?kona='+kona+'&konu='+konu+'&sukam='+sukam+'&id='+id,
        type:'POST',
        success:function(data)
        {
            $("#"+konu+kona).html(data);
        }
    });
}


function notification(konu,id,badhu)
{
      $.ajax({
        url:'missing.php?konu='+konu+'&id='+id+'&badhu='+badhu,
        type:'POST',
        success :function(data){
          $("#"+konu).html(data);  
        }
    });
}   



function dis(kona,konu,page,ketla,disha,recid,delid)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&konu='+konu+'&page='+page+'&ketla='+ketla+'&disha='+disha+'&recid='+recid+'&delid='+delid,
        type:'POST',
        success:function(data)
        {
            $("#"+konu+"data").html(data);
        }
    });
}


function recdis(kona,konu,page,ketla,disha,recid,delid,badhudel)
{
    $.ajax({
        url:'missing.php?kona='+kona+'&konu='+konu+'&page='+page+'&ketla='+ketla+'&disha='+disha+'&recid='+recid+'&delid='+delid+'&badhudel='+badhudel,
        type:'POST',
        success:function(data)
        {
            $("#"+konu+"recdata").html(data);
        }
    });
}

function active(kona,konu,page,ketla,disha,recid,active)
{
    var c=confirm("Are you sure, you want to active ?");
    if(c)
    {
            var s=document.getElementById('find').value;
        
        $.ajax({
        url:'missing.php?kona='+kona+'&konu='+konu+'&page='+page+'&ketla='+ketla+'&disha='+disha+'&recid='+recid+'&active='+active,
        type:'POST',
        success:function(data)
        {
            $("#"+konu+"data").html(data);
        }
    });
    }

}
 
     </script>
     
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

function noti(olkhan)
{
    $.ajax({
        url:'missing.php?olkhan='+olkhan,
        type:'POST',
        success:function(data)
        {
            $("#"+olkhan).html(data);
        }
    });
}
 </script>
     

</head>