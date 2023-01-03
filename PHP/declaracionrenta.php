<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error{
            color:red;
        }
    </style>
    <title>Declaración Renta</title>
</head>
<body>

<?php

$nombreErr=$apellido1Err=$apellido2Err=$dniErr=$emailErr=$ingresosErr="";


if ($_SERVER["REQUEST_METHOD"] == "POST")
//if(isset($_POST["submit"]))
{
    if (empty($_POST["nombre"])) 
    {
        $nombreErr = "El campo nombre es obligatorio";

    } else 
    {
        $nombre = Validar($_POST["nombre"]);
        
    }
    if (empty($_POST["apellido1"])) 
    {
        $apellido1Err = "El campo primer apellido es obligatorio";

    } else 
    {
        $apellido1 = Validar($_POST["apellido1"]);
        
    }
    if (empty($_POST["apellido2"])) 
    {
        $apellido2Err = "El campo segundo apellido es obligatorio";

    } else 
    {
        $apellido2 = Validar($_POST["apellido2"]);
        
    }
        
    if (empty($_POST["dni"])) 
    {
        $dniErr = "El campo dni es obligatorio";

    } else 
    {
        $dni = Validar($_POST["dni"]);
        //$dniErr = ValidarDni($dni);
       
    }
    if (empty($_POST["email"])) 
    {
        $emailErr = "El campo email es obligatorio";

    } else 
    {
        $email = Validar($_POST["email"]);
        //$emailErr = ValidarEmail($email);
        
    }
    if (empty($_POST["ingresos"])) 
    {
        $ingresosErr = "El campo ingresos es obligatorio";

    } else 
    {
        $ingresos = Validar($_POST["ingresos"]);
        //$ingresosErr = ValidarIngresos($ingresos);
        
    }        
        
    
    if ($nombreErr && $apellido1Err && $apellido2Err && $emailErr && $dniErr && $ingresosErr == "")
    {
    
        //if ($emailErr && $dniErr && $ingresosErr=="")
        //{
            //$resultados = CalcularRenta($ingresos);
            echo "Tus datos son los siguientes: <br>";
            echo "<p>Nombre: ".$nombre."</p><br>";
            echo "<p>Apellidos: ".$apellido1." ".$apellido2."</p><br>";
            echo "<p>Dni: ".$dni."</p><br>";
            echo "<p>Correo electrónico: ".$email."</p><br>";
            echo $ingresos;
            //echo "<p>Ingresos Brutos: ".$resultados." €</p><br>";
    
        //}    
    
            
    }

}

function Validar($datos){

   $datos = trim($datos);
   $datos = stripslashes($datos);
   $datos = htmlspecialchars($datos);
        
   return ($datos);

}


function ValidarDni($dni)
{
    $letra = substr($dni, -1);
    $numbers = substr($dni, 0, -1);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letra && strlen($letra) == 1 && strlen ($numbers) == 8 ){
    
        $dni="";
    
    }else
    {
        $dni = "El dni no es válido";
    
    }
    return $dni;
    
}

function ValidarEmail($mail)
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
    {
        $mail = "";
    }else{
        $mail = "El mail no válido";
    }
    //return (false !== filter_var($mail, FILTER_VALIDATE_EMAIL));
    return $mail;
}

function ValidarIngresos($dato)
{
    if ($dato<=0)
    {
        $correcto = "Los ingresos han de ser positivos";
    }
    else
    {
        $correcto = "";
    }
    return ($correcto);
}

function CalcularRenta($ingresos)
{
    switch ($ingresos)
    {
        case ($ingresos<10000): $resultado = $ingresos*5/100;
        break;
        case ($ingresos<20000): $resultado = $ingresos*15/100;
        break;
        case ($ingresos<35000): $resultado = $ingresos*20/100;
        break;
        case ($ingresos<20000): $resultado = $ingresos*30/100;
        break;
        default: $resultado = $ingresos*45/100;
    }

    return $resultado;
    
    /*if(isset($_POST[$ong]))
    {
        $resultado = $resultado - ($resultado+2/100);
    }
    return ($resultado);*/
}

?>

<h1>Formulario Declaracion de la renta</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="comentario">Los campos con * son obligatorios</label><br><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" placeholder="Nombre">
    <span class="error"> * <?php echo $nombreErr;?></span><br><br>

    <label for="apellido1">Primer apellido:</label>
    <input type="text" name="apellido1" placeholder="Primer Apellido" >
    <span class="error"> * <?php echo $apellido1Err;?></span><br><br>

    <label for="apellido2">Segundo apellido:</label>
    <input type="text" name="apellido2" placeholder="Segundo Apellido" >
    <span class="error"> * <?php echo $apellido2Err;?></span><br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" placeholder="correo eletronico" >
    <span class="error"> * <?php echo $emailErr;?></span><br><br>

    <label for="dni">DNI:</label>
    <input type="text" name="dni" placeholder="Introduce DNI" >
    <span class="error"> * <?php echo $dniErr;?></span><br><br>

    <label for="ingresos">Ingresos brutos anuales:</label>
    <input type="number" name="ingresos" placeholder="Ingresos brutos anuales" >
    <span class="error"> * <?php echo $ingresosErr;?></span><br><br>

    <input type="checkbox" name="ong"><label for="ong">Quiero Donar a ONGs </label><br><br>

    <input type="submit" name="submit">

</form>

</body>
</html>