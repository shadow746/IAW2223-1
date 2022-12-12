$(document).ready(function () {
    $("#btn-todos").click(function (e) { 
        e.preventDefault();
        
        $.get("https://fakestoreapi.com/products").done(function (r){
            let num_productos = r.length;
            $("#resultados").empty();
            console.log(r);
            for (let i=0; i<num_productos; i++){
                let respuesta = new Object(r[i]);
                let id = respuesta.id;
                let titulo = respuesta.title;
                let imagen = respuesta.image;
                let categoria = respuesta.category;
                let precio = respuesta.price;
                $('#resultados').append(
                    '<p>'+'<img width="120" src="'+imagen+'"></p>' +
                    '<p>Artículo: '+ titulo+' ref: '+id+'</p>' + 
                    '<p>Familia: '+categoria+'</p>' +  
                    '<p>Precio: ' + precio + '</p>');
            }
        });
    });
    
    $("#btn-producto").click(function(){
        let codigo = $("#codProducto").val();
        $.get("https://fakestoreapi.com/products/"+codigo).done(function (respuesta){
            console.log(respuesta);
            let titulo = respuesta.title;
            let imagen = respuesta.image;
            let categoria = respuesta.category;
            let precio = respuesta.price;
            $("#resultados").empty();
            $('#resultados').append(
                '<p>'+'<img width="120" src="'+imagen+'"></p>' +
                '<p>Artículo: '+titulo+'</p>' + 
                '<p>Categoría: '+categoria+'</p>' +  
                '<p>Nº Precio: ' +precio+'</p>');
        }).fail(function (respuesta){
            alert("Error en este artículo");
        });
    });
});