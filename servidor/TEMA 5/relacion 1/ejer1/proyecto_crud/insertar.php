<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";

$errores=[];
$nombre="";
$descripcion="";
$precio="";
$mensaje=[];

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}


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
        $errores['nombre'] = "Por favor, rellena el nombre";
    } elseif($precio<=0) {
        $errores['precio'] = "Por favor, rellena el precio no puede ser menor o igual a 0";

    }elseif($descripcion==""){
        $descripcion=null;
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        
        $modelo= new ProductosModel();

        $resultado = $modelo->crearProducto($nombre, $descripcion, $precio);



        if(!$resultado){

            $_SESSION['mensaje']="error al crear el producto";

        }else{

            $_SESSION['mensaje']="se ha insertado correctamente el producto";
            header("Location: tablaProductos.php");
            exit();
        }



        

    }
}

include "views/insertar_vista.php";

//TODO poner errores debajo de cada cuadro y recoradar valor anterior 
?>


