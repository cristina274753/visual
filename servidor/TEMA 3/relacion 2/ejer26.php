<?php

    $animales= [    
        ['nombre' => 'Simba', 'especie' => 'León', 'interacciones' => 5],
        ['nombre' => 'Dumbo', 'especie' => 'Elefante', 'interacciones' => 10],
        ['nombre' => 'George', 'especie' => 'Mono', 'interacciones' => 8]
    ];

    function registrarInteraccion($animales, $nombre_animal) {

        if (empty($animales)) {
            $error="el zoo esta vacio";
        }

         foreach ($animales as &$animal) {

        if ($animal['nombre'] === $nombre_animal) {
            $animal['interacciones']++;
            return;
        }
    }
    echo "<p>Error al registrar interacción: No se encontró el animal $nombre_animal </p>";
        
       

    }

    function animal_mas_interactivo($animales)
    {
        if (empty($animales)) {
            return "Error animal más interactivo: No hay animales registrados en el zoológico.<br>";
        }

        $max_interacciones = 0;
        $animales_mas_interactivo = [];
        
        $max_interacciones = max(array_column($animales, 'interacciones'));

        foreach ($animales as $animal) {
            if ($animal['interacciones'] == $max_interacciones) {
                $animales_mas_interactivo[] = $animal;
            }
        }
        return $animales_mas_interactivo;
    }

    function  promedio_interacciones_por_especie($animales){
        if (empty($animales)) {
            return "Error promedio: No hay animales registrados en el zoológico.<br>";
        }
        
        $especies=[];
        $num_especies=[];
       
        foreach ($animales as $animal){
            $especies[$animal['especie']][]=$animal['interacciones'];
        }

        $promedio_por_especie = [];
        foreach ($especies as $especie => $interaciones) {
            $promedio_por_especie[$especie] = round(array_sum($interaciones) / count($interaciones), 2); 
            
        }

        return $promedio_por_especie;
        
    }

    function pintar_array($miarray)
    {
        echo "<pre>";
        print_r($miarray);
        echo "</pre>";
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php
    //mostramos el contenido del array por pantalla
    pintar_array($animales);
    
    //añadimos una interacción al animal Simba
    registrar_interaccion($animales, 'Simba');
    //pintamos el array de nuevo
    pintar_array($animales);

    /* registrar_interaccion ($animales, 'Dumbo');
    pintar_array($animales);
    registrar_interaccion ($animales, 'noexiste');
    pintar_array($animales);*/

    $int_animales = animal_mas_interactivo($animales);
    pintar_array($int_animales);

    $int_media = promedio_interacciones_por_especie($animales);
    pintar_array($int_media);

    ?>
</body>
</html>