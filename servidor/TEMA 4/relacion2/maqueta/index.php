<?php
// ¡AQUÍ session_start() y require_once 'dataset.php';!
    session_start();
    require_once '../dataset.php';

    $cartasDinamicas="";
    $id=1;
    $visto="";

    //si existe y comprueba si es un array
    if (!isset($_SESSION['viajes_vistos']) || !is_array($_SESSION['viajes_vistos'])) {
        $_SESSION['viajes_vistos'] = [];
    }

    //comprobar mensaje flash
    if(isset($_SESSION['flash_message'])){
        echo $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
    }

    //generar cartas viajes y poner id para pagina stats
    foreach($viajes as $viaje){

        if(in_array($id, $_SESSION['viajes_vistos'])){

            $visto=  "<article class='trip-card visited'>";

        }else{
            $visto=  "<article class='trip-card'>";
        }

         $cartasDinamicas.= 

                $visto
                ."<div class='trip-img'>
                    <img src=".$viaje['imagen']." alt='Foto de ".$viaje['destino']."'>
                </div>
                <div class='trip-info'>
                    <h2>".$viaje['destino']."</h2>
                    <span class='meta'>".$viaje['duracion']." dias | ".$viaje['pais']."</span>
                    <p>Valoración: ⭐ ".$viaje['valoracion']."/5</p>
                </div>
                <div class='trip-action'>
                    <span class='price'>450,00€</span>
                    <a href='stats.php?id=".$id."' class='btn-select'>Ver Análisis</a>
                </div>
            </article>
        
        ";

        $id++;
    }

    
    //cabezera viajes reservados
    $reservados="
    
        Viajes reservados: ". count($_SESSION['reservas']) ."
    ";






   

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
            <?php
                echo $reservados
            ?>
        </div>
    </header>
    <!-- <div class='mensaje-flash'>Ejemplo de mensaje</div> -->
    <main class="travel-grid">
        
        <?php
            echo $cartasDinamicas;
        ?>

    </main>
</body>

</html>