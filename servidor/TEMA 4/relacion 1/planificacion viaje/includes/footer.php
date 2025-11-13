<?php
// En este escenario, cada archivo tiene que empezar y terminar con su propio HTML.
// No hay sesiones ni lógica de enrutamiento central.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Sitio No Modular</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
   
    <footer class="site-footer">
        <!-- ESTE FOOTER SE REPITE EN CADA ARCHIVO -->
        <p>PLluyot &copy; <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>