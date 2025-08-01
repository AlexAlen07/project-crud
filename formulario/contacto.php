<?php

try {
    $conexion = new PDO("mysql:host=sql309.infinityfree.com;dbname=if0_38644984_libreria;charset=utf8", "if0_38644984", "albert07aaa");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (!empty($_POST["btnenviar"])) {
        if (!empty($_POST["nombre"]) && !empty($_POST["correo"]) && !empty($_POST["asunto"]) && !empty($_POST["fecha"]) && !empty($_POST["comentario"])) {
            
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $asunto = $_POST["asunto"];
            $fecha = $_POST["fecha"];
            $comentario = $_POST["comentario"];

            $sql = "INSERT INTO contacto (nombre, correo, asunto, fecha, comentario) VALUES (:nombre, :correo, :asunto, :fecha, :comentario)";
            $stmt = $conexion->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':asunto', $asunto);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':comentario', $comentario);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Persona registrada correctamente</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar persona</div>';
            }

        } else {
            echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
        }
    }
} catch (PDOException $e) {
    echo '<div class="alert alert-danger">Error en la conexión: ' . $e->getMessage() . '</div>';
}
?>