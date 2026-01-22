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


$categorias = $modelo->obtenerCategorias(); //nos devuelve un array con todos los productos 

if(empty($categorias)){
    $mensaje="tabla vacia de productos";


}else{

    $tabla="<table>";

    $tabla .= "<thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>padre_id</th>
                                <th>descripcion</th>";

                            $tabla.="</tr>
                        </thead>";


    foreach($categorias as $ctg){

        $tabla .= "<tr>
                    <td>{$ctg['id_categoria']}</td>
                    <td>{$ctg['nombre']}</td>
                    <td>{$ctg['padre_id']}</td>
                    <td>{$ctg['descripcion']}</td>";



                $tabla.="</tr>";

    }


    $tabla.="</table>";
}


include "views/listadoCategorias_vista.php";

?>