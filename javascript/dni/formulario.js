function ValidarFormulario()
{
    document.getElementById("resultado").innerHTML ="";
    //let entradas = document.getElementsByTagName("input");
    let entradas = [];    
    let correctopass = 1;
    let correctodni=1;
    let correcto=1;
    let correctomail=1;
    let i,id,longitud;

    for (i=0;i<9; i++)
    {
        if (i<3 || i>5)
            {
                document.getElementById("error"+i).innerHTML = " ";
            }
    }

    for (i=0; i<9; i++)
    {
        entradas.push(document.getElementById("dato"+i).value);
    }

    longitud = entradas.length-1;
    
    for (i=0; i<longitud; i++)
    {
        if (i<3 || 5<i)
        {     
            if (entradas[i]== "")
            {
                id = "error"+i;
                document.getElementById(id).innerHTML = "Este campo es obligatorio";
                correcto = 0; 

            }else if (i==2)
            {
                correctomail=VerificarMail(entradas[i],i);

            }else if (i==6)
            {
                correctodni = VerificarDni(entradas[i],i);

            } else if (i==7)
            {
                correctopass = VerificarPassword (entradas[i],entradas[i+1],i);
            }
        }
    }
    if (correctodni == 1 && correctopass==1 && correcto==1 && correctomail==1)
    {
        document.getElementById("resultado").innerHTML = "El formulario es correcto";
    }
}

function VerificarPassword (pass1,pass2,i)
{
        let correcto = 1;
        let valores = /^[a-zA-z0-9]+$/;
        let tamano1 = pass1.length;
        let tamano2 = pass2.length;
        let item1 = "error"+i;
        let item2 = "error"+(i+1);

        document.getElementById(item1).innerHTML = "";
            document.getElementById(item2).innerHTML = "";

        if(pass1!=pass2)
        {
            document.getElementById(item1).innerHTML = "las contraseñas no son iguales";
            document.getElementById(item2).innerHTML = "las contraseñas no son iguales";
            correcto=0;
            
        }else if (tamano1<8 || tamano2 <8)
        {
            document.getElementById(item1).innerHTML = "las contraseñas son de mínimo 8 caracteres";
            document.getElementById(item2).innerHTML = "las contraseñas son de mínimo 8 caracteres";
            correcto=0;

        }else if(!pass1.match(valores) || !pass2.match(valores))
        {
            document.getElementById(item1).innerHTML = "solo números y letras";
            document.getElementById(item2).innerHTML = "solo números y letras";
            correcto=0;
        }
        return (correcto);
}

function VerificarDni(dni,i)
{
    let longitud = dni.length;
    let valores = /^[0-9a-zA-Z]+$/;
    let correcto = 1;
    let letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    let letra,letracalc, item;
    item = "error"+i;

    document.getElementById(item).innerHTML ="";

    if (longitud!=9)
    {
        correcto = 0;
        document.getElementById(item).innerHTML = "El DNI introducido no es válido";

    }else
    {
        letracalc = letras [parseInt(dni)%23];
        letra = dni[8];
        letra = letra.toUpperCase();
        if(letra != letracalc)
        {
            correcto = 0;
            document.getElementById(item).innerHTML = "El DNI introducido no es válido";
        }
    }
    return(correcto);
}

function VerificarMail(entrada,i)
{
    let correo = /^[0-9a-zA-Z]+@+[a-zA-z]+[.]+[a-zA-Z]+$/;
    let correcto = 1;
    if (!correo.test(entrada))
    {
        correcto=0;
        document.getElementById("error"+i).innerHTML = "El mail no es correcto" 
    }
    return (correcto);
}