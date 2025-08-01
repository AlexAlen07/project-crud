<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}
echo "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2>";
echo "<a href='../logout.php'>Cerrar sesión</a>";
?>
