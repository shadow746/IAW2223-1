$(document).ready(function () {
    let url = "https://gutendex.com/books"
    let biblioteca ={};
    biblioteca = $.get(url+4).done(function (biblioteca){

        console.log(biblioteca)
        $("#peliculas").text(biblioteca.title);

    });

    
});