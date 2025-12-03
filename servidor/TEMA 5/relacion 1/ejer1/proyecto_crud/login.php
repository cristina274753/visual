<?php
require_once "config/sesiones.php";
require_once "models/LoginModel.php";
// require_once "config/db.php";

session_start();


if (isset($_SESSION['usuario'])) {
    header("Location: tablaProductos.php");
    exit();
}

$errores = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //comprobar que no vengan vacíos

    if ($usuario === "" || $password === "") {
        $errores[]= "Por favor, rellena todos los campos.";
    } 

    //sio vacio cargar error y mostrarlo en la vista
    // 3) Cuando no hay errores
    if (empty($errores)) {

        //si no son vacíos
        $modelo = new LoginModel();
        $resultado = $modelo->verificarUsuario($usuario, $password);
    }
    

    


}



include "views/login_vista.php";
?>
