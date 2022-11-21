$(document).ready(function(){

    $("#btn_nuevo").click(function (e) { 
        e.preventDefault();

        $(".roja").css({"color":"blue",
                "font-size":"200%"});
        
    });
    $("#btn_original").click(function (e) { 
        e.preventDefault();

        $(".roja").css({"color":"red",
                "font-size":"100%"});
        
    });

});   