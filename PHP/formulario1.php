<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Usuario</title>
</head>
<body>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="usuario">Dime nombre de usuario</label>
    <input type="text" name="usuario" method="post"><br><br>
    <label for="passwd">Dime la contraseña</label>
    <input type="password" name="passwd" method="post"><br><br>
    <input type="submit" name="submit"><br><br>
</form>  
<?php
if (isset($_POST["submit"])){
    $usuario = htmlspecialchars($_POST["usuario"]);
    $passwd = htmlspecialchars($_POST["passwd"]);
    $usu = "admin";
    $pass = "H4CK3R4$1R";
    if (!strcmp($usuario,$usu) && !strcmp($passwd,$pass))
    {
        echo "Usuario y contraseña correctos. Acceso concedido";
    }else {
        echo "Usuario y/o contraseñas incorrectos. No tiene acceso";
    }
}
?> 
</body>
</html>