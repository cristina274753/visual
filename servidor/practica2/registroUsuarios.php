<?php 

function limpiar($dato)  {
    
    return htmlspecialchars(stripslashes(trim($dato)));
}


/*variables*/

    $nombre="";
    $apellidos="";
    $fecha="";
    $genero="";
    $curso="";

    $preferencias=[];

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
        $nombre = limpiar($_POST['nombre'] ?? "");
        $apellidos = limpiar($_POST['apellidos'] ?? "");
        $fecha= $_POST['fecha']??"";
        $genero=$_POST['genero']?? "";
        $curso=$_POST['curso']?? "";
        $preferencia=$_POST['preferencias']?? [];
        $email=  limpiar($_POST['email'] ?? "");
        $contraseña=$_POST['contraseña']?? "";
        $confirmarContraseña=$_POST['confirmarContraseña']?? "";
        $comentario=limpiar($_POST['comentario'] ?? "");
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
            
            $archivo=fopen("usuarios.csv", "a+"); /*abre archivo para escritura y lectura*/

            while(($linea=fgetcsv($archivo))!==false){
                if($linea[4] == $email){
                    $errores['email']= "este email ya esta registrado";
                    break;
                }
            }

            fclose($archivo);


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

        }elseif(!$terminos){
            $errores['terminos']= "los terminos deben ser aceptados";

        }


            // 3)Cuando no hay errores
            if (empty($errores)) {


                $archivo=fopen("usuarios.csv", "a+"); /*abre archivo para escritura y lectura*/
            
                $usuarios=[
                    $nombre, $apellidos, $fecha, $genero, $email, $contraseña, $curso, implode(",", $preferencias), $comentario
                ];

                if(fputcsv($archivo, $usuarios)){
                    $mensaje.= "registro completado";
                }else{
                    $errores['guardarDatos']="error al guardar datos";
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

    <p>apellidos</p>
    <input type="text" name="apellidos">
    <?php
    if (!empty($errores['apellidos'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['apellidos']) ?>
        </p>
    <?php endif; ?>

    <p>fecha de nacimiento</p>
    <input type="date" name="fecha" >
    <?php
    if (!empty($errores['fecha'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['fecha']) ?>
        </p>
    <?php endif; ?>

    <p>genero</p>
    <input type="radio"  value="masculino"  name="genero"> Hombre
    <input type="radio"  value="femenino" name="genero"> Mujer
    <input type="radio"  value="otro"  name="genero"> Otro
    <?php
    if (!empty($errores['genero'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['genero']) ?>
        </p>
    <?php endif; ?>

    <p>curso</p>
    <select name="curso">
        <option value="DAW" >DAW</option>
        <option value="DAM"  >DAM</option>
        <option value="ASIR" >ASIR</option>
    </select>
    <?php
    if (!empty($errores['curso'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['curso']) ?>
        </p>
    <?php endif; ?>

    <p>preferencia</p>
    <input type="checkbox" name="preferencias[]"  value="HTML" >HTML
    <input type="checkbox" name="preferencias[]"  value="CSS" >CSS
    <input type="checkbox" name="preferencias[]"  value="JAVA" >JAVA
    <?php
    if (!empty($errores['preferencias'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['preferencias']) ?>
        </p>
    <?php endif; ?>

    <p>email</p>
    <input type="email" name="email">
    <?php
    if (!empty($errores['email'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['email']) ?>
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

    <p>confirmar contraseña</p>
    <input type="password" name="confirmarContraseña">
    <?php
    if (!empty($errores['confirmarContraseña'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['confirmarContraseña']) ?>
        </p>
    <?php endif; ?>

    <p>comentarios</p>
    <textarea name="comentario"></textarea>
    <?php
    if (!empty($errores['comentario'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['comentario']) ?>
        </p>
    <?php endif; ?>

    <input type="checkbox" name="terminos" >acepto los terminos y condiciones
    <?php
    if (!empty($errores['terminos'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['terminos']) ?>
        </p>
    <?php endif; ?>


    <input type="submit" name="enviar">
    <input type="reset" name="limpiar">
    </form>

    <?php
    if (!empty($errores['guardarDatos'])): ?>
      <p class='notice' style=" background-color: #ff0000;">
          <?= htmlspecialchars($errores['guardarDatos']) ?>
        </p>
    <?php endif; ?>

    
    <?php
        if (!empty($mensaje)): ?>
            <p class='notice' style=" background-color: #44ff00ff;"><?= htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

</body>
</html>