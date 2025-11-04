<?php


    /*variables*/

    $mensaje="";
    $errores=[];


    $nombre="";
    $contraseña="";


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
        $contraseña =$_POST['contraseña'] ?? "";

        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($nombre === "" || $contraseña === "") {
            $errores[]= "los campos deben estar llenos";

        }else{
            
            $archivo=fopen("usuarios.csv", "r"); /*abre archivo para escritura y lectura*/
            $usuarioEncontrado=false;
            $lineas=[];

            while(($linea=fgetcsv($archivo))!==false){
                if($linea[0] === $nombre && $linea[1]=== $contraseña){
                    $usuarioEncontrado=true;
                    $linea[2]++;

                }

                $lineas[]=$linea;
            }

            fclose($archivo);

            if(!$usuarioEncontrado){
                $errores[]="no coincide nombre y usuario";
            }

    }

            // 3)Cuando no hay errores
            if (empty($errores)) {


                $archivo=fopen("usuarios.csv", "w"); /*abre archivo para escritura y lectura*/

            
                foreach($lineas as $linea){
                    fputcsv($archivo, $linea);
                }

            

                fclose($archivo);


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
     <form action="" method="post">

    <p>nombre</p>
    <input type="text" name="nombre">
    <?php
    if (!empty($errores['nombre'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['nombre']) ?>
        </p>
    <?php endif; ?>


    <p>contraseña</p>
    <input type="password" name="contraseña">
    <?php
    if (!empty($errores['contraseña'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['contraseña']) ?>
        </p>
    <?php endif; ?>


    <input type="submit" name="enviar">




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