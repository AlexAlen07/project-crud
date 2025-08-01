<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />

</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h2 class="section-heading text-uppercase text-center mb-3">Agregar Libro</h2>

        <div class="mb-3">
            <input type="text" class="form-control" name="id_titulo" placeholder="ID titulo" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="titulo" placeholder="Titulo del libro" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="tipo" placeholder="Tipo de libro" required>
        </div>

        <div class="mb-3">
            <input type="int" class="form-control" name="id_pub" placeholder="ID publicacion" required>
        </div>

        <div class="mb-3">
            <input type="decimal" class="form-control" name="precio" placeholder="Precio del libro" required>
        </div>

        <div class="mb-3">
            <input type="decimal" class="form-control" name="avance" placeholder="Avance de dinero" required>
        </div>

        <div class="mb-3">
            <input type="int" class="form-control" name="total_ventas" placeholder="Total de ventas" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="notas" placeholder="Notas del libros" required>
        </div>

        <div class="mb-3">
            <input type="date" class="form-control" name="fecha_pub" placeholder="Fecha de publicacion" required>
        </div>

        <div class="mb-3">
            <input type="number" class="form-control" name="contrato" placeholder="¿Tiene contrato?" required>
        </div>

        <div class="mb-3">
            <?php
            include "../db/conexion.php";
            include "add_delete.php";
            ?>
        </div>
        
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary" name="btninsertar" value="ok">Agregar</button>
        </div>
    </form>
</body>

</html>