<?php

session_start();

// Vacía todas las variables
//$_SESSION = [];

// Destruye la sesión
//session_destroy();

//variables
$dias=0;
$destino="";
$itinerarioDias=[];

$errores=[];
$mensaje="";

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $dias = intval($_POST['dias'] ?? 0);
    $destino = htmlspecialchars(trim($_POST['destino'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($destino === "") {
        $errores[]= "Por favor, rellena todos los campos.";
    }

    if($dias<=0){
        $errores[]="los dias deben ser mayor que 0";
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {

        for($i=1; $i<=$dias; $i++){
            $itinerarioDias["dia $i"] = [];
        }
       
        $_SESSION['viaje']=[

            'destino'=> $destino,
            'dias'=> $dias,
            'itinerario'=> $itinerarioDias

        ];

        header("Location: planificar.php");
        exit();


    }
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
        <h1>Viaje</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="destino">Destino</label>
              <input id="destino" name="destino" type="text" placeholder="Ingresa tu destino" required>
            </div>
            <div class="col">
              <label for="dias">dias</label>
              <input id="dias" name="dias" type="text" placeholder="Ingresa numero de dias" required>
            </div>
          </div>
    
          
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="resetear">
          </div>
    
        </form>
    
</body>
</html>