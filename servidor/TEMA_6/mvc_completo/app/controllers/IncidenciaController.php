<?php

namespace Cristina\App\controllers;

use Cristina\App\models\IncidenciaModel;


class IncidenciaController extends Controller
{
    //método estático
     public function index(){
        

        session_start();
        



        $mensaje = "";
        $contIncidencias=0;
        $sumaHoras=0;
        $mediaHoras=0;

        

        //comprobar sesion de usuario
        if (!isset($_SESSION['usuario'])) {
            header("Location: /php/TEMA_6/mvc_completo/public/login");
            exit();
        }

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }




        /* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

        $modelo= new IncidenciaModel();
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
                                
                                <a class='btn-toggle-status' href='actualizarProducto.php?id={$incidencia['id']}' title='Cambiar Estado'>🔄</a>

                                

                                <a class='button' href='eliminar.php?id={$incidencia['id']}'  title='Eliminar'>🗑️</a>
                            </td>";
                            }
                            
                        $tabla.="</tr>";

            }

            $tabla .= "</table>";

            $mediaHoras=round($sumaHoras/$contIncidencias, 2);




        // Cargar la vista con errores y datos previos
        self::view('index_view', [
            'mensaje'=>$mensaje,
            'contIncidencias'=>$contIncidencias,
            'sumaHoras'=>$sumaHoras,
            'mediaHoras'=>$mediaHoras,
            'tabla'=>$tabla

        ]);
    }




     



    public function borrar(){


        session_start();



        $errores=[];

        //comprobar sesion de usuario
        if (!isset($_SESSION['usuario'])) {
            header("Location: login.php");
            exit();
        }

        if (!isset($_SESSION['mensaje'])) {
            $_SESSION['mensaje'] = [];
        }


        //coger el id del get
        $id = htmlspecialchars(trim($_GET['id'] ?? "")); 

        //id es un valor correcto (un número o dígito) iscdigit_type

        //usamos el modelo para que nos de el producto
        $modelo= new IncidenciaModel();
        $producto = $modelo->obtenerPorId($id); //nos devuelve el producto con ese id


        //comprobamos que producto existe
        if(!$producto){
            $errores['incidencia']="no existe la incidencia";

        }

        // 3) Cuando no hay errores
        if (empty($errores)) {
            
            if($modelo->eliminarProducto($id)){
                $_SESSION['mensaje']= "incidencia eliminada correctamanete";

            }else{
                $_SESSION['mensaje']="no se ha eliminado la incidencia";

            }

            header("Location: /php/TEMA_6/mvc_completo/public/index");
            exit();
        }



    }

    public function alta(){


    }

    public function modificar(){


    }
}
?>

