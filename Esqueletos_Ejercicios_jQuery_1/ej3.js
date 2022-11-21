/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-aumentar").click(function (e) { 
        e.preventDefault();
       $(".pares").css("font-size","150%");
       $("#encabezado").css("font-size","150%");
    });

    $("#btn-disminuir").click(function (e) { 
        e.preventDefault();
       $(".pares").css("font-size","75%");
       $("#encabezado").css("font-size","75%");
    });
});