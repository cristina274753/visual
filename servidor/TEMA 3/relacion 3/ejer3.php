<?php

    $nombre="";
    $apellidos="";
    $errores=[];
    $mensaje="";


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET["enviar"])) {
        
        /* recoger datos */
        $nombre = htmlspecialchars(trim($_GET['nombre'] ?? ""));
        $apellidos = htmlspecialchars(trim($_GET['apellidos'] ?? ""));

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($nombre === "" || $apellidos === "") {
            $mensaje .= "Por favor, rellena todos los campos.";
        } else {
            // Verificamos que el nombre tenga una longitud menor a 25
            if (strlen($nombre) > 25) {
                $mensaje .= "El nombre no debe tener más de 25 caracteres.";
            }
            // Verificamos que los apellidos tengan una longitud menor a 35
            if (strlen($apellidos) > 35) {
                $mensaje .= "Los apellidos no deben tener más de 35 caracteres.";
            }
        }

        /*cuando no hay errores*/
        if (empty($errores)) {
            $mensaje =  "Formulario enviado correctamente.<br>" .
                         "<strong>Nombre:</strong> " . htmlspecialchars($nombre) . "<br>" .
                         "<strong>Apellidos:</strong> " . htmlspecialchars($apellidos);
        }





    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
        <h1>datos empleados</h1>
        <form name="myForm" action="" method="get">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">Nombre</label>
              <input id="firstName" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="col">
              <label for="lastName">Apellido</label>
              <input id="lastName" name="apellidos" type="text" placeholder="Ingresa tu apellido" required>
            </div>
          </div>
    
          
    
          <!-- Acciones -->
          <div class="actions">
            <input type="submit" name="enviar" value="Enviar">

          </div>
    
        </form>

        <?php
        if (!empty($errores)): ?>
          <p class='notice'>
            <?php foreach ($errores as $e): ?>
              <?= htmlspecialchars($e) ?><br>
            <?php endforeach; ?>
          </p>
        <?php
        elseif (!empty($mensaje)): ?>
          <p class='notice'><?= ($mensaje); ?></p>
        <?php endif; ?>
    
</body>
</html>