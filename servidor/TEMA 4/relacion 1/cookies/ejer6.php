<?php

    $nombre = $_COOKIE['nombre'] ?? '';
    $color = $_COOKIE['color'] ?? '';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /* recoger datos */
        
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
        $color = htmlspecialchars(trim($_POST['color'] ?? ""));

        if ($nombre != '') {

            setcookie('nombre', $nombre, time() + (5 * 60), "/");

        }
        
        if ($color!=""){

             setcookie('color', $color, time() + (5 * 60), "/");

        
            
        }
    }

    /* comprobar método del formulario */
    if (isset($_POST['reset_nombre'])) {

        setcookie('nombre', "", time() - 3600, "/"); // Eliminar la cookie del nombre
        header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página para actualizar la visualización
        exit; // Terminar el script para evitar que el resto del código se ejecute


    } 
    
    if (isset($_POST['reset_color'])) {

        setcookie('color', "", time() - 3600, "/"); // Eliminar la cookie del color
        header("Location: " . $_SERVER['PHP_SELF']); // Redirigir a la misma página para actualizar la visualización
        exit; // Terminar el script para evitar que el resto del código se ejecute
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?php
                                   echo $color;
                                ?>
        }
    </style>
</head>
<body>
        <h1>formulario</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="nombre">Nombre</label>
              <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
            </div>
          </div>
    
    
          <!-- Select -->
          <div style="margin-top:1rem">
            <label for="color">Color favorito</label>
            <select id="color" name="color" required>
              <option value="">Selecciona un color</option>
              <option value="red">rojo</option>
              <option value="blue">azul</option>
              <option value="green">verde</option>
            </select>
          </div>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
            
          </div>
    
        </form>

        <h3>Cookies Almacenadas</h3>
        <?php
        // Mostrar las cookies si existen
        if (empty($nombre) && empty($color)) {
            echo "<p class='notice'>No hay cookies almacenadas.</p>";
        } else {
            if (!empty($nombre)) {
                echo "<p>Nombre: <strong>" . htmlspecialchars($nombre) . "</strong></p>";
                echo '<form method="post" action="">
                        <button type="submit" name="reset_nombre">Eliminar Cookie de Nombre</button>
                      </form>';
            }

            if (!empty($color)) {
                echo "<p>Color Favorito: <strong style='background-color: $color; color: white;'>$color</strong></p>";
                echo '<form method="post" action="">
                        <button type="submit" name="reset_color">Eliminar Cookie de Color Favorito</button>
                      </form>';
            }
        }
        ?>
    
</body>
</html>