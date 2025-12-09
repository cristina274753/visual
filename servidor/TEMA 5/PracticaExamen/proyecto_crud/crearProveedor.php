<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";

$errores=[];
$nombre="";
$nif="";
$tlf="";
$email="";
$direccion="";

$mensaje=[];
$categorias=[];


//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}


 $modelo= new ProductosModel();
        $categorias= $modelo->obtenerProveedores();




//añadir con formulario

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $tlf = trim($_POST['tlf'] ?? "");
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));
    $nif = htmlspecialchars(trim($_POST['nif'] ?? ""));
    $email= htmlspecialchars(trim($_POST['email'] ?? ""));
    $direccion = htmlspecialchars(trim($_POST['direccion'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($nombre === "") {
        $errores['nombre'] = "Por favor, rellena el nombre";
    } elseif($tlf==="") {
        $errores['tlf'] = "Por favor, rellena el precio no puede ser menor o igual a 0";

    }elseif($email==""){
        $errores['email'] = "Por favor, rellena el nombre";

    }elseif($nif==""){
        $errores['nif'] = "Por favor, escoge una categoria";

    }elseif($direccion===""){

        $errores['direccion'] = "Por favor, rellena el sku";
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        

        $resultado = $modelo->crearProveedor($nombre, $nif, $tlf, $email, $direccion);


        



        if(!$resultado){

            $_SESSION['mensaje']="error al crear el producto";

        }else{

            $_SESSION['mensaje']="se ha insertado correctamente el producto";
            header("Location: index.php");
            exit();
        }



        

    }
}





include "views/crearProveedor_vista.php";

?>


