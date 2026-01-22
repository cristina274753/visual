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
                <a href="carga" class="nav-link">Gestión de Carga</a>
            </nav>
            <!-- información del usuario -->
            <div class="header-user">
                <div class="user-info">
                    <span class="user-name">👤 <?= $_SESSION['nombre'] ?> <?= $_SESSION['apellidos'] ?></span>
                    <span class="user-role">(<?= $_SESSION['rol'] ?>)</span>
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
                <h2>Gestión de Vehículos</h2>
                <p class="page-description">Seleccione un vehículo disponible para asignar la carga</p>           
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
                                    <span class="spec-value"><?= number_format($vehiculo['km'], 0, ',', '.') ?> km</span> <!-- formato: 220.400 km -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- acciones del vehículo -->


                    <?php if ($vehiculo['estado']=='Disponible'): ?>



                    <div class="vehicle-actions">
                        <form action="carga" method="GET">
                            
                            
                            <input type="hidden" name="id" value="<?= htmlspecialchars($vehiculo['id']) ?>">
                            <button type="submit" class="btn btn-primary btn-block">
                                📋 Asignar Carga
                            </button>
                        </form>
                    </div>

                    <?php endif; ?>
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