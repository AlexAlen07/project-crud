<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Libreria Online</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <!-- Impide que al refrescar la pagina te pregunte si quieres volver a enviar el formulario -->
        <script>
        if (window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);  
        }
        </script>
    </head>

    <body id="page-top">
        <!-- Barra de navegacion-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">Libreria Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#libros">Libros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#autores">Autores</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contacto">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Encabezado-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Bienvenidos a la Mejor Libreria Online</h1>
                    <h2 class="masthead-subheading mb-0">¡Sientete libre de buscar los mejores libros!</h2>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

        <!--Libros-->
        <section class="page-section" id="libros">
            <div class="table-container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Libros</h2>
                    <table>
                        <thead class="bg-info">
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Precio</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "db/conexion.php"; // Asegúrate de que este archivo establece la conexión usando PDO
                            include "libros/add_delete.php";

                            // Preparar la consulta para obtener los libros
                            $sql = "SELECT * FROM titulos";
                            $stmt = $conexion->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_OBJ); // Obtener todos los resultados como objetos

                            foreach ($result as $datos) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($datos->titulo) ?></td>
                                    <td><?= htmlspecialchars($datos->tipo) ?></td>
                                    <td><?= htmlspecialchars($datos->precio) ?></td>
                                    <td>
                                        <a href="index.php?titulo=<?= urlencode($datos->titulo) ?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <a href="libros/agregar.php" class="btn btn-warning">Agregar</a>
            </div>
        </section>

        <!--Autores-->
        <section class="page-section bg-info" id="autores">
            <div class="table-container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Autores</h2>
                    <table>
                        <thead class="bg-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">País</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "db/conexion.php"; // Asegúrate de que este archivo establece la conexión usando PDO
                            include "autores/add_delete.php";

                            // Preparar la consulta para obtener los autores
                            $sql = "SELECT * FROM autores";
                            $stmt = $conexion->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_OBJ); // Obtener todos los resultados como objetos

                            foreach ($result as $datos1) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($datos1->nombre) ?></td>
                                    <td><?= htmlspecialchars($datos1->apellido) ?></td>
                                    <td><?= htmlspecialchars($datos1->pais) ?></td>
                                    <td>
                                        <a href="index.php?nombre=<?= urlencode($datos1->nombre) ?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <a href="autores/agregar.php" class="btn btn-warning">Agregar</a>
            </div>
        </section>

        <!-- Contacto-->
        <section class="page-section bg-light" id="contacto">
            <div class="container">
                <form class="text-center" method="POST">
                    <h2 class="section-heading text-uppercase">Contacto</h2>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="asunto" placeholder="Asunto" required>
                    </div>

                    <div class="mb-3">
                        <input type="date" class="form-control" name="fecha" placeholder="Fecha" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="comentario" placeholder="Comentario" required>
                    </div>

                    <div class="mb-3">
                        <?php
                        include "db/conexion.php"; // Asegúrate de que este archivo establece la conexión usando PDO
                        include "formulario/contacto.php";
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnenviar" value="ok">Enviar</button>
                </form>
            </div>
        </section>

        <!-- Titulos-->
        <section class="page-section" id="titulos">
            <div class="container">
                <form class="text-center" method="POST">
                    <h2 class="section-heading text-uppercase">Titulos</h2>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="buscar" placeholder="Buscar Libro" required>
                    </div>

                    <div class="mb-3">
                        <?php
                        include "db/conexion.php";

                        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['buscar'])) {
                            $buscar = $_POST['buscar'];
                            
                            $sql = "SELECT * FROM titulos WHERE titulo LIKE :buscar";
                            $stmt = $conexion->prepare($sql);
                            $stmt->bindValue(':buscar', "%$buscar%", PDO::PARAM_STR);
                            $stmt->execute();
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if ($resultados) {
                                foreach ($resultados as $fila) {
                                    echo "<p>" . htmlspecialchars($fila['titulo']) . "</p>";
                                }
                            } else {
                                echo "<p>No se encontraron libros.</p>";
                            }
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnenviar" value="ok">Enviar</button>
                </form>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Libreria Online - ITLA 2025 by Albert Peguero 2023-1402</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
