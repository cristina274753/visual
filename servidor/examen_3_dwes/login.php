<?php
require_once "models/LoginModel.php";
// require_once "config/db.php";

$errores=[];
session_start();
$rol="";

$usuario="";
$password="";


if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //comprobar que no vengan vacíos

    if ($usuario === "") {
        $errores['usuario']= "Por favor, rellena el  campos usuario";

    } elseif($password === ""){

        $errores['password']= "Por favor, rellene el campos contraseña";
    }

    //sio vacio cargar error y mostrarlo en la vista
    // 3) Cuando no hay errores
    if (empty($errores)) {

        //si no son vacíos
        $modelo = new LoginModel();
        $resultado = $modelo->verificarUsuario($usuario, $password); //true o false

        if($resultado==false){
            
            $errores['login']="error en la contraseña o en el usuario";  

        }elseif($resultado==true){

            

            //meter el usuario y el rol en sesion
            $_SESSION['usuario']=$usuario;
            $errores['exito']="login correcto";

            header("Location: index.php"); // Redirigir a la página principal
            exit();
        }
    }
    

    


}



include "views/login_vista.php";
?>
