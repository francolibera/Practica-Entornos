<html>
<head>
<title>Alta Usuario</title>
</head>
<body>
<?php
include("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
  die("No se pudo establecer la conexión con la base de datos.");
}
//Captura datos desde el Form anterior
$vCiudad     = $_POST['ciudad'];
$vPais       = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vMetro      = $_POST['tieneMetro'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT COUNT(id) as canti FROM Ciudades WHERE ciudad='$vCiudad' AND pais='$vPais'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$vCant = mysqli_fetch_assoc($vResultado);
//$vCantUsuarios = mysqli_result($vResultado, 0);
if ($vCant ['canti']!=0){
 echo ("La Ciudad ya Existe<br>");
 echo ("<A href='menu.html'>VOLVER AL ABM</A>");
}
else {
  //Arma la instrucción SQL y luego la ejecuta
$vSql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
values ('$vCiudad', '$vPais', '$vHabitantes', '$vSuperficie', '$vMetro')";
 mysqli_query($link, $vSql) or die (mysqli_error($link));
 echo("La Ciudad fue Registrada, Pronto recibirás un email, confirmandote la actualizaciòn a
nuestra pagina<br>");
 echo ("<A href='menu.html'>VOLVER AL MENU</A>");
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
}
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>