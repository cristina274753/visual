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
        if ($nombre === "" || $apellidos === "") {
            $errores['nombre']= "Por favor, rellena el campo nombre";
        }


        
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        
        $_SESSION['nombre']=$nombre;

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
    <form action="juego.php">
        <label>Tu nombre:</label>
        <input type="text" name="nombre">
        <button type="submit">Entrar en servicio</button>
    </form>
    
</body>
</html>