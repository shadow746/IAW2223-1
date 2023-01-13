<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de alta</title>
</head>
<body>
<H1>ALTA NUEVO USUARIO</H1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="usuario">Dime nombre de usuario</label>
    <input type="text" name="usuario"><br><br>
    <label for="passwd">Dime la contraseña</label>
    <input type="password" name="passwd"><br><br>
    <label for="nombre">Dime nombre de usuario</label>
    <input type="text" name="nombre"><br><br>
    <label for="mail">Dime correo electrónico</label>
    <input type="email" name="mail"><br><br>
    <label for="submit">Pincha en Enviar </label>
    <input type="submit" name="submit"><br><br>
</form>
<?php
header("content-type:text/html;charset=utf-8");
if (isset($_POST["submit"]))
{

    if (empty(htmlspecialchars($_POST["usuario"])))
    {
        echo "El campo usuario es obligatorio";
        
    }else if (empty(htmlspecialchars($_POST["passwd"])))
        {
            echo "El campo contraseña es obligatorio";
            
        }else if (empty(htmlspecialchars($_POST["mail"])))
            {
                echo "El campo correo electrónico es obligatorio";
                
            }else if (empty(htmlspecialchars($_POST["nombre"])))
                {
                    echo "Es obligatorio indicar nombre completo";
                     
                }else
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
                        //HABRIA QUE CONTROLAR LA ENTRADA 
                
                        $nuevousu = mysqli_real_escape_string($enlace,$_POST["usuario"]);
                        $nuevopass = mysqli_real_escape_string($enlace,$_POST["passwd"]);
                        $nuevomail = mysqli_real_escape_string($enlace,$_POST["mail"]);
                        $nuevonombre = mysqli_real_escape_string($enlace,$_POST["nombre"]);
                        
                        echo "Quieres dar de alta al usuario: ".$nuevousu." ".$nuevopass." ".$nuevomail." ".$nuevonombre;
                        //Vemos si ya existe
                
                        $query = sprintf("SELECT * FROM usuarios WHERE username='%s'",$nuevousu);
                        $resultado = mysqli_query($enlace,$query);
                
                        if ($resultado)
                        {
                            $fila = mysqli_fetch_array ($resultado);
                            echo "<br>";
                            echo $fila["username"];
                            
                            if ($fila ["username"]==$nuevousu)
                            {
                                echo "Lo siento el usuario ".$fila["username"]." ya existe, elige otro";
                            }else
                            {
                                //hago el insert
                                $queryinsert = sprintf("INSERT INTO usuarios (id,username,password,fullname,mail) values ('','%s','%s','%s','%s')",$nuevousu,$nuevopass,$nuevonombre,$nuevomail); 
                                $resultadoinsert = mysqli_query($enlace,$queryinsert);

                                if ($resultadoinsert)
                                {
                                    echo "Te has dado de alta correcctamente.";
                            
                                }else
                                {
                                    echo "Lo siento, ha ocurrido un error en el proceso de alta<br>" . mysqli_error($enlace);
                                } 
                            }
                            //FALTA ENVIAR CORREO
                        }    
                        mysqli_close($enlace); 
                    }
                }
}

?>
</body>
</html>