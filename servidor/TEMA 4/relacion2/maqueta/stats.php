<?php
// ¡Aquí va toda la lógica de validación, cálculos y gestión de $_SESSION['vistos']!
    session_start();
    require_once '../dataset.php';

    $errores=[];
    $mediaPrecio=0;
    $mediaDuracion=0;
    $precioMax=0;

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $id=trim($_GET['id'] ?? "");

        if($id=="" || !array_key_exists($id, $viajes)){
            $errores= "error id vacio o no esta en el array";
            
            header("Location: index.php");
            exit();
        }

        //sacamos la mediaPrecio precio y la de duracion
        foreach($viajes as $viaje){
            $mediaPrecio+=$viaje['precio'];
            $mediaDuracion+=$viaje['duracion'];

            if($precioMax<$viaje['precio']){
                $precioMax=$viaje['precio'];
            }
        }

        $mediaPrecio= $mediaPrecio/count($viajes);
        $mediaDuracion= $mediaDuracion/count($viajes);
        
        //mostrar datos de cada viaje en especifico
        $datosViaje="";

        $datosViaje="
        
            <h1>".$viajes[$id]['destino']."</h1>
                <div class='data-row'>
                    <span>📅 ".$viajes[$id]['duracion']." días</span>
                    <span>🌍 ".$viajes[$id]['pais']."</span>
                    <span>⭐ ".$viajes[$id]['valoracion']."/5</span>
                </div>
                <div class='big-price'>".$viajes[$id]['precio']."€</div>

                <a href='reserva.php?id=$id' class='btn-reserve'>Reservar este viaje</a>



        ";


        $width=($viajes[$id]['precio']/ $precioMax)* 100;

        $datosComparativaPrecio="
        
            <div class='stat-label'>
                    <span>Precio del viaje: ".$viajes[$id]['precio']."€</span>
                    <small>MediaPrecio del catálogo: ".$mediaPrecio."€</small>
                </div>
                <div class='bar-container'>
                    <div class='bar-fill' style='width: ".$width."%;'></div>
            </div>
        ";


        //logica sesiones

        if (!isset($_SESSION['viajes_vistos'])) {

            $_SESSION['viajes_vistos'] = [];
        }

        if(!in_array($id, $_SESSION['viajes_vistos'])){
            
            $_SESSION['viajes_vistos'][]=$id;

        }

        
       
    }


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
            <?php
                echo $datosViaje;
            ?>
        </section>

        <section class="detail-card stats-section">
            <h2>Comparativa con la MediaPrecio del Catálogo</h2>

            <div class="stat-item">
                <?php
                    echo $datosComparativaPrecio;
                ?>
            </div>

            <div class="stat-item">
                <div class="stat-label">
                    <span>Duración: 5 días</span>
                    <small>MediaPrecio del catálogo: 6.5 días</small>
                </div>
                <div class="bar-container">
                    <div class="bar-fill warning" style="width: 50%;"></div>
                </div>
            </div>

        </section>
    </div>

</body>

</html>