<?php



$errores=[];
$id="";
$descripcion="";
$precio="";
$mensaje="";
$consulta="";

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['eliminar'])) {
    
    /* recoger datos */
    $id = htmlspecialchars(trim($_GET['eliminar'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($id === "") {
        $errores[] = "error, id vacio";
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


            $producto= $conexion-> query("select * from productos where id_producto='$id'");

            if($producto-> num_rows>0){

                $consulta="DELETE FROM `tienda`.`productos` WHERE (`id_producto` = '$id')";

              
              
            }else{

              $mensaje.= "no se encontro el producto <br>";
            }

            
            if(!$consulta==""){
                
                if(mysqli_query($conexion, $consulta)){              
                $mensaje.=  "producto eliminado correctamente <br>";

                }else{
                    $mensaje.=  "error al eliminar el producto <br>". mysqli_error($conexion);
                }
            }
          }

          $host= "localhost";
        $user="usuario_tienda";
        $password="1234";
        $dataBase="tienda";

        $conexion= new mysqli($host, $user, $password, $dataBase);


        if($conexion->connect_error){

            $mensaje.= "error en la conexion. fin!";
        }else{


            $mensaje.= "conexion exitosa <br>";


            $producto= $conexion-> query("select * from productos where id_producto='$id'");

            if($producto-> num_rows>0){

                $consulta="DELETE FROM `tienda`.`productos` WHERE (`id_producto` = '$id')";

              
              
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

              $mensaje.= "<thead> <tr><th>id_producto</th> <th>Descripcion</th> <th>Precio</th></tr> </thead>";

              while($fila= $resultado-> fetch_assoc()){
                
                $mensaje.= "<tr> <td>".$fila['id_producto']. "</td>";
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
       header("Location: tablaProductos.php"); //POST --> depurar para ver el funcionamiento
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