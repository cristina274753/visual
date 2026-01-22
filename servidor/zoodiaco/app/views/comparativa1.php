<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="pepelluyot" />
    <title>Zodíaco</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css/zodiaco.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-black text-white bg-image">
    <!-- Header de la página -->
    <header class="d-flex container justify-content-between align-items-center border-bottom my-3 text-white">
        <div class="d-flex align-items-center my-1">
            <img src="./img/logo.png" alt="" style="border-radius: 100%;width:50px;">
            <ul class="nav">
                <li><a href="index" class="nav-link px-3 text-light">Inicio</a></li>
                <li><a href="zodiaco" class="nav-link px-3 text-light">Zodíaco</a></li>
            </ul>
        </div>

        <div class="col-md-3 text-end">
            <span class="px-2">Bienvenido,
                Nombre de Usuario
            </span>
            <a href="login.html" class="btn btn-secondary btn-sm">Logout</a>
        </div>
    </header>
    <main class="container d-flex flex-column flex-fill justify-content-center text-white">
        <div class="container d-flex justify-content-center align-items-center"> <!-- Contenedor centrado -->

        <!-- icono con nombre -->

        <?php foreach ($signos as $vehiculo): ?>
        
            <div class="row row-cols-12 g-4">
                <div class="col">
                    <div class=" text-light text-center">
                        <div class="">
                            <a href="comparativa2?s1=<?= $signo1['id'] ?>&s2=<?= $vehiculo['id'] ?>"><img src="img/thumb/<?= htmlspecialchars($vehiculo['imagen_thumb']) ?>" class="img-fluid" alt="Nombre 1"
                                    style="width: 70px;"></a>
                            <p class=""><?= htmlspecialchars($vehiculo['nombre']) ?></p>
                        </div>
                    </div>
                </div>
                
            </div>

        <?php endforeach; ?>

        </div>
        <!-- Nueva sección con dos columnas -->
        <div class="container mt-4">
            <div class="row row-cols-4">
                <!-- Columna izquierda con una tarjeta -->
                <div class="col card bg-black" style="width: 20rem;">
                    <h4 class="text-center text-secondary">Mi signo1 <?= htmlspecialchars($signo1['nombre']) ?> zodiacal</h4>
                    <img src="img/<?= htmlspecialchars($signo1['imagen_url']) ?>" class="card-img-top" style="max-height: 600px; width: auto;"
                        alt="Imagen 1">
                    <div class="card-body bg-black text-light py-1">
                        <h5 class="card-title text-center my-0"><?= htmlspecialchars($signo1['nombre']) ?></h5>
                        <p class="card-text text-secondary text-center my-0"><?= htmlspecialchars($signo1['descripcion']) ?></p>
                        <small class="text-secondary text-cursive text-center fst-italic d-block"><?= htmlspecialchars($signo1['fecha_inicio']) ?> - <?= htmlspecialchars($signo1['fecha_fin']) ?></small>
                    </div>
                </div>
                <!-- Columna derecha con varios textos -->
                <div class="col-md">
                    <h4 class="text-center text-light">Comparativa entre signo1$signo1s zodiacales</h4>
                    <p class="text-center text-secondary">Selecciona uno de los signo1$signo1s zodiacales para conocer la
                        compatibilidad.</p>
                    <form>
                        <table class="table table-dark table-hover table-striped align-middle small">
                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td><td><?= htmlspecialchars($signo1['nombre']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Elemento</th>
                                    <td><td><?= htmlspecialchars($signo1['elemento']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Modalidad</th>
                                    <td><td><?= htmlspecialchars($signo1['modalidad']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Inicio</th>
                                    <td><td><?= htmlspecialchars($signo1['fecha_inicio']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Fin</th>
                                    <td><td><?= htmlspecialchars($signo1['fecha_fin']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Planeta Regente</th>
                                    <td> <td><?= htmlspecialchars($signo1['planeta_regente']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Personalidad</th>
                                    <td><td><?= htmlspecialchars($signo1['personalidad']) ?></td></td>
                                </tr>
                                <tr>
                                    <th>Compatibilidad amorosa</th>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Compatibilidad emocional</th>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%;"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Compatibilidad laboral</th>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Compatibilidad social</th>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%;"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="zodiaco.html" class="btn btn-outline-light btn-sm">Volver</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- Columna derecha con una tarjeta -->
                <div class="col card bg-black" style="width: 20rem;">
                    <h4 class="text-center text-secondary">Selecciona un signo1$signo1</h4>
                    <p class="text-light text-center mt-5">Elige uno de los signo1$signo1s zodiacales (en la parte superior)
                        para comparar la afinación entre ambos signo1$signo1s.</p>

                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <footer class="py-3">
        <div class="container">
            <p class="m-0 text-center text-light">Copyright &copy; Pepelluyot 2025</p>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>