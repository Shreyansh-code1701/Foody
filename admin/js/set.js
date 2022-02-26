
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