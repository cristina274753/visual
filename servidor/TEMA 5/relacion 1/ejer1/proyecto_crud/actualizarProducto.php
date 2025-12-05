<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";

$errores = [];
$nombre = "";
$descripcion = "";
$precio = "";
$mensaje = [];
$consulta = "";
$id = "";


//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}



/* ======================
    1. RECIBIR ID
====================== */

$id = trim($_GET['id'] ?? "");

if ($id === "") {
    $errores[]=("Error: no se recibió un ID válido.");
}

// 3) Cuando no hay errores
if (empty($errores)) {
    
    //usamos el modelo para que nos de el producto
    $modelo= new ProductosModel();
    $producto = $modelo->obtenerPorId($id); //nos devuelve el producto con ese id para poner valores en el form



    // 3) Cuando no hay errores
if (empty($errores)) {
   
    // Si NO se ha enviado el formulario, rellenamos campos con valores actuales
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

      $nombre = $producto["nombre"];
      $descripcion = $producto["descripcion"] ?? "";
      
      $precio = $producto["precio"];
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {

    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion'] ?? null));
    $precio = trim($_POST['precio']);

    // Validaciones
    if ($nombre === "") {
        $errores[] = "El nombre es obligatorio.";
    }

    if ($precio === "" || !is_numeric($precio) || $precio <= 0) {
        $errores[] = "El precio debe ser mayor que 0.";
    }

    if($descripcion==""){
        $descripcion=null;
    }

    // Si no hay errores → actualizar
    if (empty($errores)) {

       $resultado = $modelo->actualizarProducto($id,$nombre, $descripcion, $precio);

        

        if(!$resultado){

            $_SESSION['mensaje']="error al actualizar el producto";
        }

        // 3) Cuando no hay errores
        if (empty($errores)) {

            $_SESSION['mensaje']="producto actualizado correctamente";
            header("Location: tablaProductos.php");
            exit();
        }
        

       
    }
}

}

}

include "views/modificar_vista.php";

?>

