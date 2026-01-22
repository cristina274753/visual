<?php

    $num="";
    $errores=[];
    $mensaje="";

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        $num = trim($_POST['num'] ?? "");
        

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($num === "") {
            $mensaje .= "Por favor, rellena todos los campos.";
        }

        // 3)Cuando no hay $errores
        if (empty($errores)) {

            $mensaje= "<div class='notice'> <h3>tabla del numero: $num</h3>";

            for ($i=0; $i <=10; $i++) { 
                $resultado=$i * $num;
                $mensaje.="<p> $i x $num= $resultado</p>";
            }
            $mensaje.="</div>";
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
    
    <h1>tabla multiplicar</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="firstName">numero</label>
          <input id="firstName" name="num" type="number" placeholder="Ingresa un numero" required>
        </div>
    

      <!-- Acciones -->
      <div class="actions" style="margin-top:1rem">
        <input type="submit" name="enviar" value="Enviar">
      </div>

    </form>

    <?php
    if (!empty($errores)): ?>
      <p class='notice'>
        <?php foreach ($errores as $E): ?>
          <?= htmlspecialchars($E) ?><br>
        <?php endforeach; ?>
      </p>
    <?php
    elseif (!empty($mensaje)): ?>
      <?= ($mensaje); ?></p>
    <?php endif; ?>

</body>
</html>