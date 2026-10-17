<body>
<html>
<head>
<title> Listados completo con PAGINACION </title>
</head>
<body>
<?php
include("conexion.inc");
if (!isset($link) || !($link instanceof mysqli)) {
  die("No se pudo establecer la conexión con la base de datos.");
} 
$cant_por_pag = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; 
if ($pagina < 1) $pagina = 1;
$inicio = ($pagina - 1) * $cant_por_pag;
 
// Total de registros
$vSql = "SELECT COUNT(id) as total FROM Ciudades";
$vRes = mysqli_query($link, $vSql) or die(mysqli_error($link));
$fila = mysqli_fetch_assoc($vRes);
$total_registros = $fila['total'];
 
$total_paginas = ceil($total_registros / $cant_por_pag);
 
echo "<p>Registros encontrados: <strong>$total_registros</strong> &mdash; ";
echo "Mostrando p&aacute;gina <strong>$pagina</strong> de <strong>$total_paginas</strong> ";
echo "($cant_por_pag por p&aacute;gina)</p>";
 
// Consulta con LIMIT
$vSql = "SELECT * FROM Ciudades ORDER BY ciudad ASC LIMIT $inicio, $cant_por_pag";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
?>
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>Pa&iacute;s</th>
            <th>Habitantes</th>
            <th>Superficie (km&sup2;)</th>
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
            <td><?php echo number_format($fila['tieneMetro']); ?></td>
        </tr>
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
    </table>
 
<?php if ($total_paginas > 1): ?>
    <div class="paginacion">
        <?php if ($pagina > 1): ?>
            <a href="listado_pag.php?pagina=<?php echo $pagina - 1; ?>">&laquo; Anterior</a>
        <?php endif; ?>
 
        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
            <?php if ($pagina == $i): ?>
                <span><?php echo $i; ?></span>
            <?php else: ?>
                <a href="listado_pag.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
 
        <?php if ($pagina < $total_paginas): ?>
            <a href="listado_pag.php?pagina=<?php echo $pagina + 1; ?>">Siguiente &raquo;</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
 
    <br>
    <p><a href="Menu.html">Volver al menu del ABM</a></p>
</body>
</html>