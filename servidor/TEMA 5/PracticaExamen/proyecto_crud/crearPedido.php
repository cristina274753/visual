<?php

session_start();
require_once __DIR__ . "/models/ProductosModel.php";

$errores=[];
$nombre="";
$descripcion="";
$precio="";
$mensaje=[];
$categorias=[];
$categoria= "";
$categoriaNueva="";
$sku="";


//vamos a pedir el producto, cantidad
$producto="";
$cantidad=0;
$id="";
$cliente="";
$email=null;
$estado="pendiente";
$coste=0;
$total=0;
$idP=0;

//comprobar sesion de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['mensaje'])) {
    $_SESSION['mensaje'] = "";
}


 $modelo= new ProductosModel();
$productos= $modelo->obtenerProductos();




//añadir con formulario

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    
    /* recoger datos */
    $cantidad = trim($_POST['cantidad'] ?? "");
    $producto= htmlspecialchars(trim($_POST['producto'] ?? ""));

    // 2) Validación de datos
    // Verificamos si los campos están llenos
    if ($producto === "") {
        $errores['producto'] = "Por favor, rellena el nombre";
    } elseif($cantidad<=0) {
        $errores['cantidad'] = "Por favor, rellena el precio no puede ser menor o igual a 0";

    }


    // 3)Cuando no hay errores
    if (empty($errores)) {
        
        $usuarios=$modelo->obtenerUsuarios();

        foreach($usuarios as $u){

            if($u['usuario']==$_SESSION['usuario']){
                $id=$u['id'];
                $cliente=$u['nombre_completo'];
            }
        }


        foreach($productos as $p){

            if($p['id_producto']==$producto){
                
                 $total=$cantidad*$p['precio'];
                 $coste=$p['precio'];
            }
           
        }

        $resultado = $modelo->crearPedido($id, $cliente, $email, $estado, $coste);

        
        
        if(!$resultado){

            $_SESSION['mensaje']="error al crear el producto";

        }else{


            
            $relacion= $modelo->crearRelacion($resultado, $producto,$cantidad,$coste,$total);

            if(!$relacion){

                $_SESSION['mensaje']="error al crear el producto";

            }else{



                $_SESSION['mensaje']="se ha insertado correctamente el producto";
                header("Location: index.php");
                exit();
            }



            
        }

        

        

    }
}





include "views/crearPedido_vista.php";

?>


