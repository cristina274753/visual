<?php


    $mensaje="";
    $errores=[];

    $nombre="";
    $fichero=[];
    $rutaImagen='img/';
    $rutaFichero='';

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /*recoger datos*/
        $nombre=htmlspecialchars(trim($_POST['nombre'] ?? ''));
        $fichero=$_FILES['fichero'];

        /*validar datos*/
        if ($nombre==='' || strlen($nombre) < 3 || strlen($nombre) > 30) {
            $errores['nombre'] = "El nombre del archivo debe tener entre 3 y 30 caracteres.";
        }


        if ($fichero['error'] !== UPLOAD_ERR_OK) {
            $errores['fichero_imagen'] = "Error al obtener el fichero";

        }else{

            $tipo=pathinfo($fichero['name'],PATHINFO_EXTENSION); /*te muestra solo la extension*/
            $tamanyo= $fichero['size'] /(1024*1024);


            if($tipo!== 'txt'){
                $errores['fichero_imagen']='error no tiene formato valido';

            }elseif($tamanyo>1){
                $errores['size']='tamaño no valido';

            }else{
                /*leer contenido fichero*/
                $contenido=file_get_contents($fichero['tmp_name']);
                $palabras= explode(',', $contenido); /*separa las palabras entre comas*/
                $palabras=array_map('trim', $palabras);/*elimina espacios alrededor*/ 

                if(count($palabras)!==5){
                    $errores['numPalabras']='error en el numero de palabras';
                }else{
                    $rutaFichero=$rutaImagen. $nombre.".txt";

                    if(file_exists($rutaFichero)){
                        $error['duplicado']="el fichero ya esta subido";
                    }

                }


            }

            // 3)Cuando no hay errores
            if (empty($errores)) {
                

                if(move_uploaded_file($fichero["tmp_name"], $rutaFichero)){
                    $mensaje= "fichero subido";

                    /*ordenarlas y guardarlas en el archivo*/
                    natcasesort($palabras);
                    file_put_contents($rutaFichero, implode("\n", $palabras));

                }else{
                    $mensaje= "error al subir el fichero";
                }
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
        <h1>Título del formulario</h1>
        <form name="myForm" action="" method="post" enctype="multipart/form-data">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">Nombre</label>
              <input id="firstName" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
          </div>
    
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