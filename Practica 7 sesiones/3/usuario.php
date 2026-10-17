<?php
if (isset($_POST['usuario']) && !empty($_POST['usuario'])) {
    setcookie("usuario", $_POST['usuario'], time() + 3600*24*365);
}
?>

<html>
<body>

    <?php 
    if (isset($_COOKIE['usuario'])){
        echo "<p>Bienvenido, " . $_COOKIE['usuario'] . "!</p>";
    }
    else {
        echo "<p>No se ha establecido ningún usuario.</p>";
    }
    ?>
    <form method="POST">
        <label>Nombre de usuario:</label>
        <input type="text" name="usuario" 
               value="<?php echo isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : ''; ?>" />
        <br><br>
        <input type="submit" value="Crear Cookie" />
    </form>
</body>
</html>