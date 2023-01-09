<?php
if ($_POST)
{
    $participantes = htmlspecialchars($_POST["participantes"]);
    $numeropremios = htmlspecialchars($_POST["numeropremios"]);
    if (is_numeric($numeropremios) && $numeropremios>=1 && round($numeropremios,0)==$numeropremios)
    {      
        print_r($participantes);
        
        $agraciados = explode("\n", $participantes);
        if ($numeropremios<sizeof($agraciados))
        {
            $premios = array_rand($agraciados,$numeropremios);
            if (is_array($premios))
            {
                for ($indice=0;$indice<sizeof($premios);$indice++)
                {
                    $premio = $premios[$indice];
                    echo "<p>$agraciados[$premio] ha sido premiado/a</p>";
                }
            }else
            {
                $premiado = rand(0, sizeof($agraciados)-1);
                echo "<p>$agraciados[$premiado] ha sido premiado/a</p>";
            }
        }else
        {
            echo "<p>Hay más premios que participantes</p>";
        }
                    
           
    }
    else 
    {
        echo "<p>Debe introducir un número positivo mayor que 1</p>";
    }
}
?>