<?php
$destinatario = "francoliberaca@gmail.com";
$asunto = "Prueba mail HTML";

$cuerpo = '
<html>
<head><title>Envio de mail</title></head>
<body>
    <h1>Hola!</h1>
    <p>
    Este es un correo enviado con <b>formato HTML</b> desde PHP.
    </p>
</body>
</html>
';


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: facundo <francoliberaca@gmail.com>\r\n";

mail($destinatario, $asunto, $cuerpo, $headers);
echo "Mail enviado correctamente";
?>