<?php session_start(); ?>
<html>
<body>
<?php
if (isset($_SESSION['usuario'])) {
    echo "Bienvenido " . $_SESSION['usuario'];
} else {
    echo "No tiene permitido visitar esta página.";
}
session_destroy();
?>
</body>
</html>