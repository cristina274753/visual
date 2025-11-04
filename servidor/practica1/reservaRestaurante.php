<?php


    const maxMesas=10;

    $mensaje="";
    $errores=[];
    
    $reservas = [
        ["nombre" => "Ana",     "personas" => 5, "exterior" => false, "hora" => "20:00"],
        ["nombre" => "Luis",    "personas" => 4, "exterior" => true,  "hora" => "21:00"],
        ["nombre" => "Marta",   "personas" => 5, "exterior" => false, "hora" => "20:30"],
        ["nombre" => "Carlos",  "personas" => 5, "exterior" => true,  "hora" => "21:15"],
        ["nombre" => "Julia",   "personas" => 6, "exterior" => false, "hora" => "20:00"],
        
    ];


    $accion=$_GET["accion"] ?? "mostrar";
    $nombre=$_GET["nombre"] ?? "";
    $personas=$_GET ["personas"] ?? "";
    $exterior = ($_GET["exterior"] ?? "false") === "true";
    $hora=$_GET["hora"]?? "20:00";


    $reserva=[];

    function realizarReserva ($nombre, $personas, $exterior=false, $hora='20:00'){

        global $reservas, $mensaje, $errores;
        $mesasOcupadas=0;



        //validar numero de personas 1-6
        if($personas<1 || $personas>6){
            $errores['numPersonas']='numero de personas invalido';
            return;
        }

        //controlar disponibilidad de mesas (mesa=4, 2mesas=6)
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
            return;
        }

        if($hora<"20:00" || $hora>"22:00"){
            $errores['hora']="hora incorrecta tiene que ser entre las 20:00 y las 22:00";
            return;
        }

    

        //controlar duplicados de reserva por cliente
        foreach($reservas as $reserva){
            
            if($reserva["nombre"]===$nombre){
                $errores["duplicado"]="este cliente ya tiene una reserva";
                return;
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

        return $mensaje;
    }



    function mostrarReservas(){

        global $reservas;
        $cont=0;

        if (empty($reservas)) {
        $errores["reservas"] = "No existe ninguna reserva";
        return;
    }

        $mesasOcupadas = 0;
        foreach ($reservas as $reserva) {
            if ($reserva["personas"] <= 4) {
                $mesasOcupadas += 1;
            } else {
                $mesasOcupadas += 2;
            }
        }

        //reservas en una tabla 

        echo "<h2>Listado de reservas </h2>".
                    "<table> ".
                    "<tr><th>Nº</th><th>NOMBRE</th><th>PERSONAS</th><th>EXTERIOR</th><th>HORA</th></tr>";

                    
        foreach($reservas as $reserva){

            if($reserva['exterior']===true){

                $exteriorSiNo= "si";

            }else{
                $exteriorSiNo="no";
            }

            $cont++;

            echo "<tr><td>$cont</td><td>{$reserva['nombre']}</td><td>{$reserva['personas']}</td><td>$exteriorSiNo</td><td>{$reserva['hora']}</td></tr>";
                
        }

        echo "</table>";
        echo "<p>mesas ocupadas: $mesasOcupadas/10 </p>";

        return ;

    }

    function cancelarReservas ($nombre){
        
        global $reservas, $mensaje, $errores, $personas;

        $encontrada=false;

        //elimina la reserva del cliente si existe 

        foreach($reservas as $i=>$reserva){

            if($reserva["nombre"]===$nombre){
                unset($reservas[$i]);
                $mensaje.= "reserva cancelada de $nombre";
                $encontrada=true;
                return $mensaje;

            }
        }

        if($encontrada===false){
            $errores['cancelar']= "No existe ninguna reserva a nombre de $nombre";
        }

    }

    switch($accion){

        case "reservar":

            if ($nombre && $personas) {
                realizarReserva( $nombre, intval($personas), $exterior, $hora);
            } else {
                $errores['reserva']= "Faltan parámetros obligatorios (nombre y personas)";
            }
            break;

        case "cancelar":
            
            if ($nombre) {
                cancelarReservas($nombre);
            } else {
                $errores['reserva']="Debes indicar el nombre del cliente para cancelar";
            }
            break;

        case "mostrar":
            $mensaje= "Mostrando todas las reservas actuales:";
            break;

        default:
            $errores['parametro']= "no se recibe los parametros correcto. error generico";
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

    echo mostrarReservas($reservas);

    if (!empty($errores)): ?>
      <p class='notice' style="background-color: #fdbebeff; color: #ff0000">
        <?php foreach ($errores as $e): ?>
          <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
      </p>
    <?php
    elseif (!empty($mensaje)): ?>
      <p class='notice' style="background-color: #c4d5ffff; color: #0051ff"><?= ($mensaje); ?></p>
    <?php endif; ?>
</body>
</html>