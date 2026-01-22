<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";

$errores = [];
$mensaje = [];

$numVentas=0;
$precioTotal=0;

$unidades=0;
$cont=0;

$contadorCategorias=0;




//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}



    
    //usamos el modelo para que nos de el producto
    $modelo= new ProductosModel();
    $pedidos = $modelo->obtenerPedidos(); //nos devuelve el producto con ese id para poner valores en el form
    $relacion= $modelo->obtenerRelacion();
    $productos= $modelo->obtenerProductos();
    $categorias= $modelo->obtenerCategorias();
    $usuarios= $modelo->obtenerUsuarios();

    //ventas totales
        foreach($pedidos as $pd){
            $numVentas++;
            $precioTotal+=$pd['total'];
        }



//ventas por productos (tabla de cont, nombre producto, unidades vendidas)

    //de menos a mayor
    /*usort($productos, function($a, $b) {
        return $a['precio'] <=> $b['precio']; // de menor a mayor
    });*/



    $tablaProductos="<table>";

        $tablaProductos.= "<thead>
                                <tr>
                                    <th>num</th>
                                    <th>producto</th>
                                    <th>unidades de ventas</th>
                                    ";

                                $tablaProductos.="</tr>
                            </thead>";

    //  de mayor a menor:
            usort($relacion, function($a, $b) {
                return $b['cantidad'] <=> $a['cantidad'];
            });


        foreach($relacion as $rel){

            $cont++;

            $tablaProductos.= "<tr>
                        <td>{$cont}</td>";

                        foreach($productos as $pr){

                            if($rel['id_producto']==$pr['id_producto']){
                                $tablaProductos.="<td>{$pr['nombre']}</td>";
                            }
                        }

                        //unidades 

                        $tablaProductos.="<td>{$rel['cantidad']}</td>";
                        $tablaProductos.="</tr>";
                        
        }

        $tablaProductos.="</table>";


//ventas por categorias

    $ventasCategorias = [];


    foreach($categorias as $ca){
        $ventasCategorias[$ca['id_categoria']] = [
            'nombre' => $ca['nombre'],
            'ventas' => 0
        ];
    }

    foreach($relacion as $pe){

        foreach($productos as $pro){

            if($pe['id_producto']==$pro['id_producto']){

                $ventasCategorias[$pro['id_categoria']]['ventas']+=$pe['cantidad'];
            }
        }
    }

    // 4️⃣ Ordenar de mayor a menor
    usort($ventasCategorias, function($a, $b){
        return $b['ventas'] <=> $a['ventas'];
    });

    $tablaCategorias = "<table>
                            <thead>
                                <tr>
                                    <th>Categoría</th>
                                    <th>Ventas</th>
                                </tr>
                            </thead>
                            <tbody>";

    foreach($ventasCategorias as $vc){
        $tablaCategorias .= "<tr>
                                <td>{$vc['nombre']}</td>
                                <td>{$vc['ventas']}</td>
                            </tr>";
    }

    $tablaCategorias .= "</tbody></table>";



//ventas por clientes 

 $ventasClientes = [];


    foreach($usuarios as $ca){
        $ventasClientes[$ca['id']] = [
            'nombre' => $ca['nombre_completo'],
            'compras' => 0
        ];
    }

    foreach($relacion as $pe){

        foreach($pedidos as $p){

            if($pe['id_pedido']==$p['id_pedido']){

                foreach($usuarios as $us){

                    if($p['id_usuario']==$us['id']){

                        $ventasClientes[$us['id']]['compras']+=$pe['cantidad'];
                    }
                }

            }
        }
    }




    // 4️⃣ Ordenar de mayor a menor
    usort($ventasClientes, function($a, $b){
        return $b['compras'] <=> $a['compras'];
    });

    $tablaCliente = "<table>
                            <thead>
                                <tr>
                                    <th>clientes</th>
                                    <th>compras</th>
                                </tr>
                            </thead>
                            <tbody>";

    foreach($ventasClientes as $vc){
        $tablaCliente .= "<tr>
                                <td>{$vc['nombre']}</td>
                                <td>{$vc['compras']}</td>
                            </tr>";
    }

    $tablaCliente .= "</tbody></table>";



//pedidos pendientes

$pendientes=0;

foreach($relacion as $r){

    foreach($pedidos as $p){

        if($r['id_pedido']== $p['id_pedido']){

            if($p['estado']=='pendiente'){
                $pendientes++;
            }
        }
    }
}



//estado de los pedidos 

$tablaPedidos="<table>
                    <thead>
                                <tr>
                                    <th>id_pedido</th>
                                    <th>estado</th>
                                </tr>
                    </thead>
                            <tbody>";



foreach($relacion as $r){

    foreach($pedidos as $p){

        if($r['id_pedido']== $p['id_pedido']){

            $tablaPedidos.= "<tr>
                                <td>{$r['id_pedido']}</td>
                                <td>{$p['estado']}</td>
                            </tr>";
    
        }
    }
}

$tablaPedidos .= "</tbody></table>";



include "views/estadisticasVentas_vista.php";

?>

