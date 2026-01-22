


<?php

/*TODO no entiendo este ejrcicio*/

        $tareas=[];
        $errores=[];
        $mensaje="";

        /* comprobar método del formulario */
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['enviar']=="enviar") {
            
            /* recoger datos */
            $tarea = $_POST['tarea'] ?? "";
            $array_serializado=$_POST["tarea_serializado"] ?? "";
            $tareas=unserialize($array_serializado);

            if (!is_array($tareas)){
                $tareas=[];
            }

            // 2) Validación de datos
            // Verificamos si los campos están llenos
            if ($tarea === "") {
                $mensaje= "Por favor, rellena los campos.";
            } elseif (in_array($tarea, $tareas)) {
                $mensaje= "la tarea ya existe";
                
            }else{
                $tareas[]=$tarea;
            }

        }

        if (empty($tareas)){
            $mensaje="no hay tareas";
        }

        $tareas_serializado=serialize($tareas);

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
        <h1>Registrar Tareas</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">Nombre</label>
              <input id="tarea" name="tarea" type="text" placeholder="Ingresa tu tarea" required>
              <input type="hidden" name="tarea_serializado" id="tarea_serializado" value="<?php echo (htmlspecialchars($tareas_serializado ?? '')); ?>">

            </div>
          </div>
    
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="enviar">
            <input type="submit" name="enviar" value="eliminar">

          </div>
    
        </form>

        <h2>Tareas registradas</h2>

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


        <ol>
        <?php foreach ($tareas as $t): ?>
            <li class='notica'><?= htmlspecialchars($t); ?></li>
        <?php endforeach; ?>
        </ol>

    
</body>
</html>