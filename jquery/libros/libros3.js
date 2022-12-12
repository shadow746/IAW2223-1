var availableTags =[];
var availableTags2 = [];
var respuesta=[];

$(document).ready(function () {
    $.get("https://gutendex.com/books/").done(function (r){
        let num_libros = r.results.length;
        
        $( function (){

            for (let i=0; i<num_libros; i++)
            {
                respuesta[i] = new Object(r.results[i]);
                availableTags[i] = respuesta[i].title;                            
            }
            console.log(respuesta);
            $("#titulolibro").autocomplete({source: availableTags});
            availableTags = [];
            AgregarAutores();
            console.log(availableTags);
            $("#autorlibro").autocomplete({source: availableTags});
                
        });
            
    });

    $("#btn-librotitulo").click(function () { 
        let titulo = $("#titulolibro").val();
        $("#resultados").empty();
        let fin = respuesta.length;
        for (let i=0;i<fin;i++)
        {
            if (respuesta[i].title==titulo)
            {
                let autor = respuesta[i].authors.length == 0 ? "Anónimo" : respuesta[i].authors[0].name;
                let imagen = respuesta[i].formats['image/jpeg'];
                let enlace = respuesta[i].formats['text/plain; charset=us-ascii'];
                let numeroDescargas = respuesta[i].download_count;
                $("#resultados").empty();
                $('#resultados').append(
                '<p>'+'<img width="120" src="'+imagen+'"></p>' +
                '<p>Título: '+titulo+'</p>' + 
                '<p>Autor: '+autor+'</p>' + 
                '<p><a href="'+enlace+'" target="_blank">Descarga aquí</a></p>' + 
                '<p>Nº descargas: ' + numeroDescargas + '</p>');
            }
        }
            
    });

    $("#btn-libroautor").click(function () { 
        let autor = $("#autorlibro").val();
        let fin = respuesta.length;
        $("#resultados").empty();

        for (let i=0;i<fin;i++)
        {
            if (respuesta[i].authors[0].name==autor)
            {
                    
                let titulo = respuesta[i].title;
                let imagen = respuesta[i].formats['image/jpeg'];
                let enlace = respuesta[i].formats['text/plain; charset=us-ascii'];
                let numeroDescargas = respuesta[i].download_count;
                $('#resultados').append(
                '<p>'+'<img width="120" src="'+imagen+'"></p>' +
                '<p>Título: '+titulo+'</p>' + 
                '<p>Autor: '+autor+'</p>' + 
                '<p><a href="'+enlace+'" target="_blank">Descarga aquí</a></p>' + 
                '<p>Nº descargas: ' + numeroDescargas + '</p>');
            }
        }
            
    });

});
function AgregarAutores ()
        {
            let fin = respuesta.length;

            for (let i=0;i<fin;i++)
            {
                if(respuesta[i].authors.length==0)
                {
                    UnirAutores("anonimo",i);

                }else if (respuesta[i].authors.length==1)
                {
                    //availableTags[i] = respuesta[i].authors[0].name;
                    UnirAutores(respuesta[i].authors[0].name,i);

                }else
                {
                    for (let j=0;j<respuesta[i].authors.length;j++)
                    {
                       UnirAutores(respuesta[i].authors[j].name,i);
                    }
                }
            }
        }

        function UnirAutores(autor,i)
        {
            let existe=0;
            
            for (let j=0;i<i;j++)
            {
                if(availableTags[j]==autor)
                {
                    existe=1;
                }
            }
            if (existe==0)
            {
                availableTags[i]=autor;
            }           
        }