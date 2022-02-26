function searchbox(str)
{
    if(str=='open')
        {
            $('#search').css('display','block');
        }
        if(str=='close')
        {
            $('#search').css('display','none');
        }
}

function loginbox(str)
{
     
    if(str=='open')
        {
            $('#loginpage').show( "clip", {direction: "horizontal"}, 500 );
        }
      if(str=='close')
            {
                 $('#loginpage').hide( "drop", {direction: "varticle"}, 1000 );
            } 
}

function inquery(str)
{
     
    if(str=='open')
        {
            $('#inquery').show( "clip", {direction: "horizontal"}, 500 );
        }
      if(str=='close')
            {
                 $('#inquery').hide( "drop", {direction: "varticle"}, 1000 );
            } 
}

$(document).ready(function(){
    c=0;
    $("#activesub").hide();
    $('#cuisine').click(function(){
        if(c==0)
            {
                $("#activesub").slideDown(200);
                $('#cuisine').attr("class","fa fa-unlock");
                c=1;
            }
        else
            {
                $("#activesub").slideUp(200);
                $('#cuisine').attr("class","fa fa-lock");
                c=0;
            }
    });
 
    
});

$(document).ready(function(){
    c=0;
    $("#pagessub").hide();
    $('#pages').click(function(){
        if(c==0)
            {
                $("#pagessub").slideDown(200);
                $('#pages').attr("class","fa fa-unlock");
                c=1;
            }
        else
            {
                $("#pagessub").slideUp(200);
                $('#pages').attr("class","fa fa-lock");
                c=0;
            }
    });
    
    $("#showlogin").click(function(){
    $('.loginkule').show("explode" , {pieces : 16} , 2000);
});
    
});

$(document).ready(function(){
    
    c=0;
    $("#showpass").click(function(){
        
        if(c==0)
        {
            document.getElementById("password").setAttribute("type","text");
            c=1;
        }
        else
        {
            document.getElementById("password").setAttribute("type", "password");
            c=0;
        }
        
    });
    
});

$(document).ready(function(){
    
    c=0;
    $("#sw").click(function(){
        
        if(c==0)
        {
            document.getElementById("pass").setAttribute("type","text");
            c=1;
        }
        else
        {
            document.getElementById("pass").setAttribute("type", "password");
            c=0;
        }
        
    });
    
});

$(document).ready(function(){
    
    c=0;
    $("#csw").click(function(){
        
        if(c==0)
        {
            document.getElementById("cpass").setAttribute("type","text");
            c=1;
        }
        else
        {
            document.getElementById("cpass").setAttribute("type", "password");
            c=0;
        }
        
    });
    
});

function cap()
{
    $.ajax({
        
        url:'capcha.php',
        type:'POST',
        success:function(data){
            
            $("#capcha").html(data);
            
        }
        
    });
}



function getcity(tbl,id)
{
    $.ajax({
        
        url:'missing.php?tbl='+tbl+'&id='+id,
        type:'POST',
        success:function(data)
        {
            $('#'+tbl).html(data);
        }
        
    });
}

function picc(a)
{
  
    if(a=='1')
        {
            
        }
    else if(a.files && a.files[0])
        {
            
            $("#pic1").show();
            $("#pic").hide();
            var reader=new FileReader();
            reader.onload=function(e){
                 $("#pic1").attr('src',e.target.result);
                    $("#pic2").attr('src',e.target.result);
            }
           reader.readAsDataURL(a.files[0]);
        }
        else
            {
                    $("#pic1").hide();
            }
}

function misscon(konu,kona)
{
    
    $.ajax({
        url:'missing.php?konu='+konu+'&kona='+kona,
        type:'POST',
        success :function(data){
            $("#"+konu).html(data);
        }
    });
}


function grate(kona,val)
{
   
    $.ajax({
        url:'missing.php?kona='+kona+'&val='+val,
        type:'POST',
        success :function(data){
            $("#ratedekho").html(data);
        }
    });
}

function prate(kona,val)
{
   
    $.ajax({
        url:'missing.php?kona='+kona+'&val='+val,
        type:'POST',
        success :function(data){
            $("#pratedekho").html(data);
        }
    });
}

function missprice(qty,price)
{
    $("#misspr").html(qty*price);
}

function like(id,pid)
{
    $.ajax({
        url:'missing.php?konu=like&pid='+pid,
        type:'POST',
        success :function(data){
            $("#"+id).html(data);
        }
    });
}

function prate(kona,val)
{
   
    $.ajax({
        url:'missing.php?kona='+kona+'&val='+val,
        type:'POST',
        success :function(data){
            $("#pratedekho").html(data);
        }
    });
}

