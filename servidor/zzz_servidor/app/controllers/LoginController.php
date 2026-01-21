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

        self::view('login_view');
    }

    public function verificar(): void
    {
        session_start(); // 🔹 Obligatorio
        $errores = [];

        $usuario  = trim($_POST['credencial'] ?? "");

        if ($usuario === "") {
            $errores['usuario'] = "Por favor, rellena el campo del codigo de acceso";
        } 

        // 3) Cuando no hay errores
        if (empty($errores)) {
            // Separar ID y PIN
            $partes = explode('-', $usuario);

            //separar el nombre y los numeros 
            $nombre=trim($partes[0]);
            $numeros= trim($partes[1]);
        }
        

        
        




        if (empty($errores)) {
            $modelo = new LoginModel();
            $resultado = $modelo->verificarUsuario($nombre, $numeros);

            if (!$resultado) {
                $errores['login'] = "codigo de acceso incorrecto";

            } else {
                $_SESSION['usuario'] = $usuario;
                // Redirige al índice
                header("Location: " . BASE_URL . "/index");

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
