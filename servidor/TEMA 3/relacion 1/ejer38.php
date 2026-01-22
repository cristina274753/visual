<?php

    $nombre=$_GET("nombre");
    $apellidos=$_GET("apellidos");

    echo "hola $nombre $apellidos, como estas?"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="e38_pasoparam_mensaje.php?nombre=Juan&apellidos=Pérez">Haz clic aquí para ver el mensaje</a>
</body>
</html>