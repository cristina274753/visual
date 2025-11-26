<?php

    session_start();


$mensaje="";
$errores=[];

$nombre="";

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
       
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));


        if($nombre==""){

            header("Location: login.php");
            exit();
        }

        //guardar en sesion el usuario
        $_SESSION['usuario']=$nombre;

    


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
    <h1>bienvenido <?php echo $_SESSION['usuario'] ?></h1>

        <h2>Preguntas</h2>
        <form name="myForm" action="p2.php" method="post">
    
          <!-- Radios / Checkboxes -->
          <fieldset style="margin-top:1rem; border:none; padding:0">
            <legend>color favorito</legend>
            <label><input type="radio" name="p1" value="rojo"> rojo</label>
            &nbsp;
            <label><input type="radio" name="p1" value="azul"> azul</label>
            &nbsp;
            <label><input type="radio" name="p1" value="verde"> verde</label>
          </fieldset>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
</body>
</html>