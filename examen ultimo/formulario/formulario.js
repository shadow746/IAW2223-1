function ValidarFormulario()
{
    document.getElementById("resultado").innerHTML ="";
    //let entradas = document.getElementsByTagName("input");
    let entradas = [];    
    let correctopass = 1;
    let correctodni=1;
    let correcto=1;
    let correctomail=1;
    let correctofecha=1;
    let correctocheck = document.getElementById("dato7").checked;
    let usuario;

    let i,id,id2,longitud;
    document.getElementById("usuario").innerHTML = " ";
    document.getElementById("resultado").innerHTML = " ";
    document.getElementById("fechamal").innerHTML = " ";
    
    for (i=0;i<7; i++)
    {
        if (i<7)
            {
                document.getElementById("error"+i).innerHTML = " ";
                
            }
    }

    if (correctocheck)
    {
        correctofecha=Validarfecha(document.getElementById("fecha").value);
        if (correctofecha)
        {
            for (i=0; i<7; i++)
            {
                entradas.push(document.getElementById("dato"+i).value);
            }

            longitud = entradas.length-1;
    
            for (i=0; i<longitud; i++)
            {
            
                if (entradas[i]== "")
                {
                    id = "error"+i;
                    id2 = "dato"+i;
                    document.getElementById(id).innerHTML = "El campo "+document.getElementById(id2).name+" es obligatorio";
                    correcto = 0; 

                }else if (i==3)
                {
                    correctomail=VerificarMail(entradas[i],i);

                }else if (i==4)
                {
                    correctodni = VerificarDni(entradas[i],i);

                } else if (i==5)
                {
                    correctopass = VerificarPassword (entradas[i],entradas[i+1],i);
                }
        
            }
            if (correctodni == 1 && correctopass==1 && correcto==1 && correctomail==1)
            {
                document.getElementById("resultado").innerHTML = "El formulario es correcto";
                usuario = CalcularUsuario(entradas);
                document.getElementById("usuario").innerHTML = "Su suario es: "+usuario;
            }
        }else
        {
            document.getElementById("fechamal").innerHTML = "La fecha es errónea, introduzca una fecha válida";
        }
        
    }else
    {
        document.getElementById("error7").innerHTML = "Debes marcar la casilla";
    } 
}

function Validarfecha(fecha)
{
    let hoy = new Date();
    let dia,mes,anio;
    let correcto = true;
    anio = parseInt(fecha.substring(0,4));
    mes = parseInt(fecha.substring(5,7));
    dia = parseInt(fecha.substring(8,10));

    if (anio<1900)
    {
        correcto = false;
    }else if (anio > hoy.getFullYear())
        {
            correcto = false;
        }else if (anio == hoy.getFullYear() && mes > (hoy.getMonth()+1) )
            {
                correcto = false;
            }else if (dia > hoy.getDate())
                {
                    correcto = false;
                }
    return (correcto);
}


function CalcularUsuario(entradas) 
{ 
    let usuario, nombre,apellido1,apellido2;
    nombre=SinEspacios(entradas[0].toLowerCase());
    apellido1=SinEspacios(entradas[1].toLowerCase());
    apellido2=SinEspacios(entradas[2].toLowerCase());
    console.log(entradas[0],entradas[1],entradas[2]);
    usuario = nombre.substring(0,1) + apellido1.substring(0,3) + apellido2.substring(0,3) + entradas[4].substr(5,3) ;
    usuario = SinTildes(usuario);
    return (usuario);
}

function SinTildes (usuario)
{
    usuario = Array.from(usuario);
    let tamano = usuario.length;
    for(let i=0;i<tamano;i++)
    {
        if(usuario[i]=='á')
        {
            usuario[i] = 'a';
        }else if (usuario [i] == 'é')
            {
                usuario[i] = 'e';
            }else if (usuario[i] == 'í')
                {
                    usuario[i] = 'i';
                }else if (usuario[i] == 'ó')
                    {
                        usuario[i] = 'o';
                    }else if (usuario[i] == 'ú')
                        {
                            usuario[i] = 'u';
                        }
    }

    usuario = usuario.join("");

    return(usuario);
}

function SinEspacios (nombre)
{
    let i,j,long1;
    j = 0;
    let aux=[];
    long1=nombre.length;

    for (i=0;i<long1;i++)
    {
        if(nombre[i]!=" ")
        {
            aux[j] = nombre[i];
            j++;
        }
    }
    aux = aux.join("");
    return (aux);
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

        if(correcto)
        {
            if (pass1.length<8)
            {
                document.getElementById(item1).innerHTML = "La longitud mínima ha de ser 8 caracteres";
                correcto=0;
            }
            if (pass2.length<8)
            {
                document.getElementById(item2).innerHTML = "La longitud mínima ha de ser 8 caracteres";
                correcto=0;
            }
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