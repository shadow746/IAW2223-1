<?php
//Contenido
$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$archivo = $_FILES['adjunto'];

//Hacemos la llamada del archivo para armar 
//y enviar el correo (este archivo lo podrás descargar al final).

require("archivosmail/class.phpmailer.php");//CREO QUE AQUI FALLA PQ TIENE QUE ESTAR INSTALADO EN SERVER
$mail = new PHPMailer();

//Establecemos los datos del correo como contacto, 
//además de la dirección que va a recibir los correos.

$mail->From     = $Email;
$mail->FromName = $Nombre;
$mail->AddAddress("mail@mail.com");

//Ahora enviamos el cuerpo del correo con el siguiente código.

$mail->WordWrap = 50; 
$mail->IsHTML(true);     
$mail->Subject  =  "Contacto";
$mail->Body     =  "Nombre: $Nombre \n<br />".    
"Email: $Email \n<br />".    
"Mensaje: $Mensaje \n<br />";
$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);

//Para hacer posible el envío de correos debemos de configurar 
//los datos SMTP de la cuenta de correo de salida.

$mail->IsSMTP(); 
$mail->Host = "ssl://smtp.gmail.com:465"; //Servidor de Salida.
$mail->SMTPAuth = true; 
$mail->Username = "rauldedie@gmail.com"; //Correo Electrónico
$mail->Password = "28741328e"; //Contraseña

//Por último, enviamos el corroe y al mismo tiempo validamos, si la salida fue exitosa o hubo algún error,
//en cualquiera de los casos se notifica al usuario mediante una alerta de JavaScript.

if ($mail->Send())
     echo "<script>alert('Formulario enviado exitosamente.');</script>";
else
     echo "<script>alert('Error al enviar el formulario');</script>";

?>