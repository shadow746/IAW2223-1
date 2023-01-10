<?php
function comprobar_email($email) {
    return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

if (isset($_POST['recibir'])) {
    if (comprobar_email($_POST['email'])) {
        require_once("classes/class.phpmailer.php");
        $mail = new PHPMailer();
        $mail->From = "from@domain.com";
        $mail->FromName = "Jose Aguilar";
        $mail->Subject = "Demo de PHPMailer";
        $mail->Body = "Hola, esto es una demo de envio de emails con archivos adjuntos!!!";
        $mail->AddAddress($_POST['email'], "User Name");
        $archivo = 'prueba.pdf';//COMO PODER ELEGIR CUALQUIER ARCHVO
        $mail->AddAttachment($archivo,$archivo);
        $mail->Send();
        echo '<p>Se ha enviado correctamente el email a '.$_POST['email'].'!</p>';
    }
    else {
        echo '<p>El email introducido no es correcto!</p>';
    }
}
?>