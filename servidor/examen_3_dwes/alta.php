<?php

session_start();
require_once __DIR__ . "/models/IncidenciasModel.php";

$errores=[];
$asunto="";
$horas_estimadas="";
$tipo_incidencia= "";

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}


$modelo= new ProductosModel();
$incidencias= $modelo->obtenerIncidencias();




//añadir con formulario

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $asunto = trim($_POST['asunto'] ?? "");
    $horas_estimadas = htmlspecialchars(trim($_POST['horas_estimadas'] ?? ""));
    $tipo_incidencia= htmlspecialchars(trim($_POST['tipo_incidencia'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($asunto === "") {
        $errores['asunto'] = "Por favor, rellena el asunto";
    } 
    if($horas_estimadas<=0) {
        $errores['horas_estimadas'] = "Por favor, rellena las horas no puede ser menor o igual a 0";

    }
    if($tipo_incidencia==""){
        $errores['tipo_incidencia'] = "Por favor, escoge un tipo";
    }

    // 3)Cuando no hay errores
    if (empty($errores)) {
        

        $resultado = $modelo->crearIncidencia($asunto,$tipo_incidencia, $horas_estimadas );


        if(!$resultado){


            $errores['crear']="error al crear la incidencia";

        }else{

            $_SESSION['mensaje']="se ha insertado correctamente la incidencia";
            header("Location: index.php");
            exit();
        }



        

    }

}





include "views/insertar_vista.php";

?>


