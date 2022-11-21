/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-aumentar").click(function (e) { 
        e.preventDefault();
       $(".pares").css({"font-size":"150%","color":"blue"});
       $("#encabezado").css({"font-size":"150%","color":"blue"});
    });

    $("#btn-disminuir").click(function (e) { 
        e.preventDefault();
       $(".pares").css({"font-size":"75%","color":"red"});
       $("#encabezado").css({"font-size":"75%","color":"red"});
    });
});