<?php

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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>

<h1>Actualizar producto</h1>

<form name="myForm" action="" method="POST">

    <label>Nombre</label>
    <input id="nombre" name="nombre" type="text" value="<?= htmlspecialchars($nombre) ?>" required>

    <label>Descripción</label>
    <input id="descripcion" name="descripcion" type="text" value="<?= htmlspecialchars($descripcion) ?>">

    <label>Precio</label>
    <input id="precio" name="precio" type="number" step="0.01" value="<?= htmlspecialchars($precio) ?>" required>

    <button type="submit" name="enviar">Actualizar</button>
</form>


<?php if (!empty($errores)): ?>
    <p class='notice'>
        <?php foreach ($errores as $e): ?>
            <?= htmlspecialchars($e) ?><br>
        <?php endforeach; ?>
    </p>
<?php endif; ?>

</body>
</html>
