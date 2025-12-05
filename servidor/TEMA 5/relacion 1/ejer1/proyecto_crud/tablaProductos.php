<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";


$mensaje = "";

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    unset($_SESSION['mensaje']);

}




/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

$modelo= new ProductosModel();
$productos = $modelo->obtenerTodos(); //nos devuelve un array con todos los productos 

if(empty($productos)){
    $mensaje="tabla vacia de productos";



}else{

    //pintar tabla con array
    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>";


                                if($_SESSION['rol']=='admin'){

                                    $tabla.="<th>Acciones</th>";
                                } 



                            $tabla.="</tr>
                        </thead>";


    foreach($productos as $producto){

        $tabla .= "<tr>
                    <td>{$producto['id_producto']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>";



                    if($_SESSION['rol']=='admin'){

                        $tabla.="<td>
                        
                        <a class='button' href='actualizarProducto.php?id={$producto['id_producto']}'>Actualizar</a>

                        <a class='button' href='eliminar.php?id={$producto['id_producto']}'>Eliminar</a>
                    </td>";
                    }
                    
                $tabla.="</tr>";

    }

    $tabla .= "</table>";

}



include "views/index_vista.php";

?>

