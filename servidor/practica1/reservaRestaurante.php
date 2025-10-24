<?php

//url --> get 
    $accion="";
    $nombreCliente="";
    $numPersonas="";
    $exterior=""; //opcional true o false
    $horaReserva="";


    $reserva=[];

    function realizarReserva ($nombreCliente, $numPersonas, $exterior=false, $horaReserva='20:00'){

        //validar numero de personas 1-6

        //controlar disponibilidad de mesas (mesa=4, 2mesas=6)

        //controlar duplicados de reserva por cliente

        //actualizar reserva
    }

    function mostrarReservas(){
        //reservas en una tabla 

        //indica el numero de mesas ocupadas 

    }

    function cancelarReservas ($nombreCliente){
        //elimina la reserva del cliente si existe 

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservas</title>
</head>
<body>
    
</body>
</html>