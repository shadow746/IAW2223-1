function ValidarFormulario()
{
    let entradas = document.getElementsByTagName("input");
    let i,fin;
    fin= entradas.length;
    
/*Pensarlo bien intentar hacerlo asi*/
    for (i=0;fin;i++)
    {
        if (i==0 || i==1 || i==2)
        {
            
        }
    }

    if(nombre=="")
    {
        document.getElementById("errornombre").innerHTML = "Este campo es obligatorio";
        correcto = 0;
    } 

    if(apellidos == "")
    {
        document.getElementById("errorapellidos").innerHTML = "Este campo es obligatorio";
        correcto = 0;
    }

    if(correo=="")
    {
        document.getElementById("errorcorreo").innerHTML = "Este campo es obligatorio";
        correcto = 0;
    }



}