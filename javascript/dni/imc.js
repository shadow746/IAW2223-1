function calcularImc()
{
    let altura = document.getElementById("altura").value;
    let peso = document.getElementById("peso").value; 
    altura = altura/100;
    altura = altura*altura; 
    let imc;
    imc = peso/altura;
    if (imc<18.5)
    {
        document.getElementById("imc").innerHTML="Su nivel de masa corporal esta por debajo de lo normal"; 
    }
    else if (imc<24.9)
    {
        document.getElementById("imc").innerHTML="Su nivel de masa corporal es normal";
    }
        else if (imc<29.9)
        {
            document.getElementById("imc").innerHTML=" Su nivel de masa corporal es superior al normal";
        }
            else 
            {
                document.getElementById("imc").innerHTML="Estas obeso";
            }
      
}