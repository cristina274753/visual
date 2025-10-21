<?php

    $nombre="";
    $fichero=[];
    $mensaje="";
    $errores=[];
    $ruta="palabras/";
    $rutaFichero="";

    if($_SERVER['REQUEST_METHOD']==="POST" ) {

        $nombre = ($_POST['nombre'] ?? "");
        $fichero = $_FILES['fichero'];


        
        if($fichero['error'] !== UPLOAD_ERR_OK){
            $errores[]="Error al subir el fichero";
        } else {
            $tamayo = $fichero['size'] / (1024 * 1024); //tamaño en MB


            //validaciones

            //nombre entre 3-30
            if (strlen($nombre) < 3 || strlen($nombre) > 30) {
                $errores["nombre"]= "tiene que tener entre 3 y 30 caracteres";
            }

            //fichero tipo txt
            $ext= strtolower(pathinfo($_FILES["fichero"]["name"], PATHINFO_EXTENSION));
            
            if ($ext!="txt"){
                $errores["fichero"]="El tipo de fichero no es válido";
            
            //fichero de tamaño 
            }elseif($tamayo > 1 ){
                $errores[]="El tamaño del fichero es mas grande que lo permitido";
            } 
            
           
            if(empty($errores)){
                $rutaFichero = $ruta . basename($fichero['name']);
                if(move_uploaded_file($fichero['tmp_name'], $rutaFichero)){
                    echo "Fichero subido correctamente <br>";

                    $contenido=file_get_contents($rutaFichero);

                    $palabras=explode(",", $contenido);

                    if (count($palabras)==5){
                        echo "tiene 5 palabras: <br>";
                        echo $contenido;
                        
                    }else {
                        echo "no tiene 5 palabras";
                    }


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


        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archivos</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

    <input type="text" name="nombre" id="nombre">
    <?php
        if(!empty($errores)){
            foreach($errores as $error){
                echo "<p >$error</p>";
            }
        }
    ?>
    <input type="file" name="fichero" id="fichero">
    <input type="submit" value="Guardar">

    </form>


</body>
</html>