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
    var c=confirm("Are you sure, you want to block ?");
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

function restore(tbl,work,p,pp,id)
{
    $.ajax({
        url:'restore.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&id='+id,
        type:'POST',
        success :function(data){
            $("#r"+tbl).html(data);
        }
    });
   
}

function recycle(tbl,work,p,pp)
{
    $.ajax({
        url:'restore.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp,
        type:'POST',
        success :function(data){
            $("#r"+tbl).html(data);
        }
    });
}
function ppp(a)
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
            
        }
        reader.readAsDataURL(a.files[0]);
    }
    else
    {
        $("#pic1").hide();
    }
}
function fdel(tbl,work,p,pp,id)
{
    var c=confirm("Are you sure, you want to delete ?");
    if(c)
    {
        $.ajax({
            url:'restore.php?tbl='+tbl+'&work='+work+'&p='+p+'&pp='+pp+'&id='+id,
            type:'POST',
            success :function(data){
                $("#r"+tbl).html(data);
            }
        });
    }

}

function missbill(konu,kona,stid,id)
{
    
    $.ajax({
        url:'missing.php?konu='+konu+'&kona='+kona+'&stid='+stid+'&id='+id,
        type:'POST',
        success :function(data){
            $("#"+konu).html(data);
        }
    });
}

function seapack(kona,koni,su)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su,
        type:'POST',
        success :function(data){
            $("#packmis").html(data);
        }
    });
}

function seabanner(kona,koni,su)
{
    
    $.ajax({
        url:'missing.php?kona='+kona+'&koni='+koni+'&su='+su,
        type:'POST',
        success :function(data){
            $("#bannermis").html(data);
        }
    });
}

function adminmissbill(kona,su,val)
{
  
 
    $.ajax({
        url:'missing.php?kona='+kona+'&su='+su+'&val='+val,
        type:'POST',
        success :function(data){
            $("#adminbilldata").html(data);
        }
    });
}




function state(konu,ketla)
{
    if(konu=="state")
    {
        c=0;
        function cntstate()
        {
            c++;
   
    $("#"+konu).html(c);
  
            if(c==ketla)
                {
                    clearInterval(i);
                }
        }
        
    }
    i=setInterval(cntstate,150);
}

function city(konu,ketla)
{
    
    if(konu=="city")
    {
        c1=0;
        function cntcity()
        {
            c1++;
            $("#"+konu).html(c1);
            if(c1==ketla)
                {
                    clearInterval(i1);
                }
        }
    }
    i1=setInterval(cntcity,150);
}

function area(konu,ketla)
{
    
    if(konu=="area")
    {
        c2=0;
        function cntarea()
        {
            c2++;
            $("#"+konu).html(c2);
            if(c2==ketla)
                {
                    clearInterval(i2);
                }
        }
    }
    i2=setInterval(cntarea,150);
}

function packagebill(konu,ketla)
{
    
    if(konu=="packagebill")
    {
        c3=0;
        function cntpackage()
        {
            c3++;
            $("#"+konu).html(c3);
            if(c3==ketla)
                {
                    clearInterval(i3);
                }
        }
    }
    i3=setInterval(cntpackage,150);
}


