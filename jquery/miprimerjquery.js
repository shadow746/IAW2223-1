$(document).ready(function(){
    $("#btn_ocultar").click(function (e) { 
        e.preventDefault();
        $("p").hide();
    });
    $("#btn_mostrar").click(function (e) { 
        e.preventDefault();
        $("p").show();
        
    });
        
   });   