<?php

session_start();
if (array_key_exists("id",$_COOKIE) && $_COOKIE['id'])
{
    $_SESSION["id"] = $_COOKIE['id'];

}
if (array_key_exists("id",$_SESSION) && $_SESSION['id'])
{
    include("conexion.php");
    $query = sprintf("SELECT * FROM incidencias");
    $resultado=mysqli_query($enlace,$query);
    $fila=mysqli_fetch_array($resultado);
    $planta = $fila['planta'];
    $aula = $fila ['aula'];
    $averia = $fila['descripcion'];
    $fecha_alta = $fila['fecha_alta'];
    $fecha_rev = $fila['fecha_revision'];
    $fecharesol = $fila['fecha_resolucion'];
    $comentario = $fila ['comentario'];


}else{
    header ("Location: index.php");
}
include ("header.php");
?>
<div class="container-fluid" id="contenedorSesionIniciada">
    <!--TENGO QUE MOSTRAR LAS AVERIAS ACTIVAS
    CON TRES ICONOS AL FINAL DE ELIMINAR-MODIFICAR-RESOLVER
    CAMPOS A MOSTRAR:
    PLANTA, AULA, DESCRIPCION_AVERIA, FECHA_ALTA, fECHA_REVISION, FECHA RESOLUCION, COMENTARIO
    ELIMINAR BORRA LA AVERIA ELIMINANDOLA DE LA TABLA
    MODIFICAR MODIFICA FECHA_REVISION, COMENTARIO Y DESCRIPCION EL RESTO NO SE PUEDE MODIFICAR
    RESOLVER PONE FECHA DE RESOLUCION A LA AVERIA-->
</div>