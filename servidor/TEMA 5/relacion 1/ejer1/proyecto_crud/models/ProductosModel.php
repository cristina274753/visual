<?php

require_once APP_ROOT. 'config/db.php';

class ProductosModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function crearProducto($nombre, $descripcion, $precio){

        $sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio]);
    }

    public function obtenerTodos(){
        $sql= "SELECT * FROM productos";

        return $this->db->executeQuery($sql);
    }

    public function actualizarProducto($nombre, $descripcion, $precio){

        //$sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio]);
    }

}


?>