<?php

namespace Cristina\App\models;

use Cristina\Lib\Database; // <- Importante



class LoginModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function verificarUsuario($usuario, $password){

        $sql = "SELECT * FROM usuarios WHERE usuario = ? LIMIT 1";
        $resultado = $this->db->executeQuery($sql, [$usuario]);

        // Si no existe el usuario
        if (empty($resultado)) {
            return false;
        }

        $usuarioDB = $resultado[0];

        // Comparar contraseña (si no usas password_hash)
         if (password_verify($password, $usuarioDB["password"])){
            return true;
        }else{
            return false;
        }

        // O si usas password_hash:
        // if (password_verify($password, $usuarioDB["password"])) { ... }if ($password === $usuarioDB["password"])

    }


    public function obtenerRol ($usuario){

        $sql = "SELECT rol FROM usuarios WHERE usuario = ? LIMIT 1";
        $resultado = $this->db->executeQuery($sql, [$usuario]);

        // Si no existe el usuario
        if (empty($resultado)) {
            return false;

        }else{


            return $resultado[0]['rol'];
        }


    }


    

}


?>