<?php

    $fichero="";
    $mensaje="";
    $errores=[];
    $ruta="img/";
    $rutaFichero="";

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        
        $fichero =$_FILES['fichero'];


        if ($fichero['error'] !== UPLOAD_ERR_OK) {
            $errores['fichero'] = "Error al obtener el fichero";
        }else{

            $tipo=$fichero['type'];
            $tamanyo=$fichero['size'] / (1024*1024);

            $formatoPermitidos=['image/jpg', 'image/jpeg', 'image/png'];

            if (!in_array($tipo, $formatoPermitidos)){
                $errores[]= "el fichero no es una imagen permitida";

            }elseif($tamanyo>1){
                $errores[]='tamaño demasiado grande';
            }
        }


        // 3)Cuando no hay $errores
        if (empty($errores)) {
           
            $rutaFichero=$ruta.basename($fichero["name"]);

            if(move_uploaded_file($fichero["tmp_name"], $rutaFichero)){
                $mensaje="fichero subido";
            }else{
                $mensaje= "fichero no se ha podido subir";
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
        <h1>subir archivos</h1>
        <form name="myForm" action="" method="post" enctype="multipart/form-data">
    
            <input type="file" name="fichero" id="fichero_imagen">

    
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