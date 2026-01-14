<!-- 
    Plantilla HTML+CSS para el Examen PHP - 2DAW
    Profesor: P.Lluyot
    Fecha: Diciembre 2025
    IES Cristóbal de Monroy
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias - Examen PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <!-- CABECERA (Menú superior) -->
    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <span class="logo-icon">⚙️</span> Gestión de Incidencias
            </div>

            <nav class="nav-menu">
                <a href="index.php">📋 Dashboard</a>
                <a href="logout.php" class="salir">🚪 Salir</a>
            </nav>
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL-->
    <main class="main-content">
        <div class="container">
            <h1 class="title">Panel de Incidencias</h1>
            <!-- TARJETAS DE ESTADÍSTICAS-->
            <section class="stats-grid">
                <div class="card stat-card total">
                    <span class="stat-icon">📝</span>
                    <div>
                        <p class="stat-label">Total Tickets</p>
                        <p class="stat-value">
                            <?php echo $contIncidencias;  ?>
                        </p>
                    </div>
                </div>
                <div class="card stat-card average">
                    <span class="stat-icon">⏱️</span>
                    <div>
                        <p class="stat-label">Media de Horas</p>
                        <p class="stat-value">
                            <?php echo $mediaHoras;  ?> h</p>
                    </div>
                </div>
            </section>
            <!-- MENSAJES FLASH -->

            <?php if ($mensaje!=''): ?>

                <div id="flash-message-container">
                    <div class="flash-message success"><?=htmlspecialchars($mensaje) ?></div>
                    <!-- <div class="flash-message error">Mensaje de error</div> -->
                </div>

            <?php endif; ?>
            
            <!-- TABLA DE INCIDENCIAS (CRUD) -->
            <section class="card">
                <div class="table-controls">
                    <h2 class="table-title">Listado de Incidencias</h2>
                    <!-- Enlace para ir al formulario de alta -->
                    <a href="alta.php" class="btn btn-add">
                        ➕ Nueva Incidencia
                    </a>
                </div>

                <div class="table-wrapper">
                    <!-- tabla que contiene las incidencias -->
                    <?php if (!empty($tabla)): ?>  <!--tabla -->
                        <?= $tabla ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>

        
    </main>
    <!-- PIE DE PÁGINA -->
    <footer class="footer">
        <div class="container">
            <p>
                © 2025 IES Cristóbal de Monroy. Examen PHP.
            </p>
        </div>
    </footer>
</body>
</html>