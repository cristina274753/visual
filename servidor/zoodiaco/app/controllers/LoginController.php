<?php

namespace Cristina\App\controllers;

use Cristina\App\models\LoginModel;

class LoginController extends Controller
{
    public function index(): void
    {
        session_start(); // 🔹 Obligatorio
        if (isset($_SESSION['usuario'])) {
            // Redirigir a la página principal
            header("Location: " . BASE_URL . "/index");

            exit;
        }

        self::view('login');
    }

    public function verificar(): void
    {
        session_start(); // 🔹 Obligatorio
        $errores = [];

        $usuario  = trim($_POST['usuario'] ?? "");
        $password = trim($_POST['password'] ?? "");

        if ($usuario === "") {
            $errores['usuario'] = "Por favor, rellena el campo usuario";
        } 
        if ($password === "") {
            $errores['password'] = "Por favor, rellena el campo contraseña";
        }

        

        if (empty($errores)) {
            $modelo = new LoginModel();
            $resultado = $modelo->verificarUsuario($usuario, $password);

            if (!$resultado) {
                $errores['login'] = "Usuario o contraseña incorrectos";
            } else {
                $_SESSION['usuario'] = $usuario;
                // Redirige al índice
                header("Location: " . BASE_URL . "/index");

                exit;
            }
        }

        // Cargar la vista con errores y datos previos
        self::view('login', [
            'errores' => $errores,
            'usuario' => $usuario
        ]);
        

        
        




        
    }
}
