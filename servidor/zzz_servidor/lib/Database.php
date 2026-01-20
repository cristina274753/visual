<?php

namespace Cristina\Lib;




define('BD_HOST', 'localhost'); 
define('BD_NAME', 'monroy_delivery'); //nombre base de datos
define('BD_USER', 'dwes25');   // usuario BD
define('BD_PASS', 'dwes');  //contraseña del usuario

class Database{

    private $conn;  //conexion
    public $error;

    public function __construct(){

        $this->conn= new \mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME); //intenta conectarse a BD

        if($this->conn->connect_error){
            die("error fatal de conexion". $this->conn->connect_error);

        }
        $this->conn->set_charset("utf8");
    }

    public function executeQuery($sql, $params=[]){  //para consulta que devuelven datos  --   params= valores de ? 

        $stmt= $this->conn->prepare($sql);

        if($params){
            $types= str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();  //ejecuta la consulta
        $result=$stmt->get_result(); //obtiene los resultados
        $data=$result->fetch_all(MYSQLI_ASSOC); //devuelve array asociativo con las filas
        $stmt->close();
        return $data;  //devuelve un array de filas

    }

    public function executeUpdate($sql, $params=[]){  //para consultas que modifican la BD

        $stmt=$this->conn->prepare($sql);

        if($params){

            $types=str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);

        }

        $success= $stmt->execute();

        if(!$success){

            $this->error= $stmt->error;
            return false;
        }

        $filas= $stmt->affected_rows;
        $stmt->close();
        return $filas;   //da el numero de filas afectadas

    }
    

    public function close(){
        $this->conn->close();

    }
}


?>