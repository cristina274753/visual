<?php

require_once "config/sesiones.php";
require_once "config/db.php";

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

include "views/insertar_vista.php";

?>

