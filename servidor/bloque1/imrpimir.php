<?php

    $nombre=$_GET['nombre'];
    $apellidos= $_GET['apellidos'];



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <main>
        <h2>mostrar los datos</h2>

        <?php
            echo "bienvenido $nombre $apellidos";
        ?>
    </main>
</body>
</html>