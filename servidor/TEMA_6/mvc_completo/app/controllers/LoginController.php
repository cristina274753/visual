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
            header("Location: /php/TEMA_6/mvc_completo/public/index");

            exit;
        }

        self::view('login_view');
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
                header("Location: /php/TEMA_6/mvc_completo/public/index");

                exit;
            }
        }

        // Cargar la vista con errores y datos previos
        self::view('login_view', [
            'errores' => $errores,
            'usuario' => $usuario
        ]);
    }
}
