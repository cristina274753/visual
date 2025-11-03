<?php

    $celsius="";
    $fahrenheit = "";
    $mensaje="";    

    /*verificar envio de formulario y campo obligatorio*/
    if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
        // 1) recogida de y saneado de datos
        $celsius = htmlspecialchars(trim($_GET['celsius'] ?? ""));
       
        // 2) validación de datos
        if ($celsius === ""){
            $mensaje = "Error al recibir parámetros";
        }elseif(!is_numeric($celsius)){
            $mensaje = "Debes introducir un valor numérico";
        }else{
            //no hay error:
            $celsius = floatval($celsius);
            $fahrenheit = ($celsius * 9 / 5) + 32;
            $mensaje="<h3>Resultado: ".$celsius."°C son ".$fahrenheit." °F</h3>";
        }
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
    <?=$mensaje;?>  
        <p><a href="e1_formulario_get.php">volver</a></p>
</body>
</html>