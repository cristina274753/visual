<?php

session_start();
require_once __DIR__ . "/models/IncidenciasModel.php";


$mensaje = "";
$contIncidencias=0;
$sumaHoras=0;
$mediaHoras=0;

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje']; 
    unset($_SESSION['mensaje']);

}




/* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

$modelo= new ProductosModel();
$incidencias = $modelo->obtenerIncidencias(); //nos devuelve un 

if(empty($incidencias)){
    $mensaje="no hay incidencias registradas actualmennte";



}else{

    //pintar tabla con array
    $tabla="<table class='crud-table'>";

    $tabla .= "<thead>
                            <tr>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Asunto</th>
                                <th>Horas</th>
                                <th>Acciones</th>";

                            $tabla.="</tr>
                        </thead>";


    foreach($incidencias as $incidencia){

        $contIncidencias++;
        $sumaHoras+=$incidencia['horas_estimadas'];
        $tabla .= "<tr> <td>";
                    
                    if($incidencia['estado']=='Pendiente'){

                        $tabla.="<span class='status-pendiente'>Pendiente</span>";

                    }elseif($incidencia['estado']=='En curso'){

                        $tabla.="<span class='status-encurso'>En curso</span>";
                        
                    }elseif($incidencia['estado']=='Resuelta'){

                        $tabla.="<span class='status-resuelta'>Resuelta</span>";
                    }
                    
                    
                    $tabla.="</td>
                    <td>{$incidencia['tipo_incidencia']}</td>
                    <td style='font-weight: 600;'>{$incidencia['asunto']}</td>
                    <td style='font-weight: 700; color: var(--color-primary);'>{$incidencia['horas_estimadas']}</td>";


                        $tabla.="<td>
                        
                        <a class='btn-toggle-status' href='actualizarIncidencia.php?id={$incidencia['id']}' title='Cambiar Estado'>🔄</a>

                        

                        <a class='button' href='eliminar.php?id={$incidencia['id']}'  title='Eliminar'>🗑️</a>
                    </td>";
                    }
                    
                $tabla.="</tr>";

    }

    $tabla .= "</table>";

    $mediaHoras=round($sumaHoras/$contIncidencias, 2);



include "views/index_vista.php";

?>

