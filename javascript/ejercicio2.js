function cambiodivisa() {

    let a = 0 , b = 0, dolar;
    euro = document.getElementById("euro").value;

    if (euro.length==0) {
        b = "Debes introducir un numero";
    }
    else{

        a = parseFloat(euro);
        b = a * 0.99;
        
    }
    
    document.getElementById("dolar").innerHTML = b;

}