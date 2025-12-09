<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";


$mensaje = "";
$totalProductos=0;
$totalCategorias=0;
$totalUsuariosActivos=0;
$totalPedidosPendientes=0;

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



$productos= $modelo->obtenerProductos(); //array de productos
$pedidos= $modelo->obtenerPedidos();
$usuarios= $modelo->obtenerUsuarios();

foreach($productos as $pr){
    $totalProductos++;
}


$categorias= $modelo->obtenerCategorias(); //array de categorias
foreach($categorias as $ctg){
    $totalCategorias++;
}


foreach($pedidos as $p){

    if($p['estado']=='pendiente'){
        $totalPedidosPendientes++;
    }
}


foreach($usuarios as $u){

    if($u['activo']==1){
        $totalUsuariosActivos++;
    }
}


//clientes
$id="";

foreach($usuarios as $u){

    if($_SESSION['usuario']==$u['usuario']){

        $id=$u['id'];
    }
}

$tablaPedidosClientes="<table>
                    <thead>
                                <tr>
                                    <th>num pedido</th>
                                    <th>fecha</th>
                                    <th>estado</th>
                                    <th>total</th>
                                </tr>
                    </thead>
                            <tbody>";


foreach($pedidos as $p){

    foreach($usuarios as $u){

        if($p['id_usuario']== $u['id']){

            $tablaPedidosClientes.= "<tr>
                                <td>{$p['id_pedido']}</td>
                                <td>{$p['fecha_pedido']}</td>
                                <td>{$p['estado']}</td>
                                <td>{$p['total']}</td>
                            </tr>";
    
        }
    }
}

$tablaPedidosClientes .= "</tbody></table>";














/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

/*$modelo= new ProductosModel();
$productos = $modelo->obtenerTodos(); //nos devuelve un array con todos los productos 
$categorias=$modelo->obtenerCategorias();

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
                                <th>Precio</th>
                                <th>Categoria</th>";


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
                    <td>{$producto['precio']}</td>


                    <td>"; 
                    
                    foreach($categorias as $categoria){

                        if($producto['id_categoria']==$categoria['id_categoria']){

                            $tabla.="{$categoria['nombre']}";
                        }
                    }
                     
                    $tabla.="</td>";



                    if($_SESSION['rol']=='admin'){

                        $tabla.="<td>
                        
                        <a class='button' href='actualizarProducto.php?id={$producto['id_producto']}'>Actualizar</a>

                        <a class='button' href='eliminar.php?id={$producto['id_producto']}'>Eliminar</a>
                    </td>";
                    }
                    
                $tabla.="</tr>";

    }

    $tabla .= "</table>";

}*/



include "views/index_vista.php";

?>

