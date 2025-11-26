<?php
// ¡Aquí va toda la lógica de validación, cálculos y gestión de $_SESSION['vistos']!
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis del Viaje</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>



    <div class="container">
        <a href="index.php" class="back-link">← Volver al listado</a>

        <section class="detail-card">
            <h1>París</h1>
            <div class="data-row">
                <span>📅 5 días</span>
                <span>🌍 Francia</span>
                <span>⭐ 4.5/5</span>
            </div>
            <div class="big-price">450,00€</div>

            <a href="reservar.php?id=1" class="btn-reserve">Reservar este viaje</a>
        </section>

        <section class="detail-card stats-section">
            <h2>Comparativa con la Media del Catálogo</h2>

            <div class="stat-item">
                <div class="stat-label">
                    <span>Precio del viaje: 450,00€</span>
                    <small>Media del catálogo: 745,00€</small>
                </div>
                <div class="bar-container">
                    <div class="bar-fill" style="width: 37.5%;"></div>
                </div>
            </div>

            <div class="stat-item">
                <div class="stat-label">
                    <span>Duración: 5 días</span>
                    <small>Media del catálogo: 6.5 días</small>
                </div>
                <div class="bar-container">
                    <div class="bar-fill warning" style="width: 50%;"></div>
                </div>
            </div>

        </section>
    </div>

</body>

</html>