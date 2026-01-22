<?php

    session_start();


     if (!isset($_SESSION['nombre'])){
        //si no existe la variable de sesión del usuario
        header("Location: index.php");
        exit();
    }




    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['volver'])) {

    
    //destruimos todas las variables de sesión
        session_unset();
        session_destroy();

        header("Location: index.php");
        exit();
    }

    //guardar en archivo txt
    $linea= $_SESSION['nombre']. " - ". $_SESSION['puntos']. " puntos - ". $_SESSION['aciertos']. " aciertos - ". date("Y-m-d"). PHP_EOL;

    //guadar archivo - FILE_APPEND para añadir al final
    file_put_contents("registro.txt", $linea, FILE_APPEND);

   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Info jugador: <?php echo $_SESSION['nombre']; ?></h1>

    <p>Puntuacion total:  <?php echo $_SESSION['puntos']; ?></p>
    <p>aciertos:  <?php echo $_SESSION['aciertos']; ?></p>
    <p>fallos:  <?php echo $_SESSION['fallos']; ?></p>


    <form name="myForm" action="" method="post">
      <!-- Acciones -->
      <div class="actions" style="margin-top:1rem">
        <input type="submit" name="volver" value="volver">
      </div>
    </form>

    
</body>
</html>