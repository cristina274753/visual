<?php

    $fichero=[];
    $mensaje="";
    $errores=[];
    $rutaImagen="img/";
    $rutaFichero="";

    if($_SERVER['REQUEST_METHOD']==="POST" ) {
        
        $fichero = $_FILES['fichero_imagen'];
        
        if($fichero['error'] !== UPLOAD_ERR_OK){
            $errores[]="Error al subir el fichero";
        } else {
            $tipo = $fichero['tmp_name'];
            $tamayo = $fichero['size'] / (1024 * 1024); //tamaño en MB
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/jpg'];


            //validaciones

            if(!in_array($fichero['type'], $tiposPermitidos)){
                $errores[]="El tipo de fichero no es válido";

            }elseif($tamayo > 1 ){
                $errores[]="El tamaño del fichero es mas grande que lo permitido";
            } 
            
            
            if(empty($errores)){
                $rutaFichero = $rutaImagen . basename($fichero['name']);
                if(move_uploaded_file($fichero['tmp_name'], $rutaFichero)){
                    echo "Fichero subido correctamente";

                } else {
                    $errores[]="Error al mover el fichero a la carpeta destino";
                }
            }
        }

        if(!empty($errores)){
            foreach($errores as $error){
                echo "<p >$error</p>";
            }
        }

        if($rutaFichero !=""){
            echo "<h2>Imagen:</h2>";
            echo "<img src='$rutaFichero' alt='imagen subida' width='300'>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ficheros</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

    <input type="file" name="fichero_imagen" id="fichero_imagen">
    <input type="submit" value="Subir imagen">

    </form>


</body>
</html>