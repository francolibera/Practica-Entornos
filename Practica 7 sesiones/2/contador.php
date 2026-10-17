<?php 
if (!isset($_COOKIE['visitas'])) { 
    $visitas = 1; 
    setcookie("visitas", $visitas, time() + 3600*24*365); 
} else { 
    $visitas = $_COOKIE['visitas'] + 1; 
    setcookie("visitas", $visitas, time() + 3600*24*365); 
} 
?> 
<html> 
<body> 
<?php 
    if ($visitas == 1) { 
        echo "Bienvenido, esta es la primera vez que visitás esta página"; 
    } else { 
        echo "Esta es tu visita número " . $visitas; 
    } 
?> 
</body> 
</html>