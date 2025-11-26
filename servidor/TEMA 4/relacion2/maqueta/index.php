<?php
// ¡AQUÍ session_start() y require_once 'dataset.php';!
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes - Catálogo</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1>Destinos Disponibles</h1>
        <p>Selecciona un viaje para ver las estadísticas comparativas.</p>

        <div class="counter">
            Viajes reservados: **2**
        </div>
    </header>
    <!-- <div class='mensaje-flash'>Ejemplo de mensaje</div> -->
    <main class="travel-grid">
        <article class="trip-card visited">
            <div class="trip-img">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?auto=format&fit=crop&w=400&q=80" alt="Foto de París">
            </div>
            <div class="trip-info">
                <h2>París</h2>
                <span class="meta">5 días | Francia</span>
                <p>Valoración: ⭐ 4.5/5</p>
            </div>
            <div class="trip-action">
                <span class="price">450,00€</span>
                <a href="stats.php?id=1" class="btn-select">Ver Análisis</a>
            </div>
        </article>

    </main>
</body>

</html>