<?php

     //inciamos la sesión
    session_start();

    $mensaje="";
    $errores=[];

    $nombreUsuario="";
    $contrasena="";

     $basedatos =[
        "pepe" => '1234',
        "juan" => '0000',
        "ana" => '1111'
    ];


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
     
        $nombreUsuario = htmlspecialchars(trim($_POST['nombre'] ?? ""));
        $contrasena = htmlspecialchars(trim($_POST['contrasena'] ?? ""));

        if ($nombreUsuario===''){
            $errores['usuario']="Usuario es requerido";
        }
        if ($contrasena===''){
            $errores['password']="Password es requerido";
        }

        // 3)Cuando no hay $errores
        if (empty($errores)) {

            //si esl usuario y passwd es correcto
            if (isset($basedatos[$nombreUsuario]) && $basedatos[$nombreUsuario]==$contrasena){
                $mensaje = "Usuario autentificado";

                //guardar en sesion el usuario
                $_SESSION['usuario']=$nombreUsuario;

                header("Location: bienvenida.php");
                exit();
            }else{
                $mensaje = "Usuario y password incorrectos";  
            }
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
    
    <h1>Login</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre usuario</label>
          <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
        </div>
        <div class="col">
          <label for="contrasena">Contraseña</label>
          <input id="contrasena" name="contrasena" type="text" placeholder="Ingresa tu apellido" required>
        </div>
      </div>

      <!-- Acciones -->
      <div class="actions" style="margin-top:1rem">
        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="reset" value="resetear">
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