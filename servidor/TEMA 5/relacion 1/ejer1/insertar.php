<?php



$errores=[];
$nombre="";
$descripcion="";
$precio="";
$mensaje="";

//añadir con formulario

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $precio = trim($_POST['precio'] ?? "");
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
    $descripcion = htmlspecialchars(trim($_POST['descripcion'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($nombre === "") {
        $errores[] = "Por favor, rellena el nombre";
    } elseif($precio<=0) {
        $errores[] = "Por favor, rellena el precio no puede ser menor o igual a 0";

    }elseif($descripcion==""){
        $descripcion=false;
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        

        $host= "localhost";
        $user="usuario_tienda";
        $password="1234";
        $dataBase="tienda";

        $conexion= new mysqli($host, $user, $password, $dataBase);


        if($conexion->connect_error){

            $mensaje.= "error en la conexion. fin!";
        }else{


            $mensaje.= "conexion exitosa <br>";

            if($descripcion==false){
                $consulta= "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', null, $precio)";

            }else{
                $consulta= "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', $precio)";

            }

            if(mysqli_query($conexion, $consulta)){              
                $mensaje.=  "producto insertado correctamente <br>";

            }else{
                $mensaje.=  "error al insertar el producto <br>". mysqli_error($conexion);
            }

            

            

        }

        $conexion-> close();

        // 3) Cuando no hay errores
        if (empty($errores)) {
            // Redirigir para evitar reenvío del formulario.
              header("Location:tablaProductos.php"); //get --> depurar para ver el funcionamiento
              exit();
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>añadir productos</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    
    <h1>Añadir producto</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" placeholder="Ingresa el nombre" >
        </div>
        <div class="col">
          <label for="descripcion">Descripcion</label>
          <input id="descripcion" name="descripcion" type="text" placeholder="Ingresa alguna descripcion" >
        </div>
        <div class="col">
          <label for="precio">precio</label>
          <input id="precio" name="precio" type="number" placeholder="Ingresa el precio" >
        </div>
      </div>


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
    elseif (!empty($errores)): ?>
      <p class='notice'><?= htmlspecialchars($errores); ?></p>
    <?php endif; ?>

    <?php
    if (!empty($mensaje)): ?>
      <p class='notice'><?=($mensaje); ?></p>
    <?php endif; ?>


</body>
</html>