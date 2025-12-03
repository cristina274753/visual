<?php

require_once __DIR__. '/../config/Database.php';


class ProductosModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function obtenerPorId($id) {   //esto da el producto con ese id
        $sql = "SELECT * FROM productos WHERE id_producto = ?";
        $result = $this->db->executeQuery($sql, [$id]);
        return $result ? $result[0] : null; //si no existe null -- si existe= devolvemos la primera fila
    }

    public function crearProducto($nombre, $descripcion, $precio){

        $sql= "INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio]);
    }

    public function obtenerTodos(){
        $sql= "SELECT * FROM productos";

        return $this->db->executeQuery($sql);
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio){

        //$sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";
         $sql = "UPDATE productos 
                SET nombre = ?, descripcion = ?, precio = ?
                WHERE id_producto = ?";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio, $id]);
    }

    public function eliminarProducto($id) {
        $sql = "DELETE FROM productos WHERE id_producto = ?";
        return $this->db->executeUpdate($sql, [$id]);
    }

}


?>