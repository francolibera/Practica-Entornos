<head>
<title>Modificacion</title>
</head>
<body>
<?php
include("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
die("No se pudo establecer la conexión con la base de datos.");
} 
// Captura datos desde el formulario
$vId         = $_POST['id'];
$vCiudad     = $_POST['ciudad'];
$vPais       = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vMetro      = $_POST['tieneMetro'];
 
// Arma y ejecuta el UPDATE
$vSql = "UPDATE Ciudades SET
            ciudad='$vCiudad',
            pais='$vPais',
            habitantes='$vHabitantes',
            superficie='$vSuperficie',
            tieneMetro='$vMetro'
         WHERE id='$vId'";
 
mysqli_query($link, $vSql) or die(mysqli_error($link));
 
echo "<p>La ciudad <strong>$vCiudad</strong> fue modificada correctamente.</p>";
echo "<a href='Menu.html'>Volver al Men&uacute;</a>";
 
// Cerrar la conexión
mysqli_close($link);
?>
</body>
</html>