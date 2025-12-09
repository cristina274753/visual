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

$modelo=new ProductosModel();


$productos = $modelo->obtenerProductos(); //nos devuelve un array con todos los productos 
$categorias=$modelo->obtenerCategorias();

if(empty($productos)){
    $mensaje="tabla vacia de productos";


}else{

    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Acciones</th>";


                            $tabla.="</tr>
                        </thead>";


    foreach($productos as $producto){

        $tabla .= "<tr>
                    <td>{$producto['id_producto']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['descripcion']}</td>
                    <td>{$producto['precio']}</td>


                    <td>"; 
                    
                    foreach($categorias as $categoria){

                        if($producto['id_categoria']==$categoria['id_categoria']){

                            $tabla.="{$categoria['nombre']}";
                        }
                    }
                     
                    $tabla.="</td>
                    
                    <td>
                        
                        <a class='button' href='actualizarProducto.php?id={$producto['id_producto']}'>Actualizar</a>

                        <a class='button' href='eliminar.php?id={$producto['id_producto']}'>Eliminar</a>
                    </td>";


                $tabla.="</tr>";

    }


    $tabla.="</table>";
}


include "views/listadoProductos_vista.php";

?>