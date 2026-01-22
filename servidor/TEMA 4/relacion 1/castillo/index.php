<?php

    session_start();

    


    $nombre="";
    $errores=[];
    $mensaje="";

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {

        /* recoger datos */
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($nombre === "" ) {
            $errores['nombre']= "Por favor, rellena el campo nombre";
        }


         // 3)Cuando no hay errores
        if (empty($errores)) {
            
            $_SESSION['nombre']=$nombre;
            $_SESSION['puntos']=0;
            $_SESSION['aciertos']=0;
            $_SESSION['fallos']=0;
            $_SESSION['turno']=1;

            header("Location: juego.php");
            exit();

        }
        
    }

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    

        <h1>Bienvenido a las Puertas del Castillo</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="nombre">Nombre</label>
              <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
            </div>
          </div>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
    
</body>
</html>