<?php

function comprobar_nombre_usuario($nombre_usuario){
    // Compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20){
        echo $nombre_usuario . " no es válido (longitud incorrecta)<br>";
        return false;
    }
    
    // Compruebo que los caracteres sean los permitidos
    // NOTA: Se eliminó el salto de línea en la cadena de permitidos para evitar fallos.
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    
    for ($i=0; $i<strlen($nombre_usuario); $i++){
        if (strpos($permitidos, substr($nombre_usuario,$i,1)) === false){
            echo $nombre_usuario . " no es válido (caracteres no permitidos)<br>";
            return false;
        }
    }
    
    echo $nombre_usuario . " es válido<br>";
    return true;
}

// --- BANCO DE PRUEBAS ---
echo "<h2>Resultados de la validación:</h2>";

$usuarios_prueba = [
    "usr"       => "user123",        // Válido: cumple longitud y caracteres
    "corto"     => "al",             // Inválido: menos de 3 caracteres
    "largo"     => "un_nombre_de_usuario_extremadamente_largo", // Inválido: más de 20 caracteres
    "con_esp"   => "juan perez",     // Inválido: contiene un espacio en blanco
    "con_simb"  => "admin@web",      // Inválido: contiene el caracter '@'
    "guiones"   => "coding_is-fun",  // Válido: usa letras, '-' y '_'
    "numeros"   => "987654321"       // Válido: solo números dentro del rango
];

foreach ($usuarios_prueba as $caso => $nombre) {
    echo "<strong>Caso " . ucfirst($caso) . ":</strong> ";
    comprobar_nombre_usuario($nombre);
}