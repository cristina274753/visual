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


$pedidos = $modelo->obtenerPedidos(); //nos devuelve un array con todos los productos 
$usuarios=$modelo->obtenerUsuarios();

if(empty($pedidos)){
    $mensaje="tabla vacia de productos";


}else{

    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>id usuario</th>
                                <th>cliente nombre</th>
                                <th>cliente email</th>
                                <th>fecha pedido</th>
                                <th>total</th>";

                            $tabla.="</tr>
                        </thead>";


    
    foreach($pedidos as $pd){

        if($pd['estado']=="pendiente"){

            $tabla .= "<tr>
                        <td>{$pd['id_pedido']}</td>";

                        foreach($usuarios as $usu){

                            if($usu['id']==$pd['id_usuario']){

                                $tabla.="<td>{$usu['usuario']}</td>";
                            }
                        }

                        
                        $tabla.="<td>{$pd['cliente_nombre']}</td>
                        <td>{$pd['cliente_email']}</td>
                        <td>{$pd['fecha_pedido']}</td>
                        <td>{$pd['total']}</td>";



                    $tabla.="</tr>";
        }

        

    }


    $tabla.="</table>";
}


include "views/listadopedidos_vista.php";

?>