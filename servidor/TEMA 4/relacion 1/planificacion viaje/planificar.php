<?php

    session_start();
    

    if(!isset($_SESSION['viaje'])){

        header('Location: index.php');
        exit;
    }


    //echo "<h1>Planificanto tu viaje a: ".$viaje['destino'] ."</h1>";

    



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

        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">nueva actividad</label>
              <input id="actividad" name="actividad" type="text" placeholder="Ingresa tu nombre" required>
            </div>
    
          <!-- Select -->
          <div style="margin-top:1rem">
            <label for="dias">Dias</label>
            <select id="dia" name="dia" required>
              <option value="">Selecciona un dia</option>


              <option value="es">España</option>
              <option value="mx">México</option>
              <option value="ar">Argentina</option>
              <option value="us">Estados Unidos</option>
            </select>
          </div>
    
          
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="resetear">
          </div>
    
        </form>
    
    
</body>
</html>