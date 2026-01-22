<?php

    session_start();


$mensaje="";
$errores=[];

$nombre="";
$p1="";
$p2="";


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
       
        $p2 = htmlspecialchars(trim($_POST['p2'] ?? ""));
        $nombre = $_SESSION['usuario'];



        if($p2==""){

            header("Location: p2.php");
            exit();
        }

        //guardar en sesion el usuario
        $_SESSION['p2']=$p2;

    


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
    <h1>bienvenido <?php echo $_SESSION['usuario'] ?>, esta es la pregunta 3</h1>

        <h2>Preguntas</h2>
        <form name="myForm" action="resultados.php" method="post">
    
          <!-- Radios / Checkboxes -->
          <fieldset style="margin-top:1rem; border:none; padding:0">
            <legend>ciudad favorito</legend>
            <label><input type="radio" name="p3" value="malaga"> malaga</label>
            &nbsp;
            <label><input type="radio" name="p3" value="cadiz"> cadiz</label>
            &nbsp;
            <label><input type="radio" name="p3" value="barcelona"> barcelona</label>
          </fieldset>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
</body>
</html>