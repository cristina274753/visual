<?php


require_once APP_ROOT. 'config/Database.php';


class LoginModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function verificarUsuario($usuario, $password){

        $sql= "SELECT * FROM  WHERE usuario = $usuario";
        echo "devuelve true/false verificar usuario";
    }

    

}


?>