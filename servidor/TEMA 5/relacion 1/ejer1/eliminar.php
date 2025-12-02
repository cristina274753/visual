<?php



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