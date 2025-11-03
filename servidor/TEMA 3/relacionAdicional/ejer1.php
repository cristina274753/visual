<?php

    $mensaje="";
    $errores=[];

    $destinos=[
        "roma" => ["ciudad" => "Roma", "pais" => "Italia", "precio_dia" => 100],
        "paris" => ["ciudad" => "París", "pais" => "Francia", "precio_dia" => 120],
        "lisboa" => ["ciudad" => "Lisboa", "pais" => "Portugal", "precio_dia" => 90],
        "berlin" => ["ciudad" => "Berlín", "pais" => "Alemania", "precio_dia" => 110]
    ];

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        /* recoger datos */
        $personas = intval($_GET['personas'] ?? "");
        $dias = intval($_GET['dias'] ?? "");
        $destino = htmlspecialchars(trim($_GET['destino'] ?? ""));

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($destino === "" || $dias === "" || $personas==="") {
            $errores[] = "Por favor, rellena todos los campos.";
        }

        if(!array_key_exists($destino, $destinos)){
            $errores[]= "destino no esta incluido en los viajes";
        }

        if (intval($personas)<=0 || intval($dias)<=0){
            $errores[]="las personas y los dias deben de ser un numero positivo";
        }

        if(intval($personas)!=$personas || intval($dias)!=$dias){
            $errores[] = "Personas y Días deben ser números enteros";
        }
    }

    function calcularTotal($precio_dia, $personas, $dias)  {
        
        $total=$personas*$dias*$precio_dia;

        if ($dias>=7){

            $descuento=$total*0.10;
            $total= $total-$descuento;
        }

        return $total;


    }

    function mostrar($ciudad, $precioDia, $totalEstimado, $destino, $personas, $dias)  {
        

        $mensaje= "presupuesto para viajar a $destino ( $ciudad )<br>".
                    "precio por persona/dia: $precioDia<br>".
                    "personas: $personas | Dias: $dias<br>".
                    "total estimado: $totalEstimado<br>";


        if($totalEstimado>3000){
            $mensaje.= "revisa si puedes reducir dias o personas<br>";
        }elseif($totalEstimado<1000){
            $mensaje.= "es un viaje economico<br>";
        }else{
            $mensaje.= " precio razonable<br>";
        }

        return $mensaje;
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {

        $ciudad=$destinos[$destino]['pais'];
        $precioDia= $destinos[$destino]['precio_dia'];
        $totalEstimado= calcularTotal($precioDia, $personas, $dias);
        
        $mensaje= mostrar($ciudad, $precioDia, $totalEstimado, $destino, $personas, $dias); /*devuelve precio total*/



    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>


    <?php
    if (!empty($errores)): ?>
      <p class='notice'>
        <?php foreach ($errores as $e): ?>
          <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
      </p>
    <?php
    elseif (!empty($mensaje)): ?>
      <p class='notice'><?= ($mensaje); ?></p>
    <?php endif; ?>

    
</body>
</html>