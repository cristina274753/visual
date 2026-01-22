<?php

    $texto="";
    $mensaje="";
    $errores=[];

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        $texto = htmlspecialchars(trim($_POST['texto'] ?? ""));

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($texto === "") {
            $errores ['texto']= "Por favor, rellena los campos.";
        }elseif (strlen($texto)>500) {
            $errores['texto']="muy largo ";
        }

        // 3)Cuando no hay $errores
        if (empty($errores)) {

            $longitud=strlen($texto);
            $numPalabras=str_word_count($texto);
            $numLineas= substr_count($texto, "\n") +1;
            $numEspacios= substr_count($texto, ' ');

            $frecuenciaVocales=[
                'a'=> substr_count(strtolower($texto), 'a'),
                'e' => substr_count(strtolower($texto), 'e'),
                'i' => substr_count(strtolower($texto), 'i'),
                'o' => substr_count(strtolower($texto), 'o'),
                'u' => substr_count(strtolower($texto), 'u')
            ];

            $porcentajeEspacios= ($numEspacios/$longitud) * 100;

            $mensaje= "el texto tiene: <br>".
                        "longitud= $longitud<br>".
                        "numero de palabras: $numPalabras<br>".
                        "numero de lineas: $numLineas<br>".
                        "numero de espacios: $numEspacios<br>".
                        "frecuencia de las vocales: <br>".
                        "   a= $frecuenciaVocales[a]<br>".
                        "   e= $frecuenciaVocales[e]<br>".
                        "   i= $frecuenciaVocales[i]<br>".
                        "   o= $frecuenciaVocales[o]<br>".
                        "   u= $frecuenciaVocales[u]<br>".
                        "porcentaje de espacios: $porcentajeEspacios %";

            
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
        <h1>texto</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Textarea -->
          <div style="margin-top:1rem">
            <label for="message">$mensaje</label>
            <textarea id="message" name="texto" rows="4" placeholder="Escribe tu $mensaje..."></textarea>
            <?php
                if(!empty($errores["texto"])){
                    echo '<p>' . htmlspecialchars($errores["texto"]) . '</p>';
                }
            ?>
          </div>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
        
        <?php
        if (!empty($mensaje)): ?>
          <p class='notice'><?= ($mensaje); ?></p>
        <?php endif; ?>
</body>
</html>