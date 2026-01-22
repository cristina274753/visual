<?php

session_start();
require_once __DIR__ . "/models/IncidenciasModel.php";

$errores = [];
$id = "";

$nuevoEstado="";


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
    $errores['id']=("Error: no se recibió un ID válido.");
}


//usamos el modelo para que nos de el producto
$modelo= new ProductosModel();
$producto = $modelo->obtenerPorId($id); //nos devuelve el producto con ese id


if($producto['estado']=='Pendiente'){

    $nuevoEstado="En curso";

}elseif($producto['estado']=='En curso'){

    $nuevoEstado="Resuelta";

}elseif($producto['estado']=='Resuelta'){

    $nuevoEstado="Pendiente";

}else{

    $errores['estado']="el estado es incorrecto";
}

// 3) Cuando no hay errores
if (empty($errores)) {
    
    $resultado = $modelo->actualizarIncidencia($id, $nuevoEstado);


    if(!$resultado){

            $_SESSION['mensaje']="error al actualizar la incidencia";
        }

        // 3) Cuando no hay errores
        if (empty($errores)) {

            $_SESSION['mensaje']="incidencia actualizada correctamente";
            header("Location: index.php");
            exit();
        }
}




?>

