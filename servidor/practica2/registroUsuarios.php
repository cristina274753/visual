<?php 

    $nombre="";
    $apellidos="";
    $nacimiento="";
    $genero="";
    $curso="";
    $preferencia="";
    $email="";
    $contraseña="";
    $confirmarContraseña="";
    $comentario="";
    $terminos="";

    $errores=[];


    //validar datos 

    //campos obligatorios: nombre, apellidos, nacimiento, genero, email, contraseña, confirmarcontraseña, treminos

    //nacimiento--> fecha valida y al menos 18 años (dateTime=calcular edad) date_create, date_format, date_diff

    //email--> filter_var con FILTER_VALIDATE_EMAIL para formato correcto y comporbar que no este ya registrado



    //sanitizacion 

    //limpia los datos ingresados por el usuario (trim,stripslashes y htmlspecialchars)



    //almacenamiento de datos 

    //almacena en archivo csv (fputcsv) 

    //abrir el archivo en modo a+ para poder agregar nuevos registros sin sobrescribir



    //mensaje de exito/error

    //al meter los datos en el archivo csv--> mensaje de exito

    //error en el apartado donde se encuentre el error 





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

    <p>nombre</p>
    <input type="text">

    <p>apellidos</p>
    <input type="text">

    <p>fecha de nacimiento</p>
    <input type="date">

    <p>genero</p>
    <input type="radio" name="hm" value="h" required> Hombre
    <input type="radio" name="hm" value="m" required> Mujer
    <input type="radio" name="hm" value="m" required> Otro

    <p>curso</p>
    <select name="menu">
        <option value="1">Uno</option>
        <option value="2">Dos</option>
        <option value="3">Tres</option>
    </select>

    <p>preferencia</p>
    <input type="checkbox" name="">Deportes
    <input type="checkbox" name="">Musica
    <input type="checkbox" name="">Viajes

    <p>email</p>
    <input type="email">

    <p>contraseña</p>
    <input type="password">

    <p>confirmar contraseña</p>
    <input type="password">

    <p>comentarios</p>
    <textarea name="" id=""></textarea>

    <input type="checkbox" name="terminos">acepto los terminos y condiciones


    <input type="submit">
    <input type="reset">
    </form>
</body>
</html>