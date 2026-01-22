<?php


    /*variables*/
    $mensaje="";
    $errores=[];

    $nombre="";
    $password="";
    $usuarios=[];

    /*leer el archivo csv*/
    function cagarDatos() {
        
        $usuarios=[];
        $temp=[];
        $archivo='credenciales.csv';

        if(!file_exists($archivo)){
            return $usuarios;
        }

        $manejador=@fopen($archivo, 'r');

        if($manejador){
            while (!feof($manejador)){
                $temp=fgetcsv($manejador);

                if($temp==false || count($temp)<3){
                    continue;
                }else{
                    $usuarios[$temp[0]]=[
                        "password"=> $stemp[1],
                        "contador"=> intval($temp[2])
                    ];
                }
            }

            fclose($manejador);
        }
        return $usuarios;
    }
/*TODO no se hacerlo tampoco*/
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
    
        <h1>LOGIN</h1>
        <form name="myForm" action="" method="post">
    
          <!-- Campos de texto -->
          <div class="row">
            <div class="col">
              <label for="firstName">Nombre</label>
              <input id="firstName" name="nombre" type="text" placeholder="Ingresa tu nombre" required>
            </div>
        
    
          <!-- contraseña -->

            <div class="col">
              <label for="password">Contraseña</label>
              <input id="password" name="password" type="password" minlength="6" placeholder="Mínimo 6 caracteres" required>
            </div>
          </div>
    
          <!-- Select -->
          <div style="margin-top:1rem">
            <label for="country">País</label>
            <select id="country" name="country" required>
              <option value="">Selecciona un país</option>
              <option value="es">España</option>
              <option value="mx">México</option>
              <option value="ar">Argentina</option>
              <option value="us">Estados Unidos</option>
            </select>
          </div>
    
          <!-- Radios / Checkboxes -->
          <fieldset style="margin-top:1rem; border:none; padding:0">
            <legend>Género</legend>
            <label><input type="radio" name="gender" value="female"> Femenino</label>
            &nbsp;
            <label><input type="radio" name="gender" value="male"> Masculino</label>
            &nbsp;
            <label><input type="radio" name="gender" value="other"> Otro</label>
          </fieldset>
    
          <div style="margin-top:.5rem">
            <label><input type="checkbox" name="subscribe"> Deseo recibir noticias y actualizaciones</label>
          </div>
    
          <!-- Textarea -->
          <div style="margin-top:1rem">
            <label for="message">Mensaje</label>
            <textarea id="message" name="message" rows="4" placeholder="Escribe tu mensaje..."></textarea>
          </div>
          <!-- subir archivo -->
              <input id="firstName" name="fichero" type="file" placeholder="Ingresa tu fichero" required>
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="reset" value="resetear">
          </div>
    
        </form>
    


</body>
</html>