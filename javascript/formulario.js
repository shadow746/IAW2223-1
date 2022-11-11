function ValidarFormulario()
{
    let entradas = document.getElementsByTagName("input");
    let i,fin,id;
    let correcto = 1;
    fin= entradas.length;
    
    for (i=0;fin;i++)
    {
        if (entradas[i]=="")
        {
            id = "error"+i;
            document.getElementById(id).innerHTML = "Este campo es obligatorio";
            correcto = 0; 
        } else if (i==7)
        {
            correcto = VerificarDni(entradas[i],i);

        } else if (i==8)
        {
            correcto = VerificarPassword (entradas[i],entradas[i+1],i);
        }
    }
    if (correcto == 1)
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
    let valores = /^[0-9]+$/;
    let correcto = 1;
    let letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    let letra,letracalc, item;
    item = "error"+i;

    if (longitud!=9)
    {
        correcto = 0;
        document.getElementById(item).innerHTML = "El DNI introducido no es válido";

    }else
    {
        letracalc = letras [parseInt(dni)%23];
        letra = dni(8);
        if(letra != letracalc)
        {
            correcto = 0;
            document.getElementById(item).innerHTML = "El DNI introducido no es válido";
        }
    }
    return(correcto);
}