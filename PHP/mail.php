<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Vamos a enviar un mail</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <label for="destinatario">Dime el destinatario: </label>
    <input type="email" name ="destinatario" placeholder="Email destinatario"> <br><br>

    <label for="asunto">Dime el asunto: </label>
    <input type="text" name ="asunto" placeholder="Asunto"> <br><br>

    <label for="mensaje">Escribe el texto del mensaje: </label> <br>
    <textarea name="mensaje" cols="30" rows="10"></textarea> <br><br>

    <input type="submit" name="submit">

</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    $cabecera = "From: Recordatorio <cumples@example.com>" . "\r\n";
    $correo = test_input($_POST["email"]);
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
    {
        $emailErr = "Invalid email format";
    }else
    {
        mail($correo,$asunto,$mensaje,$cabecera);
    }
}
?>
</body>
</html>