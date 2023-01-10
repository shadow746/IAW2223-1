<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar un mail</title>
</head>
<body>
<h1>Vamos a enviar un mail</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="destinatario">Dime el destinatario: </label>
    <input type="text" name ="destinatario" placeholder="Email destinatario"> <br><br>
    <label for="texto">Escribe el texto del mensaje: </label> <br>
    <textarea name="texto" cols="30" rows="10"></textarea> <br><br>
    <input type="submit" name="submit">
</form>  
<?php
if(isset($_POST["submit"]))
{
    $destinatario = $_POST["destinatario"];
    $mensaje = $_POST["texto"];
    mail($destinatario,"Importante","papichulo",$mensaje);
}
?>
</body>
</html>