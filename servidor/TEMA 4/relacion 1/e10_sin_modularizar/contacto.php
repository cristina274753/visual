<?php
// Mismo encabezado, navegación y pie de página repetidos
// El formulario aquí no enviaría un mensaje flash, sino que se auto-procesaría o iría a otro archivo.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Sitio No Modular</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header class="site-header">
        <h1>Portal PHP No Modular</h1>
        <nav>
            <!-- CÓDIGO REPETIDO -->
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main class="contenedor-principal">
        <h2>Contáctanos</h2>
        <p>Envíanos tus dudas. (Este formulario no tiene la lógica de mensajes flash centralizada).</p>

        <!-- El formulario se enviaría a sí mismo o a un archivo procesador -->
        <form action="contacto.php" method="POST" class="formulario-contacto">
            <label for="nombre">Tu nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required placeholder="Ej: María"><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe aquí..."></textarea><br><br>

            <button type="submit">Enviar Mensaje</button>
        </form>
    </main>
    <footer class="site-footer">
        <!-- CÓDIGO REPETIDO -->
        <p>PLluyot &copy; <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>