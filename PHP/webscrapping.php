<?php

$data = file_get_contents("https://www.marca.com");
if ( preg_match("/<a href='mailto:'>"."</a>/i" , $data , $cap ) )
//<a href="mailto:ejmplo@ejmplo.com">Enviar mail</a>
{
    echo "Resultado".$cap[1];
}

$dom = new DOMDocument();
@$dom->loadHTML($data);

$mails = $dom->getElementsByTagName( 'a' );

foreach( $mails as $mail ){
    //si encontramos href nos qudamos con su valor
    if( $mail->getAttribute( 'href' ) === 'mailto' ){
        $correo = $mail->nodeValue;
    }
  }
echo "resultado: ".$correo."<br>";
?>

