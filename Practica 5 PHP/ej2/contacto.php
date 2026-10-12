<?php
$fecha = date("d-m-Y");
$hora  = date("H:i:s");

$destino  = "francoliberaca@gmail.com";
$asunto   = "Comentario desde el formulario";
$desde    = "From: " . $_POST['email'];

$comentario = "
\n
Nombre: " . $_POST['nombre'] . "\n 
Email:   " . $_POST['email'] . " \n
Consulta: " . $_POST['texto'] . " \n
Enviado: $fecha a las $hora\n
\n
";

mail($destino, $asunto, $comentario, $desde);
echo "Su consulta fue enviada, En breve recibirá una respuesta.";
?>