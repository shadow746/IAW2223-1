function ruletarusa(){

    document.getElementById("resultado").innerHTML = "";
    
    let numero = document.getElementById("numero").value;
    let random = parseInt(Math.random()*5);
    let acertado=false;
    
    if (numero == random)
    {
        document.getElementById("resultado").innerHTML = "Enohrabuena has acertado !!!!";
    
    } else {
    
        document.getElementById("resultado").innerHTML = "Lo siento, sigue intentandolo"
    }
    
}