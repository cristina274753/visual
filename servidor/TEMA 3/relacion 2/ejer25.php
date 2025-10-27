<?php

    include "datosEstudiantes.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
        foreach ($estudiantes as $nombre => $notas) : ?>
            <li>
                <a href="e30_detalles.php?nombre=<?php echo urlencode($nombre); ?>">
                    <?php echo htmlspecialchars($nombre); ?>
                </a>
            </li>
        <?php endforeach; ?>
</body>
</html>