<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buscador de Canciones</title>
</head>
<body>
<?php
include("conexion.inc");

$pal = $_POST['Palabra'];

if ($pal) {
    $resp = mysqli_query($link, "SELECT * FROM buscador WHERE canciones LIKE '%".$pal."%'") or die(mysqli_error($link));

    if (mysqli_num_rows($resp) == 0) {
        echo "No hay resultados respecto a la palabra que busca.";
    } else {
        echo "<center><strong>RESULTADOS DE BUSQUEDA</strong></center><br>";
        while ($cat = mysqli_fetch_array($resp)) { ?>
            <tr>
                <td><?php echo ($cat['canciones']); ?></td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
        <?php }
    }
} else {
    echo "<form name='FormBuscador' method='post' action=''>
            <input name='Palabra' type='text' id='Palabra'>
            <input type='submit' name='Submit' value='Buscar!'>
          </form>";
}
?>
</body>
</html>