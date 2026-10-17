<?php
session_start();

$id = $_GET['id'];
$carro = $_SESSION['carro'];

unset($carro[md5($id)]);

$_SESSION['carro'] = $carro;

header("Location: catalogo.php");
?>