<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alcalá Delivery - Gestión de Carga</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Cabecera Común -->
    <header class="main-header">
        <div class="header-container">
            <div class="header-logo">
                <h1>🚚 Alcalá Delivery</h1>
            </div>

            <nav class="main-nav">
                <a href="." class="nav-link">Vehículos</a>
                <a href="carga" class="nav-link active">Gestión de Carga</a>
            </nav>

            <div class="header-user">
                <div class="user-info">
                    <span class="user-name">👤 Pepe Lluyot Sánchez</span>
                    <span class="user-role">(Profesor)</span>
                </div>
                <a href="logout" class="btn-logout">🚪 Salir</a>
            </div>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-content">
        <div class="content-container">
            <!-- Mensaje Flash -->

            <section class="page-header">
                <h2>Gestión de Carga</h2>
                <p class="page-description">Optimice la carga del vehículo seleccionado</p>
            </section>

            <!-- Información del Vehículo Seleccionado -->
            <section class="selected-vehicle-info">
                <div class="vehicle-summary">
                    <div class="summary-item">
                        <span class="summary-icon">🚚</span>
                        <div>
                            <span class="summary-label">Vehículo:</span>
                            <span class="summary-value"><?= htmlspecialchars($vehiculo['nombre']) ?> (<?= htmlspecialchars($vehiculo['matricula']) ?>)</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <span class="summary-icon">⚖️</span>
                        <div>
                            <span class="summary-label">Carga (actual / maxima):</span>
                            <span class="summary-value"><?= htmlspecialchars($carga) ?> / <?= htmlspecialchars($maximoCarga) ?> kg</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <span class="summary-icon">📦</span>
                        <div>
                            <span class="summary-label">Volumen (Actual / Máximo):</span>
                            <span class="summary-value"><?= htmlspecialchars($volumen) ?> / <?= htmlspecialchars($maximoVolumen) ?>m³</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Botones de Acción -->
            <section class="action-buttons">
                <form action="calcular-carga" method="POST">
                    <button type="submit" class="btn btn-secondary">
                        🔄 Calcular Carga Óptima
                    </button>
                </form>
                <form action="confirmarEnvio" method="POST">
                    <input type="hidden" name="aceptados" value="<?= $aceptados ?>">
                    <button type="submit" class="btn btn-primary">
                        ✅ Confirmar Envío
                    </button>
                </form>
            </section>

            <!-- Tabla de Paquetes -->
            <section class="packages-section">
                <h3 class="section-title">Paquetes Pendientes</h3>

                <?php if (empty($aceptados)): ?>
                        <h1>No hay paquetes disponibles</h1>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="packages-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Destino</th>
                                <th>Peso (kg)</th>
                                <th>Volumen (m³)</th>
                                <th>Prioridad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paquetes as $paquete): ?>

                                <?php if (in_array($paquete, $aceptados)): ?>
                                    <tr class="package-accepted">
                            <?php else: ?>
                                    <tr class="package-rejected">
                              <?php endif ?>  

                            
                                <td><?= htmlspecialchars($paquete['id']) ?></td>
                                <td><?= htmlspecialchars($paquete['destino']) ?> </td>
                                <td><?= htmlspecialchars($paquete['peso']) ?></td>
                                <td><?= htmlspecialchars($paquete['volumen']) ?></td>

                                <?php if ($paquete['prioridad'] === 'Alta'): ?>
                                            <td><span class="priority priority-high">Alta</span></td>
                                <?php elseif ($paquete['prioridad'] === 'Baja'): ?>
                                                    <td><span class="priority priority-low">Baja</span></td>
                                <?php else: ?>
                                                    <td><span class="priority priority-medium">Media</span></td>
                                <?php endif; ?>

                                <?php if (in_array($paquete, $aceptados)): ?>
                                    <td><span class="status-badge status-accepted">Aceptados</span></td>
                            <?php else: ?>

                                <td><span class="status-badge status-pending">Pendiente</span></td>
                            <?php endif ?>
                            </tr>

                            <?php endforeach; ?>
                
                            
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </section>
        </div>
    </main>

    <!-- Pie de Página Común -->
    <footer class="main-footer">
        <div class="footer-container">
            <p>© 2025 Monroy Delivery - by P.Lluyot</p>
        </div>
    </footer>


</body>

</html>