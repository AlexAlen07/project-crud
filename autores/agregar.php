<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autores</title>

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />

</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h2 class="section-heading text-uppercase text-center mb-3">Agregar Autores</h2>

        <div class="mb-3">
            <input type="text" class="form-control" name="id_autor" placeholder="ID del autor" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="apellido" placeholder="Apellido del autor" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del autor" required>
        </div>

        <div class="mb-3">
            <input type="tel" class="form-control" name="telefono" placeholder="Telefono del autor" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="direccion" placeholder="Direccion" required>
        </div>
        
        <div class="mb-3">
            <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="estado" placeholder="Estado" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" name="pais" placeholder="País" required>
        </div>

        <div class="mb-3">
            <input type="int" class="form-control" name="cod_postal" placeholder="Código postal" required>
        </div>

        <div class="mb-3">
            <?php
            include "../db/conexion.php";
            include "add_delete.php";
            ?>
        </div>

        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary" name="btnagregar" value="ok">Guardar</button>
        </div>
    </form>
</body>

</html>