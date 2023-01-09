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
    //NO FUNCIONA SI USAMOS ENTER DENTRO DEL TEXTAREA
    //FUNCIONA PERFECTAMENTE SI SEPARAMOS CON ESPACIOS.

    if(isset($_POST["submit"])){
        
        $participantes = htmlspecialchars($_POST["participantes"]);
        $participantes = explode(" ",$participantes);
        //$participantes2 = explode(" ",$participantes);<?php echo strip_tags($participantes);
        //parse_str($participantes);        
        //$participantes2 = str_replace("<br />","<br>",$participantes);
        //var_dump($participantes);

        echo "Los participantes son: ";

        for ($j=0;$j<count($participantes);$j++)
        {
            echo $participantes[$j].", ";
        }

        echo "<br>";
        $premios = intval(htmlspecialchars($_POST["premios"]));

        for ($i=1;$i<=$premios;$i++)
        {
            $premiado = mt_rand(1,count($participantes));
    
            if ($premiado == 0)
            {
                echo "<p>Lo siento el premio ".$i." queda vacante.</p><br>";
            }else
            {
                echo "El premio ".$i." es para: ".$participantes[$premiado]."<br>";
            }
        }
    }
    ?>

</body>
</html>