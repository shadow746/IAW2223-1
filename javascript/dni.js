function calcularLetra() {
    let letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    let dni = document.getElementById("dni").value;
    let longitud = dni.length;
    let valores = /^[0-9]+$/;
    let letra;
    
    if (longitud==8 && dni.match(valores))
    {
        letra = parseInt(dni)%23;
        document.getElementById("letra").innerHTML = letras[letra];
    }
    else{
        document.getElementById("letra").innerHTML = "Introduzca un DNI correcto";
    }
}

