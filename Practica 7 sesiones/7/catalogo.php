<?php
session_start();
include("conexion.inc");

if(isset($_SESSION['carro']))
    $carro = $_SESSION['carro'];
else 
    $carro = false;

$qry = mysqli_query($link, "SELECT * FROM catalogo ORDER BY producto ASC");
?>
<html>
<head>
    <title>CATALOGO</title>
    <style type="text/css">
        .catalogo {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9px;
            color: #333333;
        }
    </style>
</head>
<body>
<table width="272" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;">
    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo">
        <td width="170"><strong>Producto</strong></td>
        <td width="77"><strong>Precio</strong></td>
        <td width="25" align="right">
            <a href="vercarrito.php" title="Ver el contenido del carrito">Ver Carrito</a>
        </td>
    </tr>
    <?php while($row = mysqli_fetch_assoc($qry)){ ?>
    <tr valign="middle" class="catalogo">
        <td><?php echo $row['producto']; ?></td>
        <td><?php echo $row['precio']; ?></td>
        <td align="center">
            <?php if(!$carro || !isset($carro[md5($row['id'])]['identificador']) || $carro[md5($row['id'])]['identificador'] != md5($row['id'])){ ?>
                <a href="agregarcar.php?id=<?php echo $row['id']; ?>">Agregar</a>
            <?php } else { ?>
                <a href="borrarcar.php?id=<?php echo $row['id']; ?>">Quitar</a>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>