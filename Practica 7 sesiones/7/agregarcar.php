<?php
session_start();
include("conexion.inc");

$id = $_GET['id'];

if(!isset($cantidad)){ $cantidad = 1; }

$qry = mysqli_query($link, "SELECT * FROM catalogo WHERE id='".$id."'");
$row = mysqli_fetch_array($qry);

if(isset($_SESSION['carro']))
    $carro = $_SESSION['carro'];

$carro[md5($id)] = array(
    'identificador' => md5($id),
    'cantidad'      => $cantidad,
    'producto'      => $row['producto'],
    'precio'        => $row['precio'],
    'id'            => $id
);

$_SESSION['carro'] = $carro;

header("Location: catalogo.php");
?>