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
    echo "<p><h1>Fecha y hora actual</h1></p>";
    date_default_timezone_set('Europe/Madrid');
   
    echo date('Dd/M/Y g:ia')."<br>";
    echo date('d/m/Y g:ia')."<br>";
    echo date('ld/F/Y g:ia')."<br>";
    
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

//CUantos dias quedan para la feria

    echo "<p><h1>Los dias que quedan para la feria</h1></p>";

    $d1=strtotime("April 23");
    $d2=ceil(($d1-time())/60/60/23);
    echo "Quedan " . $d2 ." dias hasta la Feria !!! (23th of April).";

    /*date_default_timezone_get();

    setlocale(LCALL,"es_ES");
    echo date('l/F/Y g:ia')."<br>";*/


    ?>
</body>
</html>