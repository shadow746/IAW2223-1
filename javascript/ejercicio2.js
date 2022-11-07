function cambiodolar() {

    let a = 0 , b = 0, cantidad;
    cantidad = document.getElementById("euro").value;

    if ((cantidad.length==0) || (parseFloat(cantidad)<0) || isNaN(cantidad)) {
        b = "Debes introducir una cantidad válida";
    }
    else
    {

        a = parseFloat(cantidad);
        b = a * 0.99;
        
    }
    
    document.getElementById("cambio").innerHTML = b;

}

function cambioeuro() {

    let a = 0 , b = 0, cantidad;
    cantidad = document.getElementById("euro").value;

    if ((cantidad.length==0) || (parseFloat(cantidad)<0)) {
        b = "Debes introducir una cantidad válida";
    }
    else
    {

        a = parseFloat(cantidad);
        b = a / 0.99;
        
    }
    
    document.getElementById("cambio").innerHTML = b;

}