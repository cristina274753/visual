<?php
require_once "config/sesiones.php";
require_once "config/db.php";

session_start();

// Si ya está autenticado -> a index
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$errores = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $db = conectarBD();

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();
        } else {
            $errores = "Contraseña incorrecta.";
        }
    } else {
        $errores = "Usuario no encontrado.";
    }
}
include "views/login_vista.php";
?>
