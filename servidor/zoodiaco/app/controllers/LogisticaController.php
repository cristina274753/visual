<?php

namespace Cristina\App\controllers;

use Cristina\App\models\LogisticaModel;


class LogisticaController extends Controller
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

     //comprobar sesion de usuario
        $this->comprobarSesion();

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        

        // Cargar la vista con errores y datos previos
        self::view('index');
    }


    public function zodiaco(){

        
        
        //comprobar sesion de usuario
        $this->comprobarSesion();


        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }

        $modelo= new LogisticaModel();
        $vehiculos = $modelo->obtenerVehiculos();
        
        
        // Cargar la vista con errores y datos previos
        self::view('zodiaco', [
            'vehiculos'=>$vehiculos,
            'mensaje'=> $mensaje
        ]);
    }





    public function comparativa1(){


    //comprobar sesion de usuario
            $this->comprobarSesion();

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        
        $s1 = $_GET['s1'] ?? null;
        $s2 = $_GET['s2'] ?? null;

        //$id = htmlspecialchars(trim($_GET['id'] ?? "")); 

        if ($s1 === "") {
            $errores['id']=("Error: no se recibió un ID válido.");
        }

        $modelo= new LogisticaModel();
        $signo1= $modelo->obtenerPorId($s1);
        $signo2= $modelo->obtenerPorId($s2);
        $signos= $modelo->obtenerVehiculos();

        $comparativa= ($s2) ? $modelo->getComparativa($s1, $s2) : null;
        
        

        // Cargar la vista con errores y datos previos
        self::view('comparativa1', [
            'signos'=>$signos,
            'mensaje'=> $mensaje,
            'signo1'=> $signo1,
            'signo2'=> $signo2,
            'comparativa'=> $comparativa,
            's1'=> $s1,
            's2'=> $s2,

        ]);
    }


    //public function comparativa2($s1, $s2){
    public function comparativa2(){


    //comprobar sesion de usuario
            $this->comprobarSesion();

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        
        $s1 = $_GET['s1'] ?? null;
        $s2 = $_GET['s2'] ?? null;

        //$id = htmlspecialchars(trim($_GET['id'] ?? "")); 

        if ($s1 === "") {
            $errores['id']=("Error: no se recibió un ID válido.");
        }

        $modelo= new LogisticaModel();
        $signo1= $modelo->obtenerPorId($s1);
        $signo2= $modelo->obtenerPorId($s2);
        $signos= $modelo->obtenerVehiculos();

        $comparativa= ($s2) ? $modelo->getComparativa($s1, $s2) : null;

        if (!$comparativa) {
            $comparativa = [
                'compatibilidad_amorosa' => 0,
                'compatibilidad_emocional' => 0,
                'compatibilidad_laboral' => 0,
                'compatibilidad_social' => 0
        ];
}
        
        
 
        // Cargar la vista con errores y datos previos
        self::view('comparativa2', [
            'signos'=>$signos,
            'mensaje'=> $mensaje,
            'signo1'=> $signo1,
            'signo2'=> $signo2,
            'comparativa'=> $comparativa,
            's1'=> $s1,
            's2'=> $s2,

        ]);
    }


    public function comparativa3(){


    //comprobar sesion de usuario
            $this->comprobarSesion();

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        
        $s1 = $_GET['s1'] ?? null;
        $s2 = $_GET['s2'] ?? null;

        //$id = htmlspecialchars(trim($_GET['id'] ?? "")); 

        if ($s1 === "") {
            $errores['id']=("Error: no se recibió un ID válido.");
        }

        $modelo= new LogisticaModel();
        $signo1= $modelo->obtenerPorId($s1);
        $signo2= $modelo->obtenerPorId($s2);
        $signos= $modelo->obtenerVehiculos();

        $comparativa= ($s2) ? $modelo->getComparativa($s1, $s2) : null;
        
        

        // Cargar la vista con errores y datos previos
        self::view('comparativa3', [
            'signos'=>$signos,
            'mensaje'=> $mensaje,
            'signo1'=> $signo1,
            'signo2'=> $signo2,
            'comparativa'=> $comparativa,
            's1'=> $s1,
            's2'=> $s2,

        ]);
    }

    public function editar(): void {
        self::view('comparativa2');
    }


     public function guardar(): void {

        $s1 = $_POST['s1'] ?? null;
        $s2 = $_POST['s2'] ?? null;

        $datos = [
            'amorosa' => $_POST['amorosa'] ?? 0,
            'emocional' => $_POST['emocional'] ?? 0,
            'laboral' => $_POST['laboral'] ?? 0,
            'social' => $_POST['social'] ?? 0
        ];
        $modelo = new LogisticaModel();
        $modelo->actualizarProducto($s1, $s2, $datos);


        header("Location: " . BASE_URL . "/comparativa2?s1=".$_POST['s1']."&s2=".$_POST['s2']);
        exit;
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
        $modelo= new LogisticaModel();
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
        $modelo= new LogisticaModel();
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


        $modelo= new LogisticaModel();
        $incidencias= $modelo->obtenerVehiculos();


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


     public function triaje(){

        $puntos=0;

        $id_puntos=[
            'id'=>"",
            'puntos'=>0,
            'clasificacion'=> ""
        ];

        $clasificacion="";

        //comprobar sesion de usuario
        $this->comprobarSesion();


        $modelo= new LogisticaModel();
        $incidencias = $modelo->obtenerVehiculos();


        //INCIDENCIAS
        foreach ($incidencias as $incidencia) {

            //tipo
            if($incidencia['tipo_incidencia']=='Red'){
                $puntos+=10;

            }elseif($incidencia['tipo_incidencia']=='Hardware'){
                $puntos+=5;

            }

            //horas
            $puntos+=$incidencia['horas_estimadas']*2;

            //palaba clave  
            if(str_contains(strtolower($incidencia['asunto']),'error') || str_contains(strtolower($incidencia['asunto']),'grave') || str_contains(strtolower($incidencia['asunto']),'no funciona')){
                $puntos+=15;

            }

            //clasificacion
            if($puntos>30){
                $clasificacion="critica";

            }elseif($puntos<=30 && $puntos>=15){
                $clasificacion="urgente";

            }else{
                $clasificacion="normal";

            }

            //array con id y puntos
            $id_puntos['id']==$incidencia['id'];
            $id_puntos['puntos']==$puntos;
            $id_puntos['clasificacion']==$clasificacion;



        }


        self::view('alta_view');


    }
}
?>

