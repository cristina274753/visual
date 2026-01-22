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

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        
        //comprobar sesion de usuario
        $this->comprobarSesion();

        $modelo= new LogisticaModel();
        $vehiculos = $modelo->obtenerVehiculos();
        
        
            




        // Cargar la vista con errores y datos previos
        self::view('index_view', [
            'vehiculos'=>$vehiculos,
            'mensaje'=> $mensaje
        ]);
    }



      public function carga(){

        $mensaje="";

        if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }
        
        //comprobar sesion de usuario
        $this->comprobarSesion();

        $id = $_GET['id'] ?? null;
        $_SESSION['id_vehiculo']=$id;

        //seguridad
        if (!isset($_SESSION['id_vehiculo'])) {
            $_SESSION['mensaje']= 'selecciona uno de los vehiculos disponibles';
            header("Location:" . BASE_URL . "/index");

            
            exit();
        }

        //carga de datos
        $modelo= new LogisticaModel();
        $vehiculo = $modelo->obtenerPorId($_SESSION['id_vehiculo']);

        //listado de los paquetes con estado pendiente 
        $paquetes= $modelo->listadosPaquetes();


        $carga=0;
        $volumen=0;

        $maximoCarga=$vehiculo['carga_maxima'];
        $maximoVolumen=$vehiculo['volumen_maximo'];
            




        // Cargar la vista con errores y datos previos
        self::view('carga_view', [
            'vehiculo'=>$vehiculo,
            'mensaje'=> $mensaje,
            'paquetes'=>$paquetes,
            'carga'=>$carga,
            'maximoCarga'=>$maximoCarga,
            'maximoVolumen'=>$maximoVolumen,
            'volumen'=>$volumen
        ]);
    }

    


    public function calcularCarga(){

        $mensaje="";

        /*if (isset($_SESSION['mensaje'])) {
            $mensaje = $_SESSION['mensaje']; 
            unset($_SESSION['mensaje']);

        }*/
        
        //comprobar sesion de usuario
        $this->comprobarSesion();


        //seguridad
        if (!isset($_SESSION['id_vehiculo'])) {
            header("Location:" . BASE_URL . "/vehiculos");

            $_SESSION['mensaje']= 'selecciona uno de los vehiculos disponibles';
            exit();
        }

        //carga de datos
        $modelo= new LogisticaModel();
        $vehiculo = $modelo->obtenerPorId($_SESSION['id_vehiculo']);

        //listado de los paquetes con estado pendiente 
        $paquetes= $modelo->listadosPaquetes();


        
        $carga=0;
        $maximoCarga=$vehiculo['carga_maxima'];
        $cargaSobrante= $maximoCarga-$carga;
        $volumen=0;
        $maximoVolumen=$vehiculo['volumen_maximo'];
        $volumenSobrante= $maximoVolumen-$volumen;
        

        

        $pesoPaquete=0;
        
        foreach ($paquetes as $paquete){

            $pesoPaquete= $paquete['peso'];
            $volumenPaquete= $paquete['volumen'];

            if($pesoPaquete<=$cargaSobrante){

                if($volumenPaquete<=$volumenSobrante){
                    $aceptados[]=$paquete;
                    $carga+=(int)$paquete['peso'];  //pasar a numero 
                    $volumen+=(int)$paquete['volumen'];
                }
                
            }
        }
            
        




        // Cargar la vista con errores y datos previos
        self::view('carga_view2', [
            'vehiculo'=>$vehiculo,
            'mensaje'=> $mensaje,
            'paquetes'=>$paquetes,
            'carga'=>$carga,
            'maximoCarga'=>$maximoCarga,
            'maximoVolumen'=>$maximoVolumen,
            'volumen'=>$volumen,
            'aceptados'=> $aceptados
        ]);
    }

     public function confirmarEnvio(){

        $aceptados = $_POST['aceptados'] ?? null;


        if($aceptados!==null){
            $_SESSION['paquetes']= $aceptados;

            $_SESSION['mensaje']= 'vehiculo cargado con exito. buen viaje';
            header("Location: " . BASE_URL . "/index");

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

