<?php

session_start();
    require_once '../dataset.php';

$id="";
/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id=trim($_GET['id'] ?? "");

    $_SESSION['reservas'][]=$id;
    $_SESSION['flash_message']="Viaje a ".$viajes[$id]['destino']." reservado con exito";
}

?>