function avgrate(kona)
{
   
    $.ajax({
        url:'missing.php?kona='+kona,
        type:'POST',
        success :function(data){
            $("#avg"+kona).html(data);
        }
    });
}

function opencart()
{
    
    $("#mainmenu").removeClass("col-md-12");
    $("#maincontainer").removeClass("container");
   
    $("#maincontainer").addClass("container-fluid");
    $("#mainmenu").addClass("col-md-9");
   
    $("#food").css("display","block");
}

function misscart(kona,id,q)
{
     $.ajax({
        url:'cart.php?kona='+kona+'&id='+id+'&q='+q,
        type:'POST',
        success :function(data){
            $("#misscartdata").html(data);
        
        }
    });
}

function confirmcart(kona)
{
     $.ajax({
        url:'cart.php?kona='+kona,
        type:'POST',
        success :function(data){
            $("#confirmcartdata").html(data);
        
        }
    });
}


function addform(kona,val)
{
   
    $.ajax({
        url:'missing.php?kona='+kona+'&val='+val,
        type:'POST',
        success :function(data){
            $("#maruaddform").html(data);
        }
    });
    if(val!=0)
        {
            $("#maruaddform").slideUp(1000);
        }
    
}

function missuserbill(kona,su,val)
{
   
    $.ajax({
        url:'missing.php?kona='+kona+'&su='+su+'&val='+val,
        type:'POST',
        success :function(data){
            $("#missbill").html(data);
        }
    });
    
}

function follow(shu,val)
{
   
    $.ajax({
        url:'missing.php?shu='+shu+'&val='+val,
        type:'POST',
        success :function(data){
            $("#").html(data);
        }
    });
}

function fillcode(kona)
{
   
    $.ajax({
        url:'missing.php?kona='+kona,
        type:'POST',
        success :function(data){
            $("#fillcode").html(data);
        }
    });
}


function usermis(kona,koni,su)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su,
        type:'POST',
        success :function(data){
            $("#userbillmis").html(data);
        }
    });
}

function clearfilter()
{
    $("input[type=checkbox]").removeAttr("checked");
}

function misssearch(kona,ketla,kaya)
{
  
    if(kaya=="list"){
        $("#list").css("background","#232323").css("color","#ffffff");
        $("#detail").css("background","#ffffff").css("color","#232323");
    }
    if(kaya=="detail"){
        $("#detail").css("background","#232323").css("color","#ffffff");
        $("#list").css("background","#ffffff").css("color","#232323");
    }
    
    var pp=document.getElementById("perpage").value;
    var d=$("#filter").serialize();
    
    $.ajax({
        
        url:'misssearch.php?kona='+kona+'&ketla='+ketla+'&kaya='+kaya+'&pp='+pp,
        type:'POST',
        data:d,
        success:function(data){
    
        $("#misssearch").html(data);
        }
        
    });
    
}   


function mainsearch(kona,ketla,kaya,stateid,cityid,areaid,keyword)
{
    $.ajax({
        
        url:'misssearch.php?kona='+kona+'&ketla='+ketla+'&kaya='+kaya+'&stateid='+stateid+'&cityid='+cityid+'&areaid='+areaid+'&keyword='+keyword,
        type:'POST',
      
        success:function(data){
    
        $("#misssearch").html(data);
        }
        
    });
    
}   




function loginerr()
{
    
    var kona="loginpage";
   var user=document.getElementById("user").value;
   var password=document.getElementById("password").value;
   
    $.ajax({
        url:'missing.php?kona='+kona+'&user='+user+'&password='+password,
        type:'POST',
        success :function(data){
            $("#error").html(data);
        }
    });
}


function missprkeyup(qty,price)
{
    var q=parseInt(qty);
    
    if((q<=12 && q>=1) || qty=="")
        {
            if(qty=="")
                {
                    q=0;
                }
                var ans=(q)*(price);
                $("#misspr").text(ans);
        }
        else
            {
                $("#rs").val(12);
                var ans=(12)*(price);
                $("#misspr").text(ans);
            }
}


function storepanel(kona,work,id)
{
    $.ajax({
        url:'storepanel.php?kona='+kona+'&work='+work+'&id='+id,
        type:'POST',
        success :function(data){
            
            $("#storedetail").html(data);
        }
    });
    
}


function eventbook(str,idd)
{
    if(str=='open')
        {
            $('#eventbook').slideDown(500 );
        }
      if(str=='close')
            {
                 $('#eventbook').slideUp(500 );
            } 
    $.ajax({
        url:'storepanel.php?str='+str+'&idd='+idd,
        type:'POST',
        success :function(data){
            
            $("#eventbook").html(data);
        }
    });        
}


