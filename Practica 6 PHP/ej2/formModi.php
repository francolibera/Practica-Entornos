<html>
<head>
<title>Modificacion</title>
<meta charset="UTF-8">
</head>
<body>
<?php
include ("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
  die("No se pudo establecer la conexión con la base de datos.");
} 
$vId = $_POST['id'];

$vSql = "SELECT * FROM Ciudades WHERE id ='$vId' ";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));

if(mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<A href='formModiIni.html'>Continuar</A>");
} else {
    $fila = mysqli_fetch_array($vResultado);
?>
<FORM action="modi.php" method="POST" name="formModi">
<input type="hidden" name="id" value="<?php echo($fila['id']); ?>">
<table width="356">
<tr>
    <td width="103"> Ciudad: </td>
    <td width="243"> <input type="text" name="Ciudad" value="<?php echo($fila['ciudad']); ?>"> </td>
</tr>
<tr>
    <td width="103"> Pais: </td>
    <td width="243"> <input type="text" name="Pais" size="20" maxlength="8" value="<?php echo($fila['pais']); ?>"> </td>
</tr>
<tr>
    <td width="103"> Habitantes: </td>
    <td width="243"> <input type="NUMBER" name="Habitantes" size="20" maxlength="20" value="<?php echo($fila['habitantes']); ?>"> </td>
</tr>
<tr>
    <td width="103"> Superficie: </td>
    <td width="243"> <input type="TEXT" name="Superficie" size="20" maxlength="40" value="<?php echo($fila['superficie']); ?>"> </td>
</tr>
<tr>
    <td width="103"> Tiene Metro: </td>
    <td width="243"> <input TYPE="NUMBER" name="TieneMetro" size="20" maxlength="40" value="<?php echo($fila['tieneMetro']); ?>"> </td>
</tr>
<tr>
    <td colspan="2" align="center"> <input type="SUBMIT" name="Submit" value="Modificar"> </td>
</tr>
</table>
</FORM>
<?php
}

mysqli_free_result($vResultado);
mysqli_close($link);
?>
</body>
</html>