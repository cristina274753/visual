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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./css/zodiaco.css" rel="stylesheet">
</head>

<body class="d-flex vh-100 align-items-center justify-content-center bg-image">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <!-- Header de la página -->
        <header class="text-primary text-center pt-5">
            <div class="text-center"><img src="./img/logo.jpg" style="width:275px;" alt=""></div>
            <!-- <h2 class="text-center mb-3">Iniciar Sesión</h2> -->
        </header>
        <main class="container my-3 flex-fill d-flex align-items-center justify-content-center">
            <form action="login" method="POST" class="mx-auto needs-validation" novalidate style="max-width: 400px;">
                <!-- Campo de usuario -->
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control is-invalid" id="usuario" name="usuario" placeholder="Ingresa tu usuario" value="">
                    <label for="usuario" class="form-label">Usuario</label>
                    <div class="invalid-feedback">



                        <?php
                            if (!empty($errores['usuario'])): ?>
                            <span class="validation-error" id="error-destino"><?= htmlspecialchars($errores['usuario']) ?></span>
                            </p>
                        <?php endif; ?>


                    </div>
                </div>

                <!-- Campo de contraseña -->
                <div class="mb-3 form-floating">
                    <input type="password" class="form-control is-valid" id="password" name="password" value="" placeholder="Ingresa tu contraseña">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="invalid-feedback">

                                 <?php
                                    if (!empty($errores['password'])): ?>
                                    <span class="validation-error" id="error-password"><?= htmlspecialchars($errores['password']) ?></span>
                                    </p>
                                <?php endif; ?>

                    </div>
                </div>
                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="recuerdame" id="recuerdame">
                    <label class="form-check-label text-white" for="recuerdame">
                        Recuérdame
                    </label>
                </div>
                <!-- Botón de inicio de sesión -->
                 <!-- <a  href="login" class="btn btn-secondary w-100 py-2">Acceder</a> -->
                 
                
                <button type="submit" class="btn btn-secondary w-100 py-2">
                    Acceder
                </button>

                

                    <div class="text-danger mt-2 text-center" role="alert">
                        
                        <?php
                        if (!empty($errores['login'])): ?>
                        <div id="flash-message-container">
                        <div class="flash-message error">

                        <?= htmlspecialchars($errores['login']) ?>
                        </div>
                        </div>
                        <?php endif; ?>


                    <?php
                        if (!empty($errores['exito'])): ?>
                        <div id="flash-message-container">
                        <div class="flash-message success">

                            <?= htmlspecialchars($errores['exito']) ?>
                        </div>
                        </div>
                    <?php endif; ?>

                    </div>
            </form>
        </main>
    </div>
</body>
</html>