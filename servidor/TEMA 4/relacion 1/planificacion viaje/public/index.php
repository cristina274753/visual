<?php

    $pagina = $_GET['p'] ?? 'inicio';
    $errores=[];

    $paginas_permitidas=[

        'inicio',
        'nosotros',
        'contacto'

    ];

    if (!in_array($pagina, $paginas_permitidas)){

        header ("HTTP/1.0 404 Not Found");
        $pagina = '404';
    }else{

        session_start();

        define('APP_ROOT', dirname(__DIR__));

        include APP_ROOT .'/includes/header.php';

        include APP_ROOT ."/vistas/{$pagina}.php";

        include APP_ROOT .'/includes/footer.php';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){


        /* recoger datos */
        $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ""));

        // 2) Validación de datos
        if ($nombre === "" ) {
            
            $errores[]= "Por favor, rellena el campo";
        }

        // 3)Cuando no hay errores
        if (empty($errores)) {

        $_SESSION['flash_msg'] = 'Gracias'.$nombre.' hemos recibido tu mensaje';
        header('Location: index.php?p=contacto');
        exit();
            
        }

        
    }

    $mensaje= $_SESSION['flash_msg'] ?? null;

    if($mensaje){
        unset($_SESSION['flash_msg']);
    }

?>