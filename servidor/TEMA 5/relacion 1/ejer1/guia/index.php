<?php

require_once 'includes/config.php';

require_once APP_ROOT.'/models/ProductosModel.php';

$productoModel= new ProductosModel();
$mensaje=null;
$tipo_mensaje="";

$filas= $productoModel->crearProducto("raton", "1200 dpi con cable", 12.50);

if($filas){

    $mensaje= "Producto insertado correctamente";
    $tipo_mensaje="exito";

}else{

    $mensaje= "Error al insertar producto";
    $tipo_mensaje= "error";

}

$lista_productos= $productoModel->obtenerTodos();

require_once APP_ROOT.'./views/index_view.php';

?>