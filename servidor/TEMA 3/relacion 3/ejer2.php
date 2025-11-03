<?php

    /*variables*/

    $num1="";
    $num2="";
    $mensaje="";
    $errores=[];

    /*comprobar metodo del formulario*/
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        /*recoger datos*/
        $num1=trim($_POST['num1']?? "");
        $num2=trim($_POST['num2']?? "");
        $operacion=$_POST['operacion'] ?? "";

        /*validar datos*/
        if ($num1===""  || $num2===""){
            $errores="tienes que introducir los dos numeros";
        } elseif (!is_numeric($num1) || !is_numeric($num2)) {
            $errores[] = "Los valores deben ser numéricos.";
        } elseif ($operacion == "/" && floatval($num2) == 0) {
            $errores[] = "No se puede dividir entre cero.";
        }

        /*cuando no tengamos errores*/
        if (empty($errores)){

            $n1 = floatval($num1);
            $n2 = floatval($num2);
            // Realizamos la operación según el operador seleccionado
            switch ($operacion) {
                case '+':
                    $resultado = $n1 + $n2;
                    break;
                case '-':
                    $resultado = $n1 - $n2;
                    break;
                case '*':
                    $resultado = $n1 * $n2;
                    break;
                case '/':
                    $resultado = $n1 / $n2;
                    break;
            }
            $mensaje = "Resultado: $num1 $operacion $num2 = $resultado";
        }


        

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
            <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">

</head>
<body>
        <h1>calculadora</h1>
        <form name="formulario" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">1 num</label>
              <input id="firstName" name="num1" type="number" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="col">
              <label for="lastName">2 num</label>
              <input id="lastName" name="num2" type="number" placeholder="Ingresa tu apellido" required>
            </div>
          </div>

    
          <!-- Acciones -->
          <div class="actions">
            <input type="submit" name="operacion" value="+">
            <input type="submit" name="operacion" value="-">
            <input type="submit" name="operacion" value="*">
            <input type="submit" name="operacion" value="/">
          </div>
    
        </form>

        <!-- errores -->

        <?php
        if (!empty($errores)): ?>
            <p class='notice'>
                <?php foreach ($errores as $e): ?>
                    <?= htmlspecialchars($e) ?><br>
                <?php endforeach; ?>
            </ul>
            </p>
        <?php
        elseif (!empty($mensaje)): ?>
            <p class='notice'><?= htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
    
</body>
</html>