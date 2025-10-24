<?php

    $nombre="";
    $contraseña="";
    $errores=[];


    if($_SERVER['REQUEST_METHOD']==="POST" ){

            //validar que no este vacio
        if (empty(trim($_POST['nombre']))) {
            $errores[]="Error, debes escribir un nombre";
        
        }else{
            $nombre = trim($_POST['nombre']);
        }


        if (empty(trim($_POST['contraseña']))) {
            $errores[]="Error, debes escribir una contraseña";
        }else{
            $contraseña = trim($_POST['contraseña']);
        }



        if(empty($errores)){
                
            $archivo="usuarios.csv";
            $manejar=@fopen($archivo, "r+");

            if($manejar){

                while (!feof($manejar)){
                
                    $linea=fgets($manejar);

                    $usuarios=explode(",", $linea);

                    if ($usuarios[0]===$nombre && $usuarios[1]===$contraseña){
                        fopen($archivo, $usuarios[2]=$usuarios[2]+1);
                        fclose($manejar);

                        echo "<p>exito al autentificarse</p>";

                    }else{

                        $errores[]="usuarios o contraseña incorrecta";
                    }
                }


            }else{
                $errores[]="error al abrir el archivo";
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <p>nombre del usuario</p>
    <input type="text" name="nombre">

    <p>contraseña</p>
    <input type="password" name="contraseña">

    <input type="submit" value="enviar">

    </form>
</html>