<?php

$nombre="";
$errores=[];
$mensaje="";
$rutaFichero="palabras/";


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        $nombre = trim($_POST['nombre'] ?? "");
        $fichero = $_FILES['fichero'];
        
        // 2) Validación de datos
        // Verificamos si los campos están llenos
        if ($nombre === "" ) {
            $errores[]= "Por favor, rellena el nombre";
        } else {
            // Verificamos que el nombre tenga una longitud menor a 25
            if (strlen($nombre) > 30) {
                $errores[]= "El nombre no debe tener más de 30 caracteres.";
            }
            // Verificamos que los apellidos tengan una longitud menor a 35
            if (strlen($nombre) < 3) {
                $errores[]= "el nombre no deben tener menos de 3 caracteres.";
            }
        }


        /*archivo*/

        $extensiones= ['txt'];

        $tipo=pathinfo($fichero['name'], PATHINFO_EXTENSION);
        $tamanyo= $fichero['size'] / (1024*1024);

        /*comprobamos tamaño y extensiones*/

        if($fichero['error']!== UPLOAD_ERR_OK){
            $errores[]= "error al subir el archivo";

        }elseif(!in_array($tipo, $extensiones)){
            $errores[]="formato incorrecto";

        }elseif($tamanyo>1){
            $errores[]="error en el tamaño del fichero demasiado grande";

            /*comprobar que tenga 5 palabras*/ 
        }else{
            /*leer archivo y separar palabras por la ,*/ 
            $contenido=file_get_contents($fichero['tmp_name']);
            $palabras= explode (',', $contenido);
            $palabras= array_map('trim', $palabras);

            /*verificar si hay 5 palabras*/ 
            if(count($palabras)!==5){
                $errores[]="el archivo no tiene 5 palabras";

            }else{
                /*ver que el archivo no exista previamente*/
                $rutaFichero=$rutaFichero.$nombre.".$tipo";

                if(file_exists($rutaFichero)){
                    $errores[]="el fichero ya existe";
                }
            }
        }



         // 3)Cuando no hay errores
        if (empty($errores)) {
        
            /*guardamos el archivo */
            if(move_uploaded_file($fichero['tmp_name'], $rutaFichero)){
                $mensaje= "fichero subido con exito";

                /*ordenar palabras*/
                natcasesort($palabras);

                /*guardamos las palabras en el archivo*/
                file_put_contents($rutaFichero, implode("\n",$palabras ));

            }else{
                $errores[]="no se pudo mover el fichero";
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
    <form action="" method="post" enctype="multipart/form-data">

      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>
      
      
     <!-- subir archivo -->
        <input id="firstName" name="fichero" type="file" placeholder="Ingresa tu fichero" required>
      
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