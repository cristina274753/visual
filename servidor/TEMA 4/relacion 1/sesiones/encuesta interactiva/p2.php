<?php

    session_start();


$mensaje="";
$errores=[];

$nombre="";
$p1="";


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
       
        $p1 = htmlspecialchars(trim($_POST['p1'] ?? ""));
        $nombre = $_SESSION['usuario'];



        if($p1==""){

            header("Location: p1.php");
            exit();
        }

        //guardar en sesion el usuario
        $_SESSION['p1']=$p1;

    


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
    <h1>bienvenido <?php echo $_SESSION['usuario'] ?>, esta es la pregunta 2</h1>

        <h2>Preguntas</h2>
        <form name="myForm" action="p3.php" method="post">
    
          <!-- Radios / Checkboxes -->
          <fieldset style="margin-top:1rem; border:none; padding:0">
            <legend>equipo favorito</legend>
            <label><input type="radio" name="p2" value="betis"> betis</label>
            &nbsp;
            <label><input type="radio" name="p2" value="sevilla"> sevilla</label>
            &nbsp;
            <label><input type="radio" name="p2" value="madrid"> madrid</label>
          </fieldset>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
          </div>
    
        </form>
    
</body>
</html>