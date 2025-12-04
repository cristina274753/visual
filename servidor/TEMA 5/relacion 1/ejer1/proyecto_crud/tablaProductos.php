<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";


$mensaje = [];

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje']=[];

}




/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

$modelo= new ProductosModel();
$productos = $modelo->obtenerTodos(); //nos devuelve un array con todos los productos 

if(empty($productos)){
    $mensaje['tabla'][]="tabla vacia de productos";

    $_SESSION['mensaje']=$mensaje;


}else{

    //pintar tabla con array
    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>";


    foreach($productos as $producto){

        $tabla .= "<tr>
                    <td>{$producto['id_producto']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>
                    <td>
                        
                        <a class='button' href='actualizarProducto.php?id={$producto['id_producto']}'>Actualizar</a>

                        <a class='button' href='eliminar.php?id={$producto['id_producto']}'>Eliminar</a>
                    </td>
                </tr>";

    }

    $tabla .= "</table>";

}



include "views/index_vista.php";

?>

