<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monroy Delivery - Gestión de Vehículos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Cabecera Común -->
    <header class="main-header">
        <div class="header-container">
            <div class="header-logo">
                <h1>🚚 Monroy Delivery</h1>
            </div>
            <!-- Actualizar los enlaces del menú -->
            <nav class="main-nav">
                <a href="index" class="nav-link active">Vehículos</a>
                <a href="#" class="nav-link">-- sustituir enlace --</a> <!-- TODO enlace a otra pagina -->
                
            </nav>
            <!-- información del usuario -->
            <div class="header-user">
                <div>
                    <span>-- sustituir información --</span>
                </div>
                <a href="logout" class="btn-logout">🚪 Salir</a>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="content-container">
            <!-- Mensaje Flash -->

            <?php if ($mensaje!=''): ?>

                <div class="flash-message flash-success">
                    <?=htmlspecialchars($mensaje) ?>
                </div>

            <?php endif; ?>
            
            

            <section class="page-header">
                <h2>-- Vehículos: sustituir título --</h2>
                <p class="page-description">-- sustituir texto --</p>
            </section>

            <!-- Grid de Vehículos -->
            <section class="vehicles-grid">
                <!-- Mostrar cuando no hay vehículos -->
                <!--  <h1>No hay vehículos disponibles</h1> --> 

                <?php if (empty($vehiculos)): ?>
                        <h1>No hay vehículos disponibles</h1>
                <?php else: ?>

                <!-- Card Vehículo 1 -->
                 <?php foreach ($vehiculos as $vehiculo): ?>

                <article class="vehicle-card">
                    <div class="vehicle-image">
                        <img src="./img/vehiculos/<?= htmlspecialchars($vehiculo['imagen']) ?>" alt="nombre del vehículo">

                        <?php if ($vehiculo['estado'] === 'Disponible'): ?>
                                            <span class="vehicle-status status-available">Disponible</span>
                        <?php elseif ($vehiculo['estado'] === 'En Ruta'): ?>
                                            <span class="vehicle-status status-busy">En Ruta</span>
                        <?php else: ?>
                                            <span class="vehicle-status status-maintenance">Mantenimiento</span>
                        <?php endif; ?>

                    </div>
                    <div class="vehicle-info">
                        <h3 class="vehicle-name"><?= htmlspecialchars($vehiculo['nombre']) ?></h3>
                        <p class="vehicle-plate">🚗 Matrícula: <strong><?= htmlspecialchars($vehiculo['matricula']) ?></strong></p>
                        <div class="vehicle-specs">
                            <div class="spec-item">
                                <span class="spec-icon">⚖️</span>
                                <div class="spec-content">
                                    <span class="spec-label">Carga Máx:</span>
                                    <span class="spec-value"><?= htmlspecialchars($vehiculo['carga_maxima']) ?> kg</span>
                                </div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon">📦</span>
                                <div class="spec-content">
                                    <span class="spec-label">Volumen Máx:</span>
                                    <span class="spec-value"><?= htmlspecialchars($vehiculo['volumen_maximo']) ?> m³</span>
                                </div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon">⛽</span>
                                <div class="spec-content">
                                    <span class="spec-label">Combustible:</span>
                                    <span class="spec-value"><?= htmlspecialchars($vehiculo['combustible']) ?></span>
                                </div>
                            </div>
                            <div class="spec-item">
                                <span class="spec-icon">🛣️</span>
                                <div class="spec-content">
                                    <span class="spec-label">Kilometraje:</span>
                                    <span class="spec-value"><?= htmlspecialchars($vehiculo['km']) ?> km</span> <!-- 220.400 km -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- acciones del vehículo -->
                    <div class="vehicle-actions">
                        <form action="#" method="POST">
                            <button type="submit" class="btn btn-primary btn-block">
                                📋 -- Ficha Técnica --
                            </button>
                        </form>
                    </div>
                </article>
                <?php endforeach; ?>
                <?php endif; ?>
                

            </section>
        </div>
    </main>
    <!-- Pie de Página Común -->
    <footer class="main-footer">
        <div class="footer-container">
            <p>&copy; 2025 Monroy Delivery - by P.Lluyot</p>
        </div>
    </footer>
</body>

</html>