$(document).ready(function () {
    let encabezados = $("h1").length;
    let parrafos = $("p").length;
    let imagenes = $("img").length;
    let enlaces = $("a").length;
    $("#encabezados").append(encabezados);
    $("#parrafos").append(parrafos);
    $("#imagenes").append(imagenes);
    $("#enlaces").append(enlaces);

});