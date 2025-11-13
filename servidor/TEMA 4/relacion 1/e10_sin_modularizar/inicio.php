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
    <main class="contenedor-principal">
        <h2>Bienvenido/a a Portal PHP No Modular</h2>
        <p>Este es el contenido de la página de inicio. Fíjate cómo la cabecera y el pie de página se han escrito de nuevo en este archivo.</p>

        <div class="caja-destacada">
            <h3>El Problema de la Repetición</h3>
            <p>Si cambias el título del menú de 'Nosotros' a 'Quiénes Somos', tienes que ir a editar el código aquí, en nosotros.php y en contacto.php.</p>
        </div>
    </main>
    <footer class="site-footer">
        <!-- ESTE FOOTER SE REPITE EN CADA ARCHIVO -->
        <p>PLluyot &copy; <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>