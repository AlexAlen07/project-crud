<?php
try {
    $conexion = new PDO("mysql:host=sql309.infinityfree.com;dbname=if0_38644984_libreria;charset=utf8", "if0_38644984", "albert07aaa");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_POST["btnagregar"])) {
        if (!empty($_POST["id_autor"]) && !empty($_POST["apellido"]) && !empty($_POST["nombre"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["ciudad"]) && !empty($_POST["estado"]) && !empty($_POST["pais"]) && !empty($_POST["cod_postal"])) {
            
            $id_autor = $_POST["id_autor"];
            $apellido = $_POST["apellido"];
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $ciudad = $_POST["ciudad"];
            $estado = $_POST["estado"];
            $pais = $_POST["pais"];
            $cod_postal = $_POST["cod_postal"];

            $sql = "INSERT INTO autores (id_autor, apellido, nombre, telefono, direccion, ciudad, estado, pais, cod_postal) VALUES (:id_autor, :apellido, :nombre, :telefono, :direccion, :ciudad, :estado, :pais, :cod_postal)";
            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':id_autor', $id_autor);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':pais', $pais);
            $stmt->bindParam(':cod_postal', $cod_postal);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Autor registrado correctamente</div>';
                // Redirigir a la página de inicio después de insertar el registro
                header("Location: ../index.php#autores");
                exit();
            } else {
                echo '<div class="alert alert-danger">Error al registrar el autor</div>';
            }

        } else {
            echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
        }
    }

    if (!empty($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
        
        $sql = "DELETE FROM autores WHERE nombre = :nombre";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);

        
        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Autor eliminado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al eliminar el autor</div>';
        }
    }

} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Error en la conexión: ' . $e->getMessage() . '</div>';
}
?>