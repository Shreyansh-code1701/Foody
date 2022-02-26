
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

function piccc(a)
{
  
    if(a=='1')
        {
            
        }
    else if(a.files && a.files[0])
        {
            
            $("#picc1").show();
            $("#picc").hide();
            var reader=new FileReader();
            reader.onload=function(e){
                 $("#picc1").attr('src',e.target.result);
                    $("#picc2").attr('src',e.target.result);
            }
           reader.readAsDataURL(a.files[0]);
        }
        else
            {
                    $("#picc1").hide();
            }
}





function cap()
{
//    alert("hii");
    $.ajax({
        
        url:'capcha.php',
        type:'POST',
        success:function(data){
            
            $("#capcha").html(data);
            
        }
        
    });
}




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


function missuserbill(konu,kona)
{
    
    $.ajax({
        url:'missing.php?konu='+konu+'&kona='+kona,
        type:'POST',
        success :function(data){
            $("#"+konu).html(data);
        }
    });
}

function restore(cuisine,shema,shu,storeid,mcatid)
{
    
    $.ajax({
        url:'missing.php?cuisine='+cuisine+'&shema='+shema+'&shu='+shu+'&storeid='+storeid+'&mcatid='+mcatid,
        type:'POST',
        success:function(data){
        $("#add"+cuisine).html(data);
        }
    });
}

function backup(mcat,shema,shu,storeid,mcatid,backup)
{
    $.ajax({
        url:'missing.php?mcat='+mcat+'&shema='+shema+'&shu='+shu+'&storeid='+storeid+'&mcatid='+mcatid+'&backup='+backup,
        type:'POST',
        success:function(data){
        $("#add"+mcat).html(data);
        }
    });
}

function reestore(storeevent,shema,shu,storeid,eventid)
{
    
    $.ajax({
        url:'missing.php?storeevent='+storeevent+'&shema='+shema+'&shu='+shu+'&storeid='+storeid+'&eventid='+eventid,
        type:'POST',
        success:function(data){
        $("#add"+storeevent).html(data);
        }
    });
}

function bbackup(event,shema,shu,storeid,eventid,backup)
{
    $.ajax({
        url:'missing.php?event='+event+'&shema='+shema+'&shu='+shu+'&storeid='+storeid+'&eventid='+eventid+'&backup='+backup,
        type:'POST',
        success:function(data){
        $("#add"+event).html(data);
        }
    });
}

function misscuis(konuma,id)
{
  
    $.ajax({
        url:'missing.php?konuma='+konuma+'&id='+id,
        type:'POST',
        success:function(data){
        $("#"+konuma).html(data);
        }
    });  
}


function missstore(konu,sukam,id)
{
  
    $.ajax({
        url:'missing.php?konu='+konu+'&sukam='+sukam+'&id='+id,
        type:'POST',
        success:function(data){
        $("#"+konu).html(data);
        }
    });  
}

function sellerseapack(kona,koni,su)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su,
        type:'POST',
        success :function(data){
            $("#sellerpackmis").html(data);
        }
    });
}

function sellerbannerpack(kona,koni,su)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su,
        type:'POST',
        success :function(data){
            $("#sellerbannermis").html(data);
        }
    });
}

function sellbill(kona,shu,id)
{
 
 var lp,hp;
 if(id!=0)
     {

     
        lp=$("#low").val();
        hp=$("#high").val();
     
     }   
 
    $.ajax({
        url:'missing.php?kona='+kona+'&shu='+shu+'&id='+id+'&lp='+lp+'&hp='+hp,
        type:'POST',
        success :function(data){
            $("#sellbill").html(data);
        }
    });
    
}


function sellerusemis(kona,koni,su)
{
    
     var lp,hp;
 if(su!=0)
     {

     
        lp=$("#low").val();
        hp=$("#high").val();
     
     }  
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su+'&lp='+lp+'&hp='+hp,
        type:'POST',
        success :function(data){
            $("#sellermis").html(data);
        }
    });
}


function display(tbl,work,p,pp)
{
    var s=document.getElementById('find').value;
    $.ajax({
        url:'missing.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&find='+s,
        type:'POST',
        success :function(data){
            $("#"+tbl).html(data);
        }
    });
}
function up(tbl,work,p,pp,id)
{
    var s=document.getElementById('find').value;
    $.ajax({
        url:'missing.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&find='+s+'&uid='+id,
        type:'POST',
        success :function(data){
            $("#"+tbl).html(data);
        }
    });
}
function update(tbl,work,p,pp,id)
{
    var s=document.getElementById('find').value;
    var v=document.getElementById('val').value;
    var ptn=/^[a-z ]+$/;
    if(v.match(ptn))
    {
        $.ajax({
            url:'missing.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&find='+s+'&id='+id+'&v='+v,
            type:'POST',
            success :function(data){
                $("#"+tbl).html(data);
            }
        });
    }
    else
    {
        $("#val").css("border","1px solid red");
    }
}
function del(tbl,work,p,pp,id)
{
    var c=confirm("Are you sure, you want to delete ?");
    if(c)
    {
        var s=document.getElementById('find').value;
        $.ajax({
            url:'missing.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&find='+s+'&id='+id,
            type:'POST',
            success :function(data){
                $("#"+tbl).html(data);
            }
        });
    }

}

function blk(tbl,work,p,pp,id)
{
    var c=confirm("Are you sure, you want to confirm ?");
    if(c)
    {
        var s=document.getElementById('find').value;
        $.ajax({
            url:'missing.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&find='+s+'&id='+id,
            type:'POST',
            success :function(data){
                $("#"+tbl).html(data);
            }
        });
    }

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

function packagebill(konu,ketla)
{
    if(konu=="packagebill")
    {
        c=0;
        function cntpackage()
        {
            c++;
   
    $("#"+konu).html(c);
  
            if(c==ketla)
                {
                    clearInterval(i);
                }
        }
        
    }
    i=setInterval(cntpackage,150);
}