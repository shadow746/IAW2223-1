<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 2</title>
</head>
<body>
    <?php
    //Ejercicio 1
    echo "<p><h1>Fecha y hora actual</h1></p>";
    date_default_timezone_set('Europe/Madrid');
   
    echo date('Dd/M/Y g:ia')."<br>";
    echo date('d/m/Y g:ia')."<br>";
    echo date('ld/F/Y g:ia')."<br>";
    
    //Ejercicio 2
//Uso de Switch
    echo "<p><h1>Uso de switch</h1></p>";

    $fecha=date('D/M/Y');
    $dia=substr($fecha,0,3);
    
    switch ($dia)
    {
        case 'Mon': echo "Lástima es lunes, ¡Ánimo!<br>";
        break;
        case 'Tue': echo "Hoy es martes un pasito mas hacia el viernes<br>";
        break;
        case 'Wed'; echo "Bueno estamos en la mitad de la jornada labora, ya queda menos<br>";
        break;
        case 'Thu': echo "Si tienes suerte hoy es juernes, sino tranquilo ya mañana<br>";
        break;
        case 'Fri': echo "Aleluya por fin es viernes<br>";
        break;
        case 'Sat': echo "Sábado sabadete camisa limpia....<br>";
        break;
        case 'Sun': echo "Domingo disfruta que mañana de nuevo al calvario<br>";
        break;
        default: echo "Algo ha fallado";
    }
    echo "<br>";

    //Ejercicio 3

//CUantos dias quedan para la feria

    echo "<p><h1>Los dias que quedan para la feria</h1></p>";

    $d1=strtotime("April 23");
    $d2=ceil(($d1-time())/60/60/23);
    echo "Quedan " . $d2 ." dias hasta la Feria !!! (23th of April).";

    /*date_default_timezone_get();

    setlocale(LCALL,"es_ES");
    echo date('l/F/Y g:ia')."<br>";*/

    /*Bucles*/

    //Ejercicio 4

    echo "<p><h1>Bucle While</h1></p>";
    $terminar=1;
    echo "<table>";
    while ($terminar<11) {
        echo "<tr><td>".$terminar."</td></tr>";
        $terminar++;
    }
    echo "</table>";

    //Ejercicio 5

    echo "<p><h1>Bucle For</h1></p>";
    echo "<table>";
    for ($i=1;$i<=10;$i++)
    {
        echo "<tr><td>".$i."</td></tr>";
    }
    echo "</table>";

    //Ejercicio 6

    echo "<p><h1>For each 1</h1></p>";
    $refranes = array("A quien madruga Dios ayuda", "Más vale pájaro en mano que 100 volando","Cuando el grajo vuela bajo hace un frio del carajo","Ante el vicio de pedir esta la virtud de no dar");
    foreach($refranes as $value){
        echo "<p>$value</p>";
    }

    //Ejercicio 7

    echo "<p><h1>For each 2</h1></p>";
    $palabras = array("hola"=>"hello","world"=>"mundo","amor"=>"love","vida"=>"life");
    foreach($palabras as $x=>$val){
        echo "<p>".$x." Su traduccion es ".$val."</p>";

    }
    /*print_r(array_count_values($palabras));
    echo "<br>";
    print_r(array_values($palabras));*/
    echo "<br>".count($palabras)." en español<br>";
    echo count($palabras)." en ingles<br>";
    echo (count($palabras)*2)." en total<br>";

    //Ejercicio 8

    //ORdenacion de arrays
    echo "<p><h1>Ordenacion</h1></b></p>";
    $diccionario=array("ala","bonita","casa","domingo","estadio");
    echo "<p><h3>Ascendente</h3></p>";
    sort($diccionario);
    foreach($diccionario as $value){
        echo "<p>$value</p>";
    }
    echo "<p><h3>Descendente</h3></p>";
    rsort($diccionario);
    foreach($diccionario as $value){
        echo "<p>$value</p>";
    }

    //Ejercicio 9

    echo "<p><h1>SUPER GLOBALES</h1></p>";
    echo $_SERVER['SERVER_ADDR'];
    echo "<br>";
    echo $_SERVER['HTTP_REFERER'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];

    /*No se muy bien ko que se pide. No se como es twiter no he entrado nunca
    no se como funciona.*/


    ?>
</body>
</html>