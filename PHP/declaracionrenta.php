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


if(isset($_POST["submit"]))
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nombreErr = ValidarError($nombre);
        $apellido1Err = ValidarError($apellido1);
        $apellido2Err = ValidarError($apellido2);
        $dniErr = ValidarError($dni);
        $emailErr = ValidarError($email);
        $ingresosErr = VallidarError($ingresos);

        $nombre = ValidarInput($_POST["nombre"]);
        $apellido1 = ValidarInput($_POST["apellido1"]);
        $apellido2 = ValidarInput($_POST["apellido2"]);
        $dni = ValidarInput($_POST["dni"]);
        $email = ValidarInput($_POST["email"]);
        $ingresos = ValidarInput($_POST["ingresos"]);
        $ong = ValidarInput($_POST["ong"]);
    

    
    
        if ($nombreErr =="" && $apellido1Err =="" && $apellido2Err =="" && $emailErr =="" && $dniErr =="" && $ingresosErr == ""){
    
            $emailOk = ValidarEmail($email);
            $dniOk= ValidarDni($dni);
            $ingresosOk =true; //ValidarIngresos($ingresos);
    
            if ($emailErr && $dniOk && $ingresosOk==true)
            {
                $resultados = CalcularRenta($ingresos);
                echo "Tus datos son los siguientes: <br>";
                echo "<p>Nombre: ".$nombre."</p><br>";
                echo "<p>Apellidos: ".$apellido1." ".$apellido2."</p><br>";
                echo "<p>Dni: ".$dni."</p><br>";
                echo "<p>Correo electrónico: ".$email."</p><br>";
                echo "<p>Ingresos Brutos: ".$resultados." €</p><br>";
    
            } else
            {
                if( $dniOk==false)
                {
                    $dniErr = "El dni no es correcto";
    
                } 
            
                if ($emailOk==false)
                {
                    $emailErr = "El email no es correcto";
                }
    
                if ($ingresosOk==false) 
                {
                    $ingresosErr = "Los ingresos no son correctos";
                }
            }
            
            
    
            
        }

    }


}

function ValidarInput($datos){
    
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);        
     
    return ($datos);

}

function ValidarError ($datos)
{
    if ($datos == "")
    {
        $datos = "Este campo es obligatorio";

    }else
    {
        $datos="";
    }
    return ($datos);
}

function ValidarDni($dni)
{
    $letra = substr($dni, -1);
    $numbers = substr($dni, 0, -1);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letra && strlen($letra) == 1 && strlen ($numbers) == 8 ){
        
        return true;
    }
    return false;
}

function ValidarEmail($mail)
{
    return (false !== filter_var($mail, FILTER_VALIDATE_EMAIL));
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
    
    if(isset($_POST[$ong]))
    {
        $resultado = $resultado - ($resultado+2/100);
    }
    return ($resultado);
*/
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