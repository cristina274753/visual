<?php
require_once "models/LoginModel.php";
// require_once "config/db.php";

$errores=[];
session_start();
$rol="";


if (isset($_SESSION['usuario'])) {
    header("Location: tablaProductos.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //comprobar que no vengan vacíos

    if ($usuario === "" || $password === "") {
        $errores['vacios']= "Por favor, rellena todos los campos.";
    } 

    //sio vacio cargar error y mostrarlo en la vista
    // 3) Cuando no hay errores
    if (empty($errores)) {

        //si no son vacíos
        $modelo = new LoginModel();
        $resultado = $modelo->verificarUsuario($usuario, $password); //true o false

        if($resultado==false){
            
            $errores['login']="error en la contraseña o en el usuario";  //TODO como diferenciar por error en la contraseña y error por usuario enexistente

        }elseif($resultado==true){

            //buscar rol
            $rol=$modelo->obtenerRol($usuario);

            //meter el usuario y el rol en sesion
            $_SESSION['usuario']=$usuario;
            $_SESSION['rol']=$rol;

            header("Location: tablaProductos.php"); // Redirigir a la página principal
            exit();
        }
    }
    

    


}



include "views/login_vista.php";
?>
