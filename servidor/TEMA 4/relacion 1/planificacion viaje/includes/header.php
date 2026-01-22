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
    <header class="site-header">
        <h1>Portal PHP No Modular</h1>
        <nav>
            <!-- ESTA NAVEGACIÓN SE REPITE EN CADA ARCHIVO -->
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
   
</body>
</html>