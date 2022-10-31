function cambiodivisa() {

    let a = 0 , b = 0;
    a = parseFloat(document.getElementById("euro").value);
    if (a=="NaN") {
        b = "Debes introducir un numero";
    }
    else{

        b = a * 0.99;
        
    }
    
    document.getElementById("dolar").innerHTML = b;

}