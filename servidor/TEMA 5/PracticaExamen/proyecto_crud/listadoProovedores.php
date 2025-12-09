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


$productos = $modelo->obtenerProveedores(); //nos devuelve un array con todos los productos 

if(empty($productos)){
    $mensaje="tabla vacia de productos";


}else{

    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>nif</th>
                                <th>telefono</th>
                                <th>email</th>
                                <th>direccion</th>
                                <th>fecha_alta</th>";

                            $tabla.="</tr>
                        </thead>";


    foreach($productos as $producto){

        $tabla .= "<tr>
                    <td>{$producto['id_proveedor']}</td>
                    <td>{$producto['nombre']}</td>
                    <td>{$producto['nif']}</td>
                    <td>{$producto['telefono']}</td>
                    <td>{$producto['email']}</td>
                    <td>{$producto['direccion']}</td>
                    <td>{$producto['fecha_alta']}</td>";


                    


                $tabla.="</tr>";

    }


    $tabla.="</table>";
}


include "views/listadoProductos_vista.php";

?>