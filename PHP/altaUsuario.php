<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formuario alta de usuario</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="usuario">Dime nombre de usuario</label>
    <input type="text" name="usuario"><br><br>
    <label for="passwd">Dime la contraseña</label>
    <input type="password" name="passwd"><br><br>
    <input type="submit" name="submit">Dame de alta</input><br><br>
</form>  
<?php
/*NO SE SI LA FUNCION MSQLI_QUERY AVISA SI EL USUARIO EXISTE
IMAGINO QUE SI PERO COMO NO SE COMO LO HACE VEO A VER SI PUEDO CONTROLARLO YO*/

if (isset($_POST["submit"]))
{
    $servidor="sdb-53.hosting.stackcp.net";
    $usuario="rauldedie";
    $password="lince123";
    $bd="bdpruebas-353030355619";

    $enlace = mysqli_connect($servidor,$usuario,$password,$bd);

    if(!$enlace)
    {
        echo "Conexion fallida: ".mysqli_connect_error();

    }else
    {
        $nuevousu = htmlspecialchars($_POST["usuario"]);
        $nuevopass = htmlspecialchars($_POST["passwd"]);
        
        $query = "SELECT username FROM usuarios where username=$nuevousu;";
        $repetido = mysqli_query($enlace,$query);

        if ($repetido==$nuevousu)
        {
            echo "Lo siento el usuario ya existe";
        }else
        {
            $query = "insert into usuarios (id,username,password) values ('','".$nuevousu."','".$nuevopass."');";
            $resultado = mysqli_query($enlace,$query);
            if ($resultado)
            {
                echo "Te has dado de alta correcctamente.";
    
            }else
            {
                echo "Lo siento, ha ocurrido un error en el proceso de alta<br>" . mysqli_error($enlace);
            }         
        }
        mysqli_close($enlace);

    }
}


?> 
</body>
</html>