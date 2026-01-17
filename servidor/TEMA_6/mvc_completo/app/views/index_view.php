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
                <a href="index">📋 Dashboard</a>
                <a href="logout" class="salir">🚪 Salir</a>
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
                <div class="card stat-card average">
                    <span class="stat-icon">INCIDENCIAS</span>
                    <div>
                        <p class="stat-label">Resueltas</p>
                        <p class="stat-value">
                            <?php echo $resueltas;  ?> </p>
                    </div>
                    <div>
                        <p class="stat-label">En curso</p>
                        <p class="stat-value">
                            <?php echo $EnCurso;  ?> </p>
                    </div>
                    <div>
                        <p class="stat-label">pendiente</p>
                        <p class="stat-value">
                            <?php echo $pendientes;  ?> </p>
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
                    <a href="alta" class="btn btn-add">
                        ➕ Nueva Incidencia
                    </a>
                </div>

                <div class="table-wrapper">
                    <!-- tabla que contiene las incidencias -->


                    <?php if (empty($incidencias)): ?>
                        <p>No hay incidencias registradas actualmente.</p>
                    <?php else: ?>
                        <table class="crud-table">
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Tipo</th>
                                    <th>Asunto</th>
                                    <th>Horas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($incidencias as $incidencia): ?>
                                <tr>
                                    <td>
                                        <?php if ($incidencia['estado'] === 'Pendiente'): ?>
                                            <span class="status-pendiente">Pendiente</span>
                                        <?php elseif ($incidencia['estado'] === 'En curso'): ?>
                                            <span class="status-encurso">En curso</span>
                                        <?php else: ?>
                                            <span class="status-resuelta">Resuelta</span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= htmlspecialchars($incidencia['tipo_incidencia']) ?></td>
                                    <td style="font-weight:600;">
                                        <?= htmlspecialchars($incidencia['asunto']) ?>
                                    </td>
                                    <td style="font-weight:700; color: var(--color-primary);">
                                        <?= $incidencia['horas_estimadas'] ?>
                                    </td>

                                    <td>
                                        <a class="btn-toggle-status" href="<?= BASE_URL ?>/modificar/<?= $incidencia['id'] ?>" title="Cambiar Estado">🔄</a>

                                        <a class="button" href="<?= BASE_URL ?>/eliminar/<?= $incidencia['id'] ?>" title='Eliminar'>🗑️</a>


                        

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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