<?php

    $error="";
    $notas=[$_GET["notas"]];

    if (isset($_GET['notas']) && !empty($_GET['notas'])) {
        $notas=explode(",",$_GET["notas"]);

        foreach($notas as $nota){

        if($nota<0 || $nota>10){
            $error= "nota no valida";
            break;
        }

         if ($nota >= 5) {
            $cantidadAprobadas++; // Incrementar contador de aprobadas
        } else {
            $cantidadSuspendidas++; // Incrementar contador de suspendidas
        }

    }

    if (isset($error)) {
        echo $error;
    }else{
        $media = calcularMedia($notas);

        $mensajes .= "Media de las notas: " . number_format($media, 2) . "<br>"; 

        if ($media >= 5) {
            $mensajes .= "El grupo ha aprobado.<br>";
        } else {
            $mensajes .= "El grupo ha suspendido.<br>";
        }

        $mensajes .= "Notas aprobadas: $cantidadAprobadas<br>";
        $mensajes .= "Notas suspendidas: $cantidadSuspendidas<br>";
    }
    

    }

    function calcularMedia($notas)  {
        
        $media=0;
        $mensaje="";

        foreach($notas as $nota){
            $media+=$nota;
        }

        $mensaje=$media/count($notas);

        return $mensaje;

    }





    
    

?>