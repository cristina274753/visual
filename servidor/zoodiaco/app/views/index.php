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
                <?= htmlspecialchars(($_SESSION['usuario'])) ?>
            </span>
            <a href="logout" class="btn btn-secondary btn-sm">Logout</a>
        </div>
    </header>
    <main class="container d-flex flex-column flex-fill justify-content-center text-white">

<!-- Contenedor principal -->
<div class="d-flex flex-column">
    <!-- Header-->
    <header class="py-3  text-white mb-3">
        <div class="container px-lg-5 text-center">
            <h1 class="display-6 fw-bold">Bienvenido a la Enciclopedia del Zodíaco</h1>
            <p class="fs-5">Explora los signos del zodíaco y sus características asociadas.<br>Descubre la compatibilidad entre diferentes signos y ajusta los porcentajes de afinación.</p>
            <a class="btn btn-outline-light btn-lg" href="zodiaco">Explorar Signos del Zodíaco</a>
        </div>
    </header>
    <!-- Contenido de la página-->
    <section class="flex-grow-1 d-flex flex-start">
        <div class="container px-lg-5">
            <!-- Introducción a la aplicación-->
            <div class="row gx-lg-5 mb-3">
                <div class="col-lg-12">
                    <div class="card bg-dark text-white border-0 h-100" style="--bs-bg-opacity: .5;">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="fs-5 fw-bold">Sobre la Aplicación</h2>
                            <p class="mb-0">Nuestra aplicación te permite explorar los signos del zodíaco y sus características. Puedes aprender sobre la compatibilidad entre diferentes signos y ajustar los porcentajes de afinación según tus propias experiencias.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Características de la aplicación-->
            <div class="row gx-lg-5">
                <div class="col-lg-4 mb-3">
                    <div class="card bg-dark text-white border-0 h-100 " style="--bs-bg-opacity: .3;">
                        <div class="card-body text-center p-4 p-lg-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4"><i class="bi bi-book"></i></div>
                            <h2 class="fs-5 fw-bold">Explora Signos del Zodíaco</h2>
                            <p class="mb-0">Accede a una amplia colección de signos del zodíaco y sus características.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card bg-dark text-white border-0 h-100" style="--bs-bg-opacity: .3;">
                        <div class="card-body text-center p-4 p-lg-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4"><i class="bi bi-people"></i></div>
                            <h2 class="fs-5 fw-bold">Compatibilidad de Signos</h2>
                            <p class="mb-0">Descubre la compatibilidad entre diferentes signos del zodíaco.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="card bg-dark text-white border-0 h-100" style="--bs-bg-opacity: .3;">
                        <div class="card-body text-center p-4 p-lg-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4"><i class="bi bi-star"></i></div>
                            <h2 class="fs-5 fw-bold">Ajusta Afinación</h2>
                            <p class="mb-0">Ajusta los porcentajes de afinación entre signos según tus propias experiencias.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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