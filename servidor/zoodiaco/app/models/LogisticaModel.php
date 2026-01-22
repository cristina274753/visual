<?php

namespace Cristina\App\models;


use Cristina\Lib\Database;




class LogisticaModel{

    private $db;

    public function __construct(){
        $this->db= new Database();

    }

    public function obtenerPorId($id) {   //esto da el producto con ese id
        $sql = "SELECT * FROM signos WHERE id = ?";
        $result = $this->db->executeQuery($sql, [$id]);
        return $result ? $result[0] : null; //si no existe null -- si existe= devolvemos la primera fila
    }



    public function obtenerVehiculos(){
            $sql= "SELECT * FROM signos";

            return $this->db->executeQuery($sql);
        }



    public function crearProducto($asunto, $tipo_incidencia, $horas_estimadas){

        $sql= "INSERT INTO signos (asunto, tipo_incidencia, horas_estimadas) VALUES (?, ?, ?)";

        return $this->db->executeUpdate($sql, [$asunto, $tipo_incidencia, $horas_estimadas]);
    }



    //comparativa1
    public function getComparativa($s1, $s2) {
        $sql = "SELECT * FROM comparativas 
                WHERE signo1_id = ? AND signo2_id = ?";
        $res = $this->db->executeQuery($sql, [$s1, $s2]);
        return $res[0] ?? null;
    }

    

    public function actualizarProducto($id1, $id2, $datos){

        //$sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";
         $sql = "UPDATE comparativas 
                SET compatibilidad_amorosa = ?,
                compatibilidad_emocional = ?,
                compatibilidad_laboral = ?,
                compatibilidad_social = ?
                WHERE signo1_id = ? and signo2_id= ?";

                $res = $this->db->executeUpdate($sql, [
                    $datos['amorosa'], 
                    $datos['emocional'], 
                    $datos['laboral'], 
                    $datos['social'], 
                    $id1, $id2
                ]);


    return $res > 0;  //devuelve true o false


    }




    public function eliminarProducto($id) {
        $sql = "DELETE FROM signos WHERE id = ?";
        return $this->db->executeUpdate($sql, [$id]);
    }

    

}


?>