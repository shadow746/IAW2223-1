<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores Numer9cos</title>
</head>
<body>
<?php
    $a = 10;
    $b = 6;
    $cadena = "Esto es mi variable de tipo cadena";

    //Operaciones matematicas basicas
    echo "<p><h1>Operaciones Matemáticas Basicas</h1></p>";
    echo "<p>suma x+y=" .   $a+$b . "</p><br>";
    echo "<p>resta x-y=" .   $a-$b . "</p><br>";
    echo "<p>multiplicar x*y=" .   $a*$b . "</p><br>";
    echo "<p>dividir x/y=" .   $a/$b . "</p><br>";
    echo "<p>El resto de division x%y (10/6)= " . $a%$b . "</p>";

    //Tipos de datos
    $tipos = array(1,2,3, array("hola","casa","a"),4.5);
    $logica = true;
    echo "<p><h1>Diferentes tipos de datos en PHP con funcion var_dump()</h1></p>";
    echo var_dump($tipos,$logica);

    //Manejo de cadenas
    echo "<p><h1>Manejo de Cadenas</h1></p>";
    $long = strlen($cadena);
    $numpal = str_word_count($cadena);
    $reves = strrev($cadena);
    $esta = strpos($cadena, "tipo");
    $noesta = strpos($cadena, "Sevilla");
    $cadena2 = str_replace("cadena", "string", $cadena);

    echo "<p>Esta es mi cadena: " . $cadena . "</p>";
    echo "<p>La longitud de la cadena es: " . $long . "</p>";
    echo "<p>El numero de palabras de la cadena es: "  . $numpal . "</p>";
    echo "<p>La cadena invertida es: " . $reves . "</p>";
    if($esta!=FALSE)
    {
        echo "<p>La palabra tipo esta en la cadena</p>";
    }else
    {
        echo "<p>La palabra tipo no esta en la cadena</p>";
    }

    if($noesta==FALSE)
    {
        echo "<p>La palabra Sevilla no esta en la cadena</p>";
    }else
    {
        echo "<p>La palabra Sevilla esta en la cadena</p>";
    }
    echo "<p>Sustituimos cadena por string: " . $cadena2 . "</p>";

    //Ejemplo de variable Globales
    <p><h1></h1></p>
    


?>
</body>
</html>

