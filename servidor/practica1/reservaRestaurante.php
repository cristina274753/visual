<?php

//url --> get 
    const maxMesas=10;

    $mensaje="";
    $errores=[];
    $reservas = [
        ["nombre" => "Ana",     "personas" => 2, "exterior" => false, "hora" => "20:00"],
        ["nombre" => "Luis",    "personas" => 4, "exterior" => true,  "hora" => "21:00"],
        ["nombre" => "Marta",   "personas" => 3, "exterior" => false, "hora" => "20:30"],
        ["nombre" => "Carlos",  "personas" => 5, "exterior" => true,  "hora" => "21:15"],
        ["nombre" => "Julia",   "personas" => 6, "exterior" => false, "hora" => "20:00"],
        
    ];


    $accion=$_GET["accion"] ?? "mostrar";
    $nombre=$_GET["nombre"] ?? null;
    $personas=$_GET ["personas"] ?? null;
    $exterior=$_GET["exterior"] ?? false; //opcional true o false
    $hora=$_GET["hora"]?? "20:00";


    $reserva=[];

    function realizarReserva ($nombre, $personas, $exterior=false, $hora='20:00'){

        global $reservas, $mensaje, $errores;


        //validar numero de personas 1-6
        if($personas<1 || $personas>6){
            $errores['numPersonas']='numero de personas invalido';
            return;
        }

        //controlar disponibilidad de mesas (mesa=4, 2mesas=6)
        $mesasOcupadas=0;
        foreach($reservas as $reserva){

            if($reserva["personas"]<=4){
                $mesasOcupadas+=1;
            }else{
                $mesasOcupadas+=2;
            }
        }

        if($personas<=4){
            $mesasNecesarias=1;
        }else{
            $mesasNecesarias=2;
        }

        if($mesasOcupadas+$mesasNecesarias>maxMesas){
            $errores["mesasNODisponibles"]="no hay mesas disponibles";
        }

        //controlar duplicados de reserva por cliente
        foreach($reservas as $reserva){
            
            if($reserva["nombre"]===$nombre){
                $errores["duplicado"]="este cliente ya tiene una reserva";
            }
        }

        //actualizar reserva
        $reservas[]=[
            "nombre"=> $nombre,
            "personas"=> $personas,
            "exterior"=> $exterior,
            "hora"=> $hora
        ];

        $mensaje.= "reserva realizada correctamente para $nombre";
    }

    function mostrarReservas($reservas){

        global $reservas;

        $mesasOcupadas = 0;
        foreach ($reservas as $reserva) {
            if ($reserva["personas"] <= 4) {
                $mesasOcupadas += 1;
            } else {
                $mesasOcupadas += 2;
            }
        }
        //reservas en una tabla 

        $mensaje= "<h2>Listado de reservas </h2>".
                    "<table> ".
                    "<tr><th>cliente</th><th>personas</th><th>exterior</th><th>hora</th></tr>";

            foreach($reservas as $reserva){
                $mensaje.= "<tr><td>{$reserva['nombre']}</td><td>{$reserva['personas']}</td><td>{$reserva['exterior']}</td><td>{$reserva['hora']}</td></tr>";
                
            }

        $mensaje.="</table>";
        $mensaje.= "<p>mesas ocupadas: $mesasOcupadas/10 </p>";

        return $mensaje;

    }

    function cancelarReservas ($reservas, $nombre){
        
        global $reservas, $mensaje, $errores;

        $encontrada=false;

        //elimina la reserva del cliente si existe 

        foreach($reservas as $i=>$reserva){

            if($reserva["nombre"]===$nombre){
                unset($reservas[$i]);
                $mensaje.= "<p> reserva cancelada de $nombre </p>";
                $encontrada=true;
                return;

            }
        }

        if($encontrada===false){
            echo "<p>No existe ninguna reserva a nombre de $nombre</p>";
        }

    }

    switch($accion){

        case "reservar":

            echo "<p>Mostrando todas las reservas actuales:</p>";
            echo mostrarReservas($reservas);

            if ($nombre && $personas) {
                realizarReserva( $nombre, intval($personas), $exterior, $hora);
            } else {
                echo "<p style='color:red;'>❌ Faltan parámetros obligatorios (nombre y personas).</p>";
            }
            break;

        case "cancelar":
            echo "<p>Mostrando todas las reservas actuales:</p>";
            echo mostrarReservas($reservas);
            if ($nombre) {
                cancelarReservas($reservas, $nombre);
            } else {
                echo "<p style='color:red;'>❌ Debes indicar el nombre del cliente para cancelar.</p>";
            }
            break;

        case "mostrar":
            echo "<p>Mostrando todas las reservas actuales:</p>";
            echo mostrarReservas($reservas);
            break;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservas</title>
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