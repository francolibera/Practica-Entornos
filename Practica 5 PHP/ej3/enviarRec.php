<?php
$destino = $_POST['email_amigo'];
$asunto  = $_POST['nombre_remitente'] . " te recomienda este sitio";

$cuerpo = "
Hola!

" . $_POST['nombre_remitente'] . " te recomienda este sitio.

Visitalo en: www.recomendacion.com

";

$headers = "From: " . $_POST['email_remitente'];

mail($destino, $asunto, $cuerpo, $headers);
echo "La recomendación fue enviada a " . $_POST['email_amigo'];
?>