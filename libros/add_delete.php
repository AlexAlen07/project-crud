<?php
try {
    // Establecer la conexión a la base de datos
    $conexion = new PDO("mysql:host=sql309.infinityfree.com;dbname=if0_38644984_libreria;charset=utf8", "if0_38644984", "albert07aaa");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_POST["btninsertar"])) {
        if (!empty($_POST["id_titulo"]) && !empty($_POST["titulo"]) && !empty($_POST["tipo"]) && !empty($_POST["id_pub"]) && !empty($_POST["precio"]) && !empty($_POST["avance"]) && !empty($_POST["total_ventas"]) && !empty($_POST["notas"]) && !empty($_POST["fecha_pub"]) && isset($_POST["contrato"])) {
            
            $id_titulo = $_POST["id_titulo"];
            $titulo = $_POST["titulo"];
            $tipo = $_POST["tipo"];
            $id_pub = $_POST["id_pub"];
            $precio = $_POST["precio"];
            $avance = $_POST["avance"];
            $total_ventas = $_POST["total_ventas"];
            $notas = $_POST["notas"];
            $fecha_pub = $_POST["fecha_pub"];
            $contrato = $_POST["contrato"];

            // Preparar la consulta
            $sql = "INSERT INTO titulos (id_titulo, titulo, tipo, id_pub, precio, avance, total_ventas, notas, fecha_pub, contrato) VALUES (:id_titulo, :titulo, :tipo, :id_pub, :precio, :avance, :total_ventas, :notas, :fecha_pub, :contrato)";
            $stmt = $conexion->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(':id_titulo', $id_titulo);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':id_pub', $id_pub);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':avance', $avance);
            $stmt->bindParam(':total_ventas', $total_ventas);
            $stmt->bindParam(':notas', $notas);
            $stmt->bindParam(':fecha_pub', $fecha_pub);
            $stmt->bindParam(':contrato', $contrato);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Libro registrado correctamente</div>';
                // Redirigir a la página de inicio después de insertar el registro
                header("Location: ../index.php#libros");
                exit();
            } else {
                echo '<div class="alert alert-danger">Error al registrar el libro</div>';
            }

        } else {
            echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
        }
    }

    if (!empty($_GET["titulo"])) {
        $titulo = $_GET["titulo"];
        // Preparar la consulta para eliminar
        $sql = "DELETE FROM titulos WHERE titulo = :titulo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Libro eliminado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al eliminar el libro</div>';
        }
    }

} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Error en la conexión: ' . $e->getMessage() . '</div>';
}
?>