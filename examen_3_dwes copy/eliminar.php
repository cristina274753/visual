<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";



$errores=[];

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = [];
}


//coger el id del get
$id = htmlspecialchars(trim($_GET['id'] ?? "")); 

//id es un valor correcto (un número o dígito) iscdigit_type

//usamos el modelo para que nos de el producto
$modelo= new ProductosModel();
$producto = $modelo->obtenerPorId($id); //nos devuelve el producto con ese id


//comprobamos que producto existe
if(!$producto){
    $errores['incidencia']="no existe la incidencia";

}

// 3) Cuando no hay errores
if (empty($errores)) {
    
    if($modelo->eliminarProducto($id)){
        $_SESSION['mensaje']= "incidencia eliminada correctamanete";

    }else{
        $_SESSION['mensaje']="no se ha eliminado la incidencia";

    }

    header("Location: index.php");
    exit();
}



?>

