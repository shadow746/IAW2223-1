<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo Basico</title>
</head>
<body>
<p><h1>Saludo Básico</h1></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="saludo">Dime tu nombre</label>
        <input type="text" name="nombre">
        <input type="submit">
    </form>

<?php
setlocale(LC_ALL,"es_ES");
$fecha = date("Dd-M-Y");
$fecha = strftime("%A, %d de %B del %Y");
echo "Welcome ".$_POST["nombre"]." hoy es ".$fecha;

//Esto es porque no funciona el setlocale
$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 echo "<br>";
$fecha = $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
echo "Welcome ".$_POST["nombre"]." hoy es ".$fecha;

?>
</body>
</html>

