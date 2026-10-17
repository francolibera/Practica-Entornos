<?php
if (isset($_POST['tipo'])) {
    setcookie("titular", $_POST['tipo'], time() + 3600*24*365);
}
?>

<html>
<head>
    <title>Diario</title>
</head>
<body>

    <form method="POST">
        Tipo de titular a mostrar:
        <br>
        <input type="radio" name="tipo" value="politica"  />
        <label>Política</label>
        <br>
        <input type="radio" name="tipo" value="economia" />
        <label>Economía</label>
        <br>
        <input type="radio" name="tipo" value="deportes" />
        <label>Deportes</label>
        <br><br>
        <input type="submit" value="Aplicar" />
    </form>

<?php if (!isset($_COOKIE['titular'])){
    echo '<p>Titular de politica.</p>';
    echo '<p>Titular de economia.</p>';
    echo '<p>Titular de deportes.</p>';
}
elseif ($_COOKIE['titular'] == "politica"){  
    echo '<p>Titular de politica.</p>';
}
elseif ($_COOKIE['titular'] == "economia"){
        echo '<p>Titular de economia.</p>';
}
elseif ($_COOKIE['titular'] == "deportes"){
        echo '<p>Titular de deportes.</p>';
}
?>
<br>
<a href="borrar_cookie.php">Borrar cookies</a>

</body>
</html>