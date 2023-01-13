<?php
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
    echo "Conexion con exito.<br>";
    $query = "SELECT username FROM usuarios;";
    $resultado = mysqli_query($enlace,$query);
    
    //echo "<b>Usuario    </b> <b>Contraseña</b><br>";
    while($resultado)
    {
        $fila = mysqli_fetch_array ($resultado);
        echo "$fila[username]   $fila[password]<br>";
        $cont=$cont+1;
    }
    echo "En total tengo: ".$cont." eltos";
    mysqli_close($enlace);
}


?>