<?php
  if(isset($_COOKIE['nombre']) && isset($_COOKIE['contraseña'])){
    echo "Nombre: " . $_COOKIE['nombre'] . "<br>";
    echo "Contraseña: " . $_COOKIE['contraseña'] . "<br>";
  }
  else{
    echo "No hay cookies guardadas.";
  }
?>
<a href="form.html">Volver</a>