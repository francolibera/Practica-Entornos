<html>
<head>
<title> Listados completo </title>
</head>
<body>
<?php
include("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
  die("No se pudo establecer la conexión con la base de datos.");
} 
$vSql = "SELECT * FROM Ciudades ORDER BY ciudad ASC";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$total = mysqli_num_rows($vResultado);
 
echo "<p>Total de ciudades: <strong>$total</strong></p>";
?>
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>Pa&iacute;s</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
        </tr>
<?php
while ($fila = mysqli_fetch_array($vResultado)) {
    $metro = ($fila['tieneMetro'] == 1)
        ? '<span class="metro-si">S&iacute;</span>'
        : '<span class="metro-no">No</span>';
?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['pais']; ?></td>
            <td><?php echo number_format($fila['habitantes']); ?></td>
            <td><?php echo number_format($fila['superficie'], 2); ?></td>
            <td><?php echo $metro; ?></td>
        </tr>
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
    </table>
    <br>
    <p><a href="Menu.html">Volver al menu del ABM</a></p>
</body>
</html>