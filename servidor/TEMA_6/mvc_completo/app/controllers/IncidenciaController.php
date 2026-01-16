<?php

namespace Cristina\App\controllers;

use Cristina\App\models\IncidenciaModel;


class IncidenciaController extends Controller
{

    public function comprobarSesion() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location:" . BASE_URL . "/login");
            exit();
        }
    }


    //método estático
     public function index(){
        

        
        $mensaje = "";
        $contIncidencias=0;
        $mediaHoras=0;
        
        //comprobar sesion de usuario
        $this->comprobarSesion();


        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }

        /* ---- MOSTRAR TABLA DE PRODUCTOS ---- */

        $modelo= new IncidenciaModel();
        $incidencias = $modelo->obtenerIncidencias();

        
        $contIncidencias = count($incidencias);
        $sumaHoras = array_sum(array_column($incidencias, 'horas_estimadas'));
        $mediaHoras = $contIncidencias ? round($sumaHoras / $contIncidencias, 2) : 0;
            




        // Cargar la vista con errores y datos previos
        self::view('index_view', [
            'mensaje'=>$mensaje,
            'incidencias'=>$incidencias,
            'contIncidencias'=>$contIncidencias,
            'sumaHoras'=>$sumaHoras,
            'mediaHoras'=>$mediaHoras
        ]);
    }




     



    public function borrar($id){ //TODO preguntar por el id ahi



        $errores=[];

        //comprobar sesion de usuario
        $this->comprobarSesion();


        if (!isset($_SESSION['mensaje'])) {
            $_SESSION['mensaje'] = [];
        }


        //coger el id del get
       // $id = htmlspecialchars(trim($_GET['id'] ?? "")); 

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

            header("Location:".BASE_URL."/index");
            exit();
        }



    }

    

    public function modificar($id){



        $errores = [];
        //$id = "";

        $nuevoEstado="";


        //comprobar sesion de usuario
        $this->comprobarSesion();


        if (!isset($_SESSION['mensaje'])) {
            $_SESSION['mensaje'] = "";
        }



        /* ======================
            1. RECIBIR ID
        ====================== */

       // $id = trim($_GET['id'] ?? "");

        if ($id === "") {
            $errores['id']=("Error: no se recibió un ID válido.");
        }


        //usamos el modelo para que nos de el producto
        $modelo= new IncidenciaModel();
        $producto = $modelo->obtenerPorId($id); //nos devuelve el producto con ese id


        if($producto['estado']=='Pendiente'){

            $nuevoEstado="En curso";

        }elseif($producto['estado']=='En curso'){

            $nuevoEstado="Resuelta";

        }elseif($producto['estado']=='Resuelta'){

            $nuevoEstado="Pendiente";

        }else{

            $errores['estado']="el estado es incorrecto";
        }

        // 3) Cuando no hay errores
        if (empty($errores)) {
            
            $resultado = $modelo->actualizarProducto($id, $nuevoEstado);


            if(!$resultado){

                    $_SESSION['mensaje']="error al actualizar la incidencia";
                }

                // 3) Cuando no hay errores
                if (empty($errores)) {

                    $_SESSION['mensaje']="incidencia actualizada correctamente";
                    header("Location:".BASE_URL."/index");
                    exit();
                }
        }


    }
    
    
    public function alta(){




        //comprobar sesion de usuario
        $this->comprobarSesion();



        if (!isset($_SESSION['mensaje'])) {
            $_SESSION['mensaje'] = "";
        }



        self::view('alta_view');




    }

    public function alta_verificar(){


        $errores=[];
        $asunto="";
        $horas_estimadas="";
        $tipo_incidencia= "";

        //comprobar sesion de usuario
        $this->comprobarSesion();



        if (!isset($_SESSION['mensaje'])) {
            $_SESSION['mensaje'] = "";
        }


        $modelo= new IncidenciaModel();
        $incidencias= $modelo->obtenerIncidencias();


        /* recoger datos */
            $asunto = trim($_POST['asunto'] ?? "");
            $horas_estimadas = htmlspecialchars(trim($_POST['horas_estimadas'] ?? ""));
            $tipo_incidencia= htmlspecialchars(trim($_POST['tipo_incidencia'] ?? ""));

            // 2) Validación de datos
            // Verificamos si los campos están llenos
            if ($asunto === "") {
                $errores['asunto'] = "Por favor, rellena el asunto";
            } 
            if($horas_estimadas<=0) {
                $errores['horas_estimadas'] = "Por favor, rellena las horas no puede ser menor o igual a 0";

            }
            if($tipo_incidencia==""){
                $errores['tipo_incidencia'] = "Por favor, escoge un tipo";
            }

            // 3)Cuando no hay errores
            if (empty($errores)) {
                

                $resultado = $modelo->crearProducto($asunto,$tipo_incidencia, $horas_estimadas );


                if(!$resultado){


                    $errores['crear']="error al crear la incidencia";
                    header("Location:".BASE_URL."/alta");

                }else{

                    $_SESSION['mensaje']="se ha insertado correctamente la incidencia";
                    header("Location:".BASE_URL."/index");
                    exit();
                }
            }else{
                header("Location:".BASE_URL."/alta");
            }
    }


    public function logout(){

        session_start();
        session_destroy();
         header("Location:".BASE_URL."/login");
        exit();

    }
}
?>

