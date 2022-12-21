<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteo</title>
</head>
<body>
    <p><h1>Sorteos La Tombolita!!!</h1></p>
    <p>Introduce los participantes al sorteo:</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <textarea name="participantes"  cols="30" rows="10"></textarea><br><br>
        <label for="premios"></label>
        <input type="text" name="premios" placeholder="Nº de premios">
        <input type="submit" name="submit" value="Sortear">
    </form>
    <?php

    if(isset($_POST["submit"])){

        //$participantes = file_get_contents("php://textarea");
        
        $participantes = htmlspecialchars($_POST["participantes"]);
        $participantes = explode(" ",$participantes);
        //$participantes2 = explode(" ",$participantes);<?php echo strip_tags($participantes);
        //parse_str($participantes);        
        //$participantes2 = str_replace("\n",$participantes);
        //var_dump($participantes);
        //echo $participantes2;
        $premios = intval(htmlspecialchars($_POST["premios"]));
        
        for ($i=1;$i<=$premios;$i++)
        {
            $premiado = mt_rand(1,count($participantes));
            //echo count($participantes);
            echo $premiado;
            if ($premiado == 0)
            {
                echo "<p>Lo siento el premio ".$i." queda vacante.</p>";
            }else
            {
                echo "El premio ".$i." es para: ".$participantes($premiado);
            }
        }
    }
    ?>

</body>
</html>