<?php

    $estilos = [
    'narrativo' => [
        'Había una vez en un reino muy lejano...',
        'El héroe se lanzó a la batalla sin dudarlo...',
        'Aquella noche, el viento silbaba entre los árboles...'
    ],
    'poetico' => [
        'El viento susurra, la luna brilla...',
        'Entre el mar y la arena, danzan las estrellas...',
        'La vida es un suspiro, un breve instante...'
    ],
    'ensayo' => [
        'El arte es una manifestación de la cultura humana...',
        'La historia nos enseña que la repetición de $errores es común...',
        'La tecnología ha transformado nuestra sociedad en múltiples formas...'
    ]
];

    $color="";
    $fuente="";
    $estilo="";
    $mensaje="";
    $errores=[];

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['enviar'])) {
        
        /* recoger datos */
        $color = htmlspecialchars(trim($_GET['color'] ?? ""));
        $fuente = htmlspecialchars(trim($_GET['fuente'] ?? ""));
        $estilo = htmlspecialchars(trim($_GET['estilo'] ?? ""));

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($color === "" || $fuente === "" || $estilo==="") {
            $mensaje .= "Por favor, rellena todos los campos.";
        }

        // 3)Cuando no hay $errores
        if (empty($errores)) {

            $indice=array_rand($estilos[$estilo]);

            $texto= $estilos[$estilo][$indice];

            $mensaje = 
                        "<p class='notice' style= 'background-color: $color; font-family: $fuente;'>texto: <br> $texto </p>";
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
        <h1>Título del formulario</h1>
        <form name="myForm" action="" method="get">
    
          <!-- Select -->
          <div style="margin-top:1rem">
            <label for="country">color</label>
            <select id="country" name="color" required>
              <option value="#e69691">rojo</option>
              <option value="#98a9ed">azul</option>
              <option value="#9df5b4">verde</option>
            </select>

            <label for="country">fuente</label>
            <select id="country" name="fuente" required>
              <option value="Arial">arial</option>
              <option value="Verdana">verdana</option>
              <option value="Courier">courier</option>
            </select>

            <label for="country">estilo</label>
            <select id="country" name="estilo" required>
              <option value="narrativo">narrativo</option>
              <option value="poetico">poetico</option>
              <option value="ensayo">ensayo</option>
            </select>
          </div>
    
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>

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