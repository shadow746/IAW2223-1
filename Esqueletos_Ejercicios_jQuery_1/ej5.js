$(document).ready(function () {
    $("#btn-fadeIn").click(function (e) { 
        e.preventDefault();
        $(".caja").fadeIn();
    });

    $("#btn-fadeOut").click(function (e) { 
        e.preventDefault();
        $(".caja").fadeOut();
       
    });
    $("#btn-fadeToggle").click(function (e) { 
        e.preventDefault();
        $(".caja").fadeToggle();
    });
});