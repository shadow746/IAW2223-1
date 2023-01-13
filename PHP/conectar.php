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
    echo "Conexion con exito.";
    $query = "SELECT * FROM usuarios where username='rauldedie'";
    $resultado = mysqli_query($enlace,$query);
    if($resultado)
    {
        $fila = mysqli_fecth_array ($resultado);
        print_r($fila);
        print ($fila);
    }
    mysqli_close($enlace);
}


?>