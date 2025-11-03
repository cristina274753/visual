<?php 

    $nombre="";
    $apellidos="";
    $fecha="";
    $genero="";
    $curso="";

    $preferencia="";

    $email="";
    $contraseña="";
    $confirmarContraseña="";
    $comentario="";

    $terminos="";

    $errores=[];
    $mensaje="";
    $usuarios=[];



    //validar datos 

    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
        $apellidos = htmlspecialchars(trim($_POST['apellidos'] ?? ""));
        $fecha= $_POST['fecha']??"";
        $genero=$_POST['genero']?? "";
        $curso=$_POST['curso']?? "";
        $preferencia=$_POST['preferencia']?? [];
        $email=  htmlspecialchars(trim($_POST['email'] ?? ""));
        $contraseña=$_POST['contraseña']?? "";
        $confirmarContraseña=$_POST['confirmarContraseña']?? "";
        $comentario= htmlspecialchars(trim($_POST['comentario'] ?? ""));
        $terminos= $_POST['terminos']?? "";


        //comprobar campos obligatorios*/
        if ($nombre === "") {
            $errores['nombre']= "el nombre es obligatorio";
        } 
        
        if($apellidos===""){
            $errores['apellidos']= "los apellidos son obligatorio";
        }

        if($fecha===""){
            $errores['fecha']= "la fecha es obligatorio";

        }elseif((new DateTime())->diff (new DateTime($fecha))->y <18 ){  /*comprobar que eres mayor de edad*/
            $errores['fecha']= "debes ser mayor de edad";

        }
        
        if($genero===""){
            $errores['genero']= "el genero es obligatorio";

        }elseif(!in_array($genero, ["masculino", "femenino", "otro"])){
            $errores['genero']= "opcion invalida";

        }


        
        if($email===""){
            $errores['email']= "el email es obligatorio";

        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errores['email']= "el email no es valido por el formato";

        }else{
            /*comprobar que no este en el archivo csv*/
        }
        
        if($contraseña===""){
            $errores['contraseña']= "la contraseña es obligatorio";

        }else{

            if(strlen($contraseña) < 8){
                    $errores['contraseña']= "la contraseña tiene que tener al menos 8 caracteres";
            }
            if (!preg_match('`[a-z]`',$contraseña)){
                $errores['contraseña']= "la contraseña tiene que tener al menos 1 letra minuscula";
            }
            if (!preg_match('`[A-Z]`',$contraseña)){
                $errores['contraseña']= "la contraseña tiene que tener al menos 1 letra mayuscula";
            }
            if (!preg_match('`[0-9]`',$contraseña)){
                $errores['contraseña']= "la contraseña tiene que tener al menos 1 numero";
            }
        }
        
        if($confirmarContraseña===""){
            $errores['confirmarContraseña']= "la confirmacion es obligatorio";

        }elseif($confirmarContraseña!==$contraseña){
            $errores['confirmarContraseña']= "la confirmacion no es igual a la contraseña";

        }
        
        if($terminos===""){
            $errores['terminos']= "los terminos son obligatorio";

        }elseif($terminos!=="on"){
            $errores['terminos']= "los terminos deben ser aceptados";

        }


        }

        // 3)Cuando no hay errores
        if (empty($errores)) {

            $archivo=fopen("usuarios.csv", "a+"); /*abre archivo para escritura y lectura*/
           
            $usuarios=[
                $nombre, $apellidos, $fecha, $genero, $email, $contraseña, $curso, $preferencia, $comentario
            ];

            if(fputcsv($archivo, $usuarios)){
                $mensaje.= "registro completado";
            }else{
                $errores['guardarDatos']="error al guardar datos";
            }

            fclose($archivo);


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

    <p>apellidos</p>
    <input type="text" name="apellidos">

    <p>fecha de nacimiento</p>
    <input type="date" name="fecha">

    <p>genero</p>
    <input type="radio"  value="masculino" name="genero" required> Hombre
    <input type="radio"  value="femenino" name="genero" required> Mujer
    <input type="radio"  value="otro" name="genero" required> Otro

    <p>curso</p>
    <select name="curso">
        <option value="1">Uno</option>
        <option value="2" >Dos</option>
        <option value="3" >Tres</option>
    </select>

    <p>preferencia</p>
    <input type="checkbox" name="preferencia[]">Deportes
    <input type="checkbox" name="preferencia[]">Musica
    <input type="checkbox" name="preferencia[]">Viajes

    <p>email</p>
    <input type="email" name="email">

    <p>contraseña</p>
    <input type="password" name="contraseña">

    <p>confirmar contraseña</p>
    <input type="password" name="confirmarContraseña">

    <p>comentarios</p>
    <textarea name="comentario" id=""></textarea>

    <input type="checkbox" name="terminos">acepto los terminos y condiciones


    <input type="submit" name="enviar">
    <input type="reset">
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