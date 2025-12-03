<?php

session_start();
require_once __DIR__ . "/config/sesiones.php";
require_once __DIR__ . "/models/ProductosModel.php";


$errores = [];
$mensaje = "";

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


/* ---- PROCESAR ACCIONES (ANTES DE MOSTRAR NADA) ---- */

if (isset($_GET['actualizar'])) {
    $id = trim($_GET['actualizar']);


    if ($id === "") {
        $errores[] = "ID vacío";
    } else {
      
        header("Location: actualizarProducto.php?id=$id");
        exit();
    }
}

if (isset($_GET['eliminar'])) {
    $id = trim($_GET['eliminar']);


    if ($id === "") {
        $errores[] = "ID vacío";
    } else {

        header("Location: eliminar.php?id=$id");
        exit();
    }
}

if (isset($_GET['anadir'])) {

    header("Location: insertar.php");
    exit();
}


/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

$modelo= new ProductosModel();
$productos = $modelo->obtenerTodos(); //nos devuelve un array con todos los productos 

if(empty($productos)){
    $mensaje="tabla vacia de productos";

}else{

    //pintar tabla con array
    $mensaje="<table>";

    $mensaje .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>";


    foreach($productos as $producto){

        $mensaje .= "<tr>
                    <td>{$producto['id_producto']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>
                    <td>
                        <form method='GET' style='display:inline'>
                            <button name='actualizar' value='{$producto['id_producto']}'>Actualizar</button>
                        </form>

                        <form method='GET' style='display:inline'>
                            <button name='eliminar' value='{$producto['id_producto']}'>Eliminar</button>
                        </form>
                    </td>
                </tr>";

    }

    $mensaje .= "</table>";

}





include "views/index_vista.php";

?>

