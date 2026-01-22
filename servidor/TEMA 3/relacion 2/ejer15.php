<?php

    function generarTabla($num) {
        $cont=1;

        $tabla="<table>";

        for ($fila = 0; $fila < $num; $fila++) {
            $table .= "<tr>";

            for ($columna = 0; $columna < $num; $columna++) {
                $tabla .= "<td>$cont</td>";
                $cont++;
            }
            $tabla .= "</tr>"; 
        }

        $tabla .= "</table>";
        return $tabla;


    }

?>