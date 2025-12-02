<?php

require_once "config/sesiones.php";
require_once "config/db.php";


$errores=[];
$id="";
$mensaje="";
$consulta="";

// Comprobar método y parámetro
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    // Recoger ID desde GET
    $id = htmlspecialchars(trim($_GET['id'] ?? ""));

    if ($id === "") {
        $errores[] = "Error: ID vacío.";
    }

    if (empty($errores)) {

        // Conexión
        $conexion = new mysqli("localhost", "usuario_tienda", "1234", "tienda");

        if ($conexion->connect_error) {
            $errores[] = "Error en la conexión.";
        } else {

            // Comprobar si existe el producto
            $producto = $conexion->query("SELECT * FROM productos WHERE id_producto='$id'");

            if ($producto->num_rows > 0) {
                $consulta = "DELETE FROM productos WHERE id_producto='$id'";
            } else {
                $errores[] = "Producto no encontrado.";
            }

            // Ejecutar eliminación
            if ($consulta !== "") {

                if ($conexion->query($consulta)) {
                    $mensaje = "Producto eliminado correctamente.";
                } else {
                    $errores[] = "Error al eliminar el producto: " . $conexion->error;
                }
            }
        }

         $conexion->close();

        // Redirigir para evitar reenvío del formulario
        header("Location: tablaProductos.php");
        exit();

        }
}

?>

