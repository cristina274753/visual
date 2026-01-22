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
        <!-- Contenido de la página -->
        <h4 class="text-center text-secondary">Selecciona tu símbolo zodiacal</h4>
        <div class="container d-flex justify-content-center align-items-center"> <!-- Contenedor centrado -->
            
            <div id="carouselExample" class="carousel slide w-50">
                <?php if (empty($vehiculos)): ?>
                    <h1>No hay símbolos disponibles</h1>
                <?php else: ?>

                <div class="carousel-inner">
                <?php $activo = true; ?>
                <?php foreach ($vehiculos as $vehiculo): ?>
                    <div class="carousel-item <?= $activo ? 'active' : '' ?>">
                        <?php $activo = false; ?>

                        <div class="d-flex flex-column align-items-center">
                            <div class="card" style="width: 22rem;">
                                <img src="img/<?= htmlspecialchars($vehiculo['imagen_url']) ?>"
                                    class="card-img-top img-fluid"
                                    style="max-height: 600px; width: auto;"
                                    alt="<?= htmlspecialchars($vehiculo['nombre']) ?>">

                                <div class="card-body bg-black text-light py-1 my-0">
                                    <h3 class="card-title text-center mb-0">
                                        <a href="comparativa1.html"
                                        class="text-reset text-decoration-none btn-sm">
                                            <?= htmlspecialchars($vehiculo['nombre']) ?>
                                        </a>
                                    </h3>
                                    <p class="card-text text-center text-secondary my-0">
                                        <?= htmlspecialchars($vehiculo['descripcion']) ?>
                                    </p>
                                </div>

                                <div class="card-footer bg-black d-flex justify-content-between pt-0 pb-2 px-2">
                                    
                                    <a href="comparativa1?s1=<?= $vehiculo['id'] ?>" class="btn btn-secondary btn-sm">Comparar</a>
                                    <small class="text-secondary fst-italic">
                                        <?= htmlspecialchars($vehiculo['fecha_inicio']) ?> -
                                        <?= htmlspecialchars($vehiculo['fecha_fin']) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                <?php endif; ?>
                </div>

                <!-- Flechas de navegación -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
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