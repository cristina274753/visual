<?php


    $mensaje="";
    $errores=[];

    $longitud="";
    $numeros=false;
    $minusculas=false;
    $mayusculas=false;
    $especiales=false;
    $caracteres="";


    function char_aleatorio($cadena)  {
        
        $arrCadena=str_split($cadena); /*divide la cadena en partes al array*/
        $caracter=$arrCadena[array_rand($arrCadena)];
        return $caracter;
    }



    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        $longitud = intval($_POST['longitud'] ?? "");
        $numeros = isset($_POST['numeros']) ? true : false;
        $minusculas = isset($_POST['minusculas']) ? true : false;
        $mayusculas = isset($_POST['mayusculas']) ? true : false;
        $especiales = isset($_POST['especiales']) ? true : false;

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($longitud<8 || $longitud>16) {
        $errores["longitud"]= "Por favor, la longitud debe ser mayor.";
        }elseif (!($numeros || $minusculas || $mayusculas || $especiales)) {
            $errores['incluir'] = "debes marcar uno de los checkbox para generar la contraseña";
        }

        // 3)Cuando no hay$errores
        if (empty($errores)) {
            
            if($numeros){
                $caracteres.="0123456789";
                $mensaje.=char_aleatorio("0123456789"); /*para que tenga al menus 1 de cada tipo*/

            }
            if ($minusculas) {
                $caracteres .= "abcdefghijklmnopqrstuvwxyz";
                $mensaje .= char_aleatorio("abcdefghijklmnopqrstuvwxyz");
            }
            if ($mayusculas) {
                $caracteres .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $mensaje .= char_aleatorio("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
            }
            if ($especiales) {
                $caracteres .= "!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
                $mensaje .= char_aleatorio("!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~");
            }

            for ($i=strlen($mensaje); $i <$longitud ; $i++) { 

                $mensaje.= char_aleatorio($caracteres);

            }

            $mensaje=str_shuffle($mensaje);  /*para mezclar las letras*/



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
        <h1>contraseña</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">longitud</label>
              <input id="firstName" name="longitud" type="number" placeholder="Ingresa tu nombre" required>
            </div>
          </div>

          <legend>mayusculas minusculas</legend>
            <label><input type="radio" name="mayusculas" value="mayusculas"> mayusculas</label>
            &nbsp;
            <label><input type="radio" name="minusculas" value="minusculas"> minusculas</label>
            &nbsp;
            <label><input type="radio" name="numeros" value="numeros"> numeros</label>
            &nbsp;
            <label><input type="radio" name="especiales" value="especiales"> especiales</label>
    
    
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
          <p class='notice'><?= htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
    
</body>
</html>