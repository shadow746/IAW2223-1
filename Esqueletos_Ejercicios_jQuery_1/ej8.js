$(document).ready(function () {
    $("#btn-imagen").click(function (e) { 
        e.preventDefault();
        let imagen = $("img").attr("src");
        alert(imagen);
    });

    $("#btn-encabezado").click(function (e) { 
        e.preventDefault();
        let encabezado = $("h1").text();
        alert(encabezado);
    });

    $("#btn-parrafo").click(function (e) { 
        e.preventDefault();
        let parrafo = $("p").text();
        alert(parrafo);
    });
});