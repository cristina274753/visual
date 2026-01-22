<?php

    session_start();


    $destino="";
    $dias="";
    $errores=[];

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {

        /* recoger datos */
        $dias = trim($_POST['dias'] ?? 0);
        $destino = htmlspecialchars(trim($_POST['destino'] ?? ""));
        
        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($destino === "" ) {
            $errores[]= "Por favor, rellena el destino.";
        } 

        if($dias<=0){
            $errores[]="debe ser un numero mayor que 0";
        }


    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        
        $_SESSION['viaje']=[
            'destino'=> $destino,
            'dias'=> $dias,
            'itinerario'=> []
        ];

        for($i=0; $i<$dias; $i++){
            $_SESSION['viaje']['itinerario']["dia_$i"]=[];
        }



        header('Location: planificar.php');
        exit;


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
        <h1>Planificador de Itinerario de Viaje</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">Destino</label>
              <input id="destino" name="destino" type="text" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="col">
              <label for="firstName">numero de dias:</label>
              <input id="destino" name="dias" type="number" placeholder="Ingresa tu nombre" required>
            </div>
          </div>

          
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
</body>
</html>