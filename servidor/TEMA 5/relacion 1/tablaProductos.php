<?php



$errores=[];

$mensaje="";

        

        $host= "localhost";
        $user="usuario_tienda";
        $password="1234";
        $dataBase="tienda";

        $conexion= new mysqli($host, $user, $password, $dataBase);


        if($conexion->connect_error){

            $mensaje.= "error en la conexion. fin!";
        }else{


            $mensaje.= "conexion exitosa <br>";

        
            //mostrar datos

            $resultado= $conexion-> query("select * from productos");

            if($resultado-> num_rows>0){

              
              $mensaje.= "<br><table><caption>lista de productos:</caption>";

              $mensaje.= "<thead> <tr><th>ID</th><th>Nombre</th> <th>Descripcion</th> <th>Precio</th> <th>Acciones</th></tr> </thead>";

              while($fila= $resultado-> fetch_assoc()){
                
                $mensaje.= "<tr> <td>". $fila['id_producto']. "</td>";
                $mensaje.= " <td>".$fila['nombre']. "</td>";
                $mensaje.= "<td>".$fila['descripcion']. "</td>";

                
                $mensaje.= "<td>".$fila['precio']. "</td>";

                $mensaje.= " <td>  <form method='POST'><!-- Acciones -->
      
        <input type='submit' name='actualizar' value='actualizar'>
       </form>
      
       <form method='POST'>
      <!-- Acciones -->
      
        <input type='submit' name='eliminar' value='eliminar'>
       </form></td></tr>";

              }

              $mensaje.= "</table>";
            }else{

              $mensaje.= "no se encontro productos";
            }

        }

        $conexion-> close();

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])){

        // Redirigir para evitar reenvío del formulario.
        header("Location: actualizarProducto.php"); //get --> depurar para ver el funcionamiento
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])){

        // Redirigir para evitar reenvío del formulario.
        header("Location: eliminar.php"); //get --> depurar para ver el funcionamiento
        exit();
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista productos</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    
    <h1>base de datos</h1>


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