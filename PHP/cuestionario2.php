<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario personal</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<?php
/*Como hacer que el resultado salga debajo del formulario?*/
$inputerror = file_get_contents("php://span");
$inputdata = file_get_contents("php://input");

parse_str($inputdata);
parse_str($inputerror);

if(isset($_POST["submit"]))
{
    $nombreErr = ValidarInput($nombre);
    $apellido1Err = ValidarInput($apellido1);
    $apellido2Err = ValidarInput($apellido2);
    $ccaaErr = ValidarInput($ccaa);
    $fechaErr = ValidarInput($fecha);
    $generoErr = ValidarInput($genero);
    

    if ($comentario !="")
    {
        $comentario = ValidarInput($comentario);
    } 

    if ($nombreErr =="" && $apellido1Err=="" && $apellido2Err=="" && $ccaaErr=="" && $fechaErr=="" && $generoErr=="")
    {
       $fecha = FechaEsp($fecha);
       echo "Tus datos son los siguientes: <br>";
       echo "<p>Nombre: ".$nombre."</p><br>";
       echo "<p>Apellidos: ".$apellido1." ".$apellido2."</p><br>";
       echo "<p>Genero: ".$genero."</p><br>";
       echo "<p>Fecha de Nacimiento: ".$fecha."</p><br>";
       echo "<p>Región origen: ".$ccaa."</p><br>";
       echo "<p>Descripcion: ".$comentario."</p><br>";
    } 

}

function ValidarInput($datos){

    if ($datos == "")
    {
        $datos = "Este campo es obligatorio";

    }else 
    {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        $datos = "";
        
    } 
    return ($datos);

}

function FechaEsp ($fecha)
{
    echo $fecha;
    $year = substr($fecha,0,4);
    $centuria = substr($fecha,2,2);
    $correccion = substr($fecha,0,2);
    $mes = substr($fecha,5,2);
    $m= 2.6*($mes+1);
    $dia = substr($fecha,-2);
    $diasemana = ($dia+floor($m)+$centuria+floor(($centuria)/4)+floor($correccion/4)-2*$correccion)%7;

    $diassemana = array("Sábado","Domingo","Lunes","Martes","Miercoles","Jueves","Viernes");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    echo "<br>";

    $fecha = $diassemana[$diasemana]." ".$dia." de ".$meses[$mes-1]. " del ".$year;
    return ($fecha);
}

?>

<h1>Formulario Personal</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="comentario">Los campos con * son obligatorios</label><br><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" placeholder="Nombre">
    <span class="error"> * <?php echo $nombreErr;?></span><br><br>

    <label for="apellido1">Primer apellido:</label>
    <input type="text" name="apellido1" placeholder="Primer Apellido" >
    <span class="error"> * <?php echo $apellido1Err;?></span><br><br>

    <label for="apellido2">Segundo apellido:</label>
    <input type="text" name="apellido2"placeholder="Segundo Apellido" >
    <span class="error"> * <?php echo $apellido2Err;?></span><br><br>

    <label for="ccaa">Comunidad Autonoma:</label>
    <select name="ccaa" >
        <option value="Andalucia">Andalucía</option>
        <option value="Aragón">Aragón</option>
        <option value="Asturias">Asturias</option>
        <option value="Cantabria">Cantabria</option> 
        <option value="Castilla León">Castilla León</option>
        <option value="Castilla La Mancha">Castilla La Mancha</option>
        <option value="Cataluña">Cataluña</option>
        <option value="Ceuta">Ceuta</option>
        <option value="Comunidad Valenciana">Comunidad Valenciana</option>
        <option value="Extremadura">Extremadura</option>
        <option value="Galicia">Galicia</option>
        <option value="Islas Baleares">Islas Baleares</option>
        <option value="Islas Canarias">Islas Canarias</option>
        <option value="La Rioja">La Rioja</option>
        <option value="Madrid">Madrid</option>
        <option value="Melilla">Melilla</option>
        <option value="Murcia">Murcia</option>
        <option value="País Vasco">Pais Vasco</option>        
               
    </select><span class="error"> * <?php echo $ccaaErr;?></span><br><br>

    <textarea name="comentario" cols="30" rows="10"></textarea><br><br>

    <label for="genero">Elije tu género: </label>
    <input type="radio" name="genero" value="femenino">Femenino
    <input type="radio" name="genero" value="masculino">Masculino
    <input type="radio" name="genero" value="otro">Otro 
    <span class="error">* <?php echo $generoErr;?></span><br><br>

    <input type="date" name="fecha"><span class="error"> * <?php echo $fechaErr;?></span><br><br>

    <input type="submit" name="submit">

</form>
   

</body>
</html>
