<html>
<head>
<title>Baja</title>
</head>
<body>
<?php
include ("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
  die("No se pudo establecer la conexión con la base de datos.");
}
$vId = $_POST ['id'];
$vSql = "SELECT * FROM Ciudades WHERE id='$vId' ";
$vResultado = mysqli_query($link, $vSql);
if(mysqli_num_rows($vResultado) == 0)
 {
 echo ("Ciudad Inexistente...!!! <br>");
 echo ("<A href='FormBajaIni.html'>Continuar</A>");
}
else{
//Arma la instrucción SQL y luego la ejecuta
$vSql= "DELETE FROM Ciudades WHERE id = '$vId' ";
mysqli_query($link, $vSql);
 echo("La Ciudad fue Borrada<br>");
 echo("<A href='menu.html'>Volver al Menu del ABM</A>");
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>