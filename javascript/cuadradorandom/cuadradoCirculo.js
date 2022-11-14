function empiezajuego(espera){
    document.getElementById("resultado").innerHTML="";
    let i;
    let cuadrado,circulo,muestra,respuesta;
    
    for (i=0;1<espera;i++); 

    muestra = parseInt(Math.random()*10)%2;

    respuesta = muestrafigura(muestra);
    espera = parseInt(Math.random()*20);
    document.getElementById("respuesta").innerHTML = "Has tardado "+respuesta+" segundos."

    empiezajuego(espera);

}

function muestrafigura(muestra)
{
    let figura;

    if (muestra == 0) {
        figura = 
    }
}