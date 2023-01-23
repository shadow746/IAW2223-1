<?php
    $error="";
    if (array_key_exist("submit",$_POST))
    {
        if(!$_POST["usuario"])
        {
            $error.="<br>El usuario es requerido.";
        }
        if(!$_POST["password"])
        {
            $error.="<br>El password es requerido.";
        }
        if ($error!="")
        {
            $error="<p>Hubo algun/os error/es en el formulario".$error."</p>"
        }
    }
?>
<div id="error">
    <?php
        echo $error;
    ?>

</div>
<form method="POST">
    <input type="text" name="usuario" placeholder="Tu nombre de usuario">
    <input type="password" name="password" placeholder ="Password">
    <input type="checkbox" name="sesioniniciada" value=1>
    <input type="submit" name="submit" value="Login">

</form>