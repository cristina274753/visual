<?php

session_start();
require_once 'datos_musica.php';

/*si quiero leerlo de un archivo

function leerCancionesCSV($archivo){
    $canciones = [];
    if (($handle = fopen($archivo, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ";")) !== false) {
            // $data[0] = id, $data[1] = título, $data[2] = artista
            $canciones[] = [
                'id' => $data[0],
                'titulo' => $data[1],
                'artista' => $data[2]
            ];
        }
        fclose($handle);
    }
    return $canciones;

$canciones = leerCancionesCSV('canciones.csv'); // leer desde CSV


    */

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
$lista="<h2>Lista de canciones</h2>";

foreach($canciones as $cancion){
    $lista.="

        <p> id: ". $cancion['id'] ." / titulo: ". $cancion['titulo'] ." / artista: ". $cancion['artista']."
        <form action='' method='get'>  
                <input type='hidden' name='id' value='".$cancion['id']."'>
                <input type='submit' name='borrar' value='borrar'>
                <input type='submit' name='anadir' value='añadir'></form></p>
    ";
}


/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['anadir'])) {
    
    /* recoger datos */
    $id = trim($_GET['id'] ?? "");
    
    $_SESSION['carrito'][]=$id;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['borrar'])) {
    
    /* recoger datos */
    $id = trim($_GET['id'] ?? "");
    
    if (($key = array_search($id, $_SESSION['carrito'])) !== false) {
        
        unset($_SESSION['carrito'][$key]);
        // Reindexar el array para mantener los índices correctos
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['carrito'])) {
    
    header("Location: carrito.php");
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
</head>
<body>
    <?php
        echo $lista;
    ?>

        <form name="myForm" action="" method="post">
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="carrito" value="carrito">
          </div>
    
        </form>
    
</body>
</html>