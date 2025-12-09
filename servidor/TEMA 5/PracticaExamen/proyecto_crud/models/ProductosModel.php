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

    public function crearProducto($nombre, $descripcion, $precio, $id_categoria, $sku){

        $sql= "INSERT INTO productos (nombre, descripcion, precio, id_categoria, sku) VALUES (?, ?, ?, ?, ?)";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio, $id_categoria, $sku]);
    }

    public function crearCategoria($nombre, $padre, $descripcion){

        $sql= "INSERT INTO categorias (nombre, padre_id, descripcion) VALUES (?, ?, ?)";

        return $this->db->executeUpdate($sql, [$nombre, $padre, $descripcion]);
    }

    public function crearProveedor($nombre, $nif, $tlf, $email, $direccion){

        $sql= "INSERT INTO proveedores (nombre, nif, telefono, email, direccion) VALUES (?, ?, ?, ?, ?)";

        return $this->db->executeUpdate($sql, [$nombre, $nif, $tlf, $email, $direccion]);
    }

    public function crearPedido($id, $cliente, $email, $estado, $total){

        $sql= "INSERT INTO pedidos (id_usuario, cliente_nombre, cliente_email, estado, total) VALUES (?, ?, ?, ?, ?)";

        $resultado=$this->db->executeUpdate($sql, [$id, $cliente, $email, $estado, $total]);

        if($resultado){
            // devolver el último id insertado
            return $this->db->getLastInsertId(); 
        } else {
            return false;
        }
    }

    public function crearRelacion ($resultado, $idP,$cantidad,$coste,$total){

        $sql= "INSERT INTO pedido_items (id_pedido, id_producto, cantidad, precio_unit, subtotal) VALUES (?, ?, ?, ?, ?)";

        return $this->db->executeUpdate($sql, [$resultado, $idP,$cantidad,$coste,$total]);


    }


    public function obtenerProductos(){
        $sql= "SELECT * FROM productos";

        return $this->db->executeQuery($sql);
    }

    

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $id_categoria){

        //$sql= "INSERT INTO productos (nombre, descripcion, precio, fecha_creacion) VALUES (?, ?, ?, NOW())";
         $sql = "UPDATE productos 
                SET nombre = ?, descripcion = ?, precio = ?, id_categoria=?
                WHERE id_producto = ?";

        return $this->db->executeUpdate($sql, [$nombre, $descripcion, $precio, $id_categoria, $id]);
    }

    public function eliminarProducto($id) {
        $sql = "DELETE FROM productos WHERE id_producto = ?";
        return $this->db->executeUpdate($sql, [$id]);
    }

    public function obtenerCategorias(){
        $sql="SELECT * from categorias";

        return $this->db->executeQuery($sql);
    }

    public function obtenerProveedores(){
        $sql="SELECT * from proveedores";

        return $this->db->executeQuery($sql);
    }

    public function obtenerPedidos(){
        $sql="SELECT * from pedidos";

        return $this->db->executeQuery($sql);
    }

    public function obtenerUsuarios(){
        $sql="SELECT * from usuarios";

        return $this->db->executeQuery($sql);
    }

     public function obtenerRelacion(){
        $sql="SELECT * from pedido_items";

        return $this->db->executeQuery($sql);
    }

}


?>