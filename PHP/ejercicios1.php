<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 1</title>
</head>
<body>
<?php

    $cadena = "Esto es mi variable de tipo cadena";
    $a = 10;
    $b = 6;
    //Operaciones matematicas basicas
    echo "<p><h1>Operaciones Matemáticas Basicas</h1></p>";
    echo "<p>suma x+y=" .   $a+$b . "</p><br>";
    echo "<p>resta x-y=" .   $a-$b . "</p><br>";
    echo "<p>multiplicar x*y=" .   $a*$b . "</p><br>";
    echo "<p>dividir x/y=" .   $a/$b . "</p><br>";
    echo "<p>El resto de division x%y (10/6)= " . $a%$b . "</p>";

    //Tipos de datos uso de var_dump
    $tipos = array(1,2,3, array("hola","casa","a"),4.5);
    $logica = true;
    echo "<p><h1>Diferentes tipos de datos en PHP con funcion var_dump()</h1></p>";
    echo var_dump($tipos,$logica);

    //Manejo de cadenas
    echo "<p><h1>Manejo de Cadenas</h1></p>";
    $long = strlen($cadena);
    $numpal = str_word_count($cadena);
    $reves = strrev($cadena);
    $esta = strpos($cadena, "Esta");
    $noesta = strpos($cadena, "Sevilla");
    $cadena2 = str_replace("cadena", "string", $cadena);

    echo "<p>Esta es mi cadena: " . $cadena . "</p>";
    echo "<p>La longitud de la cadena es: " . $long . "</p>";
    echo "<p>El numero de palabras de la cadena es: "  . $numpal . "</p>";
    echo "<p>La cadena invertida es: " . $reves . "</p>";
    if($esta!==0)
    {
        echo "<p>La palabra Esta esta en la cadena</p>";
    }else
    {
        echo "<p>La palabra Esta no esta en la cadena</p>";
    }

    if($noesta===FALSE)
    {
        echo "<p>La palabra Sevilla no esta en la cadena</p>";
    }else
    {
        echo "<p>La palabra Sevilla esta en la cadena</p>";
    }
    echo "<p>Sustituimos cadena por string: " . $cadena2 . "</p>";

    //Ejemplo de variable Globales
   echo "<p><h1>Crear un cuadrado random</h1></p>";
    $r = mt_rand(0, 255 );
    $g = mt_rand(0, 255 );
    $b = mt_rand(0, 255 );
   echo "

   <style>
   #figura {
       width: 300px;
       height: 300px;
       background: rgb(".$r.",".$g.",".$b.");
   }
   div {margin-bottom:20px;}
   </style>
   <div id=figura></div>";

   //Mostra emoticones aleatorios
   echo "<p><h1>Mostrar emoticones</h1></p>";
   $emoji=mt_rand(128512,128586);
   echo "<p>&#".$emoji."</p>";


   //USO DE VBLES GLOBALES

    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    echo $_SERVER['HTTP_REFERER'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];

   //IMuestra aleatoriamente imagenes que estan en el servidor
echo "<br><br><br>";
$directorio_imagenes = '/imagenes/'; //indico el directorio de las imagenes
$ruta_imagenes= $_SERVER['DOCUMENT_ROOT'].$directorio_imagenes; //establezco la ruta de las imagenes
//uso la vble gobal que me da la ruta de la carpeta root y le añado donde estan las imagenes
// /var/www/html y añado /imagenes/
$imagenes = array();//creo el array donde van a guardarse las imagenes

//abro la ruta de las imagenes (opendir) y leo el directorio (readdir)
//siempre que el file no sea . o .. añado el nombre al array de imagenes
if ($gestor = opendir($ruta_imagenes)){
    while (false != ($file = readdir($gestor))){
        if ($file != "." && $file !=".."){
            $imagenes[] = $directorio_imagenes.$file;
        
        }
    }
    closedir($gestor);//cierro el directorio
}
// si hay imagenes cacula ua random y muestra la que corresponde
if (!empty($imagenes)){
    $posicion = rand(0,count($imagenes)-1);
    $src = $imagenes[$posicion];
    echo "<img src='".$src."' alt='absmiddle'>";
} else {
    echo "No hay imagenes";
}


/*
$posicion = rand(o,count($imagenes)-1);
 /* extensiones a mostrar
$extensions = array('jpg','jpeg','gif','png','bmp');

// nombre del directorio
$nombre_directorio_imagenes = "/imagenes/";

// ruta del directorio
$ruta_directorio_imagenes = $_SERVER['DOCUMENT_ROOT'].$nombre_directorio_imagenes;

// url del directorio
$url_directorio = 'http://'.$_SERVER["SERVER_NAME"].$nombre_directorio_imagenes;
echo $url_directorio;
// array de imagenes
$images = array();
$posicion=random_int(0,count($images));

//srand((float) microtime() * 10000000); // Si es PHP Version < 4.2.0

// abrimos directorio y mostramos imagenes
if ($handle = opendir($ruta_directorio_imagenes)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {

	  // obtener extension del archivo
	  $ext = strtolower(substr(strrchr($file, "."), 1));
		
          // almacenamos en el array
	  if(in_array($ext, $extensions)){
	    $images[] = $url_directorio.$file;
	  }
        }
    }
    closedir($handle);
}
//echo $images[0];
if(!empty($images)){ // si tenemos algo que mostrar...
	$rand_pos = array_rand($images, 1);
	$src = $images[$rand_pos];
	echo "<img src='".$src."' align='absmiddle'>";

	// mostrar una segunda imagen diferente a la primera
	unset($images[$rand_pos]);
	$rand_pos = array_rand($images, 1);
	$src = $images[$rand_pos];
	echo "<br /><br /><img src='".$src."' align='absmiddle'>";
}else{
	// nada que mostrar
	echo 'No se encontraron imagenes en <strong>'.$ruta_directorio_imagenes.'</strong>';
}

/*Mostra imagenes forma facil
$fotos = array('bloqueo 48h.png','bloqueo csv.png','crear usuarios.png');
$posicion = rand(0,count($fotos)-1);
$ruta = '/var/www/html/imagenes/';
echo "<img src='".$ruta."fotos(".$posicion.")."'>"; **/


?>
</body>
</html>

