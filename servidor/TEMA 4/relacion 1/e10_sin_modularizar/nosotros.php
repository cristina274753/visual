<?php
// Mismo encabezado y navegación repetida
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nosotros - Sitio No Modular</title>
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
        <h2>Nuestro Equipo</h2>
        <p>Somos desarrolladores que promueven el código limpio y la arquitectura modular para facilitar el mantenimiento de las aplicaciones web.</p>

        <section class="equipo">
            <h3>Valores Clave</h3>
            <ul>
                <li><strong>DRY:</strong> Aquí no se está aplicando, el código se repite.</li>
                <li><strong>Mantenimiento:</strong> Es difícil y lento de mantener.</li>
            </ul>
        </section>
    </main>
    <footer class="site-footer">
        <!-- CÓDIGO REPETIDO -->
        <p>PLluyot &copy; <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>