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
            $errores['usuario'] = "Por favor, rellena el campo del código de acceso";
        } else {
            // Validar formato CODIGO-PIN
            if (!str_contains($usuario, '-')) {
                $errores['usuario'] = "El formato debe ser CODIGO-PIN (separado por un guion)";
            } else {
                $partes = explode('-', $usuario);

                // Deben existir exactamente 2 partes
                if (count($partes) !== 2) {
                    $errores['usuario'] = "Formato inválido, debe ser CODIGO-PIN";
                } else {
                    $nombre  = trim($partes[0]);
                    $numeros = trim($partes[1]);

                    if ($nombre === "" || $numeros === "") {
                        $errores['usuario'] = "Tanto el código como el PIN son obligatorios";
                    }
                }
            }
        }

        
        if (empty($errores)) {
            $modelo = new LoginModel();
            $resultado = $modelo->verificarUsuario($nombre, $numeros);

            if (!$resultado) {
                $errores['login'] = "codigo de acceso incorrecto";

            } else {
                $_SESSION['usuario'] = $nombre;
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
