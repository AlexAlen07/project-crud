<?php
try {
    $host = "sql309.infinityfree.com";
    $dbname = "if0_38644984_libreria";
    $user = "if0_38644984";
    $pass = "albert07aaa";

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $conexion = new PDO($dsn, $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa!";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>

