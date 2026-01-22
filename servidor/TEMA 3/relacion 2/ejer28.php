<?php

    $contenido = "";
    $archivo = 'productos.txt';
    $arrayTitulos = ["ID", "Nombre", "Precio", "Stock"];

    function cargarProductosDesdeArchivo($fichero)
    {
        $listaProductos = [];  

        $manejador = @fopen($fichero, "r");

        if ($manejador) {

            while (!feof($manejador)) {
                $linea = fgets($manejador);

                $datosProducto = explode("|", trim($linea));
                $listaProductos[] = $datosProducto;
            }
            fclose($manejador);
        }
        else {
            return null;
        }
        return $listaProductos;
    }


    function tablaArrayHTML($arrayBidimensional, $arrayTitulos = null)
    {
        $tabla = "";

        if (!is_array($arrayBidimensional)) return "";

        if (empty($arrayBidimensional)) return "";

        $tabla = "<table>";

        if ($arrayTitulos != null) {
            $tabla .= "<thead><tr>";

            foreach ($arrayTitulos as $titulo) {
                $tabla .= "<th>$titulo</th>";
            }
            $tabla .= "</tr></thead>";
        }

        $tabla .= "<tbody>";
        foreach ($arrayBidimensional as $arrayFila) {
            $tabla .= "<tr>";
            foreach ($arrayFila as $columna) {
                $tabla .= "<td>$columna</td>";
            }
            $tabla .= "</tr>";
        }

        $tabla .= "</tbody>";
        $tabla .= "</table>";
        return $tabla;
    }





    $archivo = 'productos.txt';

    if (!file_exists($archivo)) {
        $contenido = "El fichero no existe";
    } else {

        $productos = cargarProductosDesdeArchivo($archivo);
        //si devuelve algún producto, lo mostramos en una tabla HTML
        if (!empty($productos)) {
            $contenido = tablaArrayHTML($productos, $arrayTitulos);
        } elseif ($productos === null) {
            $contenido = "Error al cargar los productos.";
        } else {
            $contenido = "No se encontraron productos en el archivo.";
        }
    }




?>