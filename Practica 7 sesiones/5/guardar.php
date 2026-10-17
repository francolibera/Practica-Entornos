<?php
  $nombre = $_POST['nombre'];
    $contraseña = $_POST['contra'];
    setcookie("nombre", $nombre, time() + 3600*24*365);
    setcookie("contraseña", $contraseña, time() + 3600*24*365);
    header("Location: mostrar.php");
    exit();
?>