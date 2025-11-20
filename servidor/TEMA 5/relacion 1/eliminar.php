<?php



$errores=[];
$nombre="";
$descripcion="";
$precio="";
$mensaje="";
$consulta="";



/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($nombre === "") {
        $errores[] = "Por favor, rellena el nombre";
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


            $producto= $conexion-> query("select * from productos where nombre='$nombre'");

            if($producto-> num_rows>0){

                $consulta="DELETE FROM `tienda`.`productos` WHERE (`nombre` = '$nombre')";

              
              
            }else{

              $mensaje.= "no se encontro el producto";
            }

            
            if(!$consulta==""){
                
                if(mysqli_query($conexion, $consulta)){              
                $mensaje.=  "producto eliminado correctamente <br>";

                }else{
                    $mensaje.=  "error al eliminar el producto <br>". mysqli_error($conexion);
                }
            }


            

            

             //mostrar datos

            $resultado= $conexion-> query("select * from productos");

            if($resultado-> num_rows>0){

              
              $mensaje.= "<br><table><caption>lista de productos:</caption>";

              $mensaje.= "<thead> <tr><th>Nombre</th> <th>Descripcion</th> <th>Precio</th></tr> </thead>";

              while($fila= $resultado-> fetch_assoc()){
                
                $mensaje.= "<tr> <td>".$fila['nombre']. "</td>";
                $mensaje.= "<td>".$fila['descripcion']. "</td>";

                
                $mensaje.= "<td>".$fila['precio']. "</td> </tr>";

              }

              $mensaje.= "</table>";
            }else{

              $mensaje.= "no se encontro productos";
            }
            

           

        }

        $conexion-> close();

        // Redirigir para evitar reenvío del formulario.
        header("Location: tablaProductos.php"); //get --> depurar para ver el funcionamiento
        exit();

    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eliminar productos</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    
    <h1>eliminar de datos</h1>
    <form name="myForm" action="" method="post">

      <!-- Campos de texto -->
      <div class="row">
        <div class="col">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" placeholder="Ingresa el nombre" >
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