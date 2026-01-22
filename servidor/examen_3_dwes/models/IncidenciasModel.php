<?php

require_once __DIR__. '/../config/Database.php';


class ProductosModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function obtenerPorId($id) {   //esto da el producto con ese id
        $sql = "SELECT * FROM incidencias WHERE id = ?";
        $result = $this->db->executeQuery($sql, [$id]);
        return $result ? $result[0] : null; //si no existe null -- si existe= devolvemos la primera fila
    }

    public function crearIncidencia($asunto, $tipo_incidencia, $horas_estimadas){

        $sql= "INSERT INTO incidencias (asunto, tipo_incidencia, horas_estimadas) VALUES (?, ?, ?)";

        return $this->db->executeUpdate($sql, [$asunto, $tipo_incidencia, $horas_estimadas]);
    }

    public function obtenerIncidencias(){
        $sql= "SELECT * FROM incidencias";

        return $this->db->executeQuery($sql);
    }

    public function actualizarIncidencia($id, $estado){

        //$sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";
         $sql = "UPDATE incidencias 
                SET estado = ?
                WHERE id = ?";

        return $this->db->executeUpdate($sql, [$estado, $id]);
    }

    public function eliminarProducto($id) {
        $sql = "DELETE FROM incidencias WHERE id = ?";
        return $this->db->executeUpdate($sql, [$id]);
    }

    

}


?>