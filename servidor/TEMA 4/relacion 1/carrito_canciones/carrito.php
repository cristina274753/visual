<?php

session_start();
require_once 'datos_musica.php';


/*si quiero leer de un archivo

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

$lista= "<h1> carrito de canciones </h1>";

if(!isset($_SESSION['carrito'])){
        $lista.= "<p> no hay canciones en el carrito </p>";
}



foreach($_SESSION['carrito'] as $id){

    foreach($canciones as $cancion){
        if($cancion['id']== $id){

            $lista.="<p> id: ". $cancion['id'] ." / titulo: ". $cancion['titulo'] ." / artista: ". $cancion['artista']."
            ";
        }
    }
    
}

/* comprobar método del formulario */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tienda'])) {
    
    header("Location: tienda.php");
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
            <input type="submit" name="tienda" value="tienda">
          </div>
    
        </form>
  
</body>
</html>

