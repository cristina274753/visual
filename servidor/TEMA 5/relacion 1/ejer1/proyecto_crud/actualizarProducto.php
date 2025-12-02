<?php

require_once "config/sesiones.php";
require_once "config/db.php";

$errores = [];
$nombre = "";
$descripcion = "";
$precio = "";
$mensaje = "";
$consulta = "";
$id = "";

/* ======================
    1. RECIBIR ID
====================== */

$id = trim($_GET['id'] ?? "");

if ($id === "") {
    $errores[]=("Error: no se recibió un ID válido.");
}


/* ======================
   2. CARGAR DATOS DEL PRODUCTO
====================== */

$conexion = new mysqli("localhost", "usuario_tienda", "1234", "tienda");

if ($conexion->connect_error) {
    $errores[]=("Error de conexión: " . $conexion->connect_error);
}

$producto = $conexion->query("SELECT * FROM productos WHERE id_producto='$id'");

if ($producto->num_rows === 0) {
    $errores[]=("Producto no encontrado.");
}

$datos = $producto->fetch_assoc();

// 3) Cuando no hay errores
if (empty($errores)) {
   
    // Si NO se ha enviado el formulario, rellenamos campos con valores actuales
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $nombre = $datos["nombre"];
      $descripcion = $datos["descripcion"];
      $precio = $datos["precio"];
  }
}



/* ======================
    3. PROCESAR FORMULARIO
====================== */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion'] ?? ""));
    $precio = trim($_POST['precio']);

    // Validaciones
    if ($nombre === "") {
        $errores[] = "El nombre es obligatorio.";
    }

    if ($precio === "" || !is_numeric($precio) || $precio <= 0) {
        $errores[] = "El precio debe ser mayor que 0.";
    }


    // Si no hay errores → actualizar
    if (empty($errores)) {

      if($descripcion==""){

        $consulta = "UPDATE productos SET nombre='$nombre', descripcion=null, precio='$precio' WHERE id_producto='$id'";

      }else{

        $consulta = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id_producto='$id'";
      }

      if($consulta!==""){
                
          if(mysqli_query($conexion, $consulta)){              
          $mensaje.=  "producto actualizado correctamente <br>";

          }else{
              $mensaje.=  "error al actualizar el producto <br>". mysqli_error($conexion);
          }
      }
        

        // Redirigir
        header("Location: tablaProductos.php");
        exit();
    }
}

$conexion->close();

include "views/modificar_vista.php";

?>

