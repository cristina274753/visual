<?php

namespace Cristina\App\models;

use Cristina\Lib\Database; // <- Importante



class LoginModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function verificarUsuario($nombre, $pin){

        $sql = "SELECT * FROM empleados WHERE id_empleado = ? LIMIT 1";
        $resultado = $this->db->executeQuery($sql, [$nombre]);

        // Si no existe el usuario
        if (empty($resultado)) {
            return false;
        }

        $usuarioDB = $resultado[0];

        //$pinHash = password_hash($pin, PASSWORD_DEFAULT);


        // Comparar contraseña (si no usas password_hash)
         //if (password_verify($pinHash, $usuarioDB["pin"])){
            //return true;
        //}else{
            //return false;
        //}

        if(password_verify($pin, $usuarioDB["pin"])){
            return true;
        }else{
            return false;
        }


        

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