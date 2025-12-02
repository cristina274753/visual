<?php

require_once "config/sesiones.php";
require_once "config/db.php";

$errores = [];
$mensaje = "";

/* ---- PROCESAR ACCIONES (ANTES DE MOSTRAR NADA) ---- */

if (isset($_GET['actualizar'])) {
    $id = trim($_GET['actualizar']);


    if ($id === "") {
        $errores[] = "ID vacío";
    } else {
      
        header("Location: actualizarProducto.php?id=$id");
        exit();
    }
}

if (isset($_GET['eliminar'])) {
    $id = trim($_GET['eliminar']);


    if ($id === "") {
        $errores[] = "ID vacío";
    } else {

        header("Location: eliminar.php?id=$id");
        exit();
    }
}

if (isset($_GET['anadir'])) {

    header("Location: insertar.php");
    exit();
}


/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

$conexion = new mysqli("localhost", "usuario_tienda", "1234", "tienda");

if ($conexion->connect_error) {
    $mensaje .= "Error en la conexión. Fin.";
} else {

    $resultado = $conexion->query("SELECT * FROM productos");

    if ($resultado->num_rows > 0) {

        $mensaje .= "<br><table><caption>Lista de productos:</caption>";
        $mensaje .= "<thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>";

        while ($fila = $resultado->fetch_assoc()) {

            $mensaje .= "<tr>
                <td>{$fila['id_producto']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['descripcion']}</td>
                <td>{$fila['precio']}</td>
                <td>
                    <form method='GET' style='display:inline'>
                        <button name='actualizar' value='{$fila['id_producto']}'>Actualizar</button>
                    </form>

                    <form method='GET' style='display:inline'>
                        <button name='eliminar' value='{$fila['id_producto']}'>Eliminar</button>
                    </form>
                </td>
            </tr>";
        }

        $mensaje .= "</table>";

    } else {
        $mensaje .= "No se encontraron productos";
    }
}

$conexion->close();

include "views/index_vista.php";

?>

