<?php

    session_start();


$mensaje="";
$errores=[];

$nombre="";
$p1="";
$p2="";
$p3="";

$correctas = [
    "p1" => "rojo", 
    "p2" => "sevilla", 
    "p3" => "cadiz"  
];

$acertadas=0;
$porcentaje=0;


    /* comprobar método del formulario */
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        
        /* recoger datos */
       
        $p3 = htmlspecialchars(trim($_POST['p3'] ?? ""));
        $nombre = $_SESSION['usuario'];
        $p1 = $_SESSION['p1'];
        $p2 = $_SESSION['p2'];


        if($p3==""){

            header("Location: p3.php");
            exit();
        }

        //guardar en sesion el usuario
        $_SESSION['p3']=$p3;

        
        if($p1==$correctas['p1']){
            $acertadas++;

        }
        
        if($p2==$correctas['p2']){
            $acertadas++;

        }
        
        if($p3==$correctas['p3']){
            $acertadas++;

        }

        $porcentaje = ($acertadas / 3) * 100;


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bienvenido <?php echo $_SESSION['usuario'] ?>, estos son los resultados</h1>

        
    
    
      <p class='notice'> resultado: <?php echo $porcentaje ?>%</p>
    
    
</body>
</html>