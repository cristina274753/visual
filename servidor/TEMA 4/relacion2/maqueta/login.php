<?php

session_start();
require_once '../dataset.php';

$errores=[];
$mensaje="";
$usuario="";
$contrasena="";


//csv
function CargarCSV() {
    $archivo = fopen("logincsv.csv", "r");
    $reservas = [];
    while (( $linea = fgetcsv($archivo, 0, ";")) !== false) {
        $reservas[] = $linea;
    }
    fclose($archivo);
    return $reservas;
}


/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $usuario = htmlspecialchars(trim($_POST['usuario'] ?? ""));
    $contrasena = htmlspecialchars(trim($_POST['contrasena'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($usuario === "" || $contrasena === "") {
        $errores[]= "Por favor, rellena todos los campos.";
    } 

    // 3) Cuando no hay errores
    if (empty($errores)) {
       
        //leer archivo csv
        $login = CargarCSV(); 
        $encontrado = false;

        foreach ($login as $linea) {
            $userCSV = trim($linea[0]);
            $passCSV = trim($linea[1]);

            if ($usuario === $userCSV && $contrasena === $passCSV) {
                $encontrado = true;
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php"); // Redirigir a la página principal
                exit();
            }
        }

        if (!$encontrado) {
            $errores[] = "Usuario o contraseña incorrectos.";
        }
    }
}

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
    
    header("Location: loginAgregar.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
        <h1>login</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="usuario">Nombre usuario</label>
              <input id="usuario" name="usuario" type="text" placeholder="Ingresa tu nombre" >
            </div>
            <div class="col">
              <label for="contrasena">Contraseña</label>
              <input id="contrasena" name="contrasena" type="text" placeholder="Ingresa tu apellido" >
            </div>
          </div>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
            <input type="submit" name="agregar" value="agregar usuario">
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
          <p class='notice'><?= htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
    
</body>
</html>