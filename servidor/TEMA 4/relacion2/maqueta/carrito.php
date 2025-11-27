<?php

session_start();
require_once '../dataset.php';

//csv
function CargarReservas() {
    $archivo = fopen("carrito.csv", "r");
    $reservas = [];
    while (( $linea = fgetcsv($archivo, 0, ";")) !== false) {
        $reservas[] = $linea;
    }
    fclose($archivo);
    return $reservas;
}

//txt
function CargarReservasTxt() {
    if (!file_exists("reservas.txt")) {
        return [];
    }

    $lineas = file("reservas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $reservas = [];

    foreach ($lineas as $linea) {
        // Formato: ID: 3 | Destino: París | Precio: 500€
        $partes = explode("|", $linea);

        $id = trim(str_replace("ID:", "", $partes[0]));
        $destino = trim(str_replace("Destino:", "", $partes[1]));
        $precio = trim(str_replace("Precio:", "", $partes[2]));

        $reservas[] = [$id, $destino, $precio];
    }

    return $reservas;
}


$mostrar="

    <h1>Lista de reservas </h1>
";

//csv
foreach(CargarReservas() as $reserva){

    $mostrar.="<p> id:".$reserva[0]." / lugar: ".$reserva[1]." / precio: ".$reserva[2]." <form action='' method='get'> 
                <input type='hidden' name='id' value='$reserva[0]'>
                <input type='submit' name='borrar' value='borrar'></form>
                
                </p>";
}

//txt
foreach(CargarReservasTxt() as $reserva){

    $mostrar.="<p> idtxt:".$reserva[0]." / lugar: ".$reserva[1]." / precio: ".$reserva[2]." 
                <form action='' method='get'>
                    <input type='hidden' name='id' value='$reserva[0]'>
                    <input type='submit' name='borrar' value='borrar'>
                </form>
               </p>";
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tienda'])) {
    
    header("Location: index.php");
    exit();
}

//borrar reservas por separado cambiar sesion y csv y txt
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['borrar'])) {

    $id = trim($_GET['id'] ?? "");

    // Sesiones
    $index = array_search($id, $_SESSION['reservas']);

    if ($index !== false) {
        unset($_SESSION['reservas'][$index]);
    }

    // CSV 
    $reservas = CargarReservas();
    $nuevas = [];

    foreach ($reservas as $r) {
        if ($r[0] != $id) {
            $nuevas[] = $r;
        }
    }

    $archivo = fopen("carrito.csv", "w");
    foreach ($nuevas as $r) {
        fputcsv($archivo, $r, ";");
    }
    fclose($archivo);

    // TXT
    if (file_exists("reservas.txt")) {
        $reservasTxt = CargarReservasTxt();
        $nuevas = [];

        foreach ($reservasTxt as $r) {
            if ($r[0] != $id) {  // Mantener solo las que no coinciden con $id
                // Reconstruir el formato original
                $nuevas[] = "ID: {$r[0]} | Destino: {$r[1]} | Precio: {$r[2]}";
            }
        }

        file_put_contents("reservas.txt", implode("\n", $nuevas) . "\n");
    }

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
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
    <?php
        echo $mostrar;
    ?>

    <form name="myForm" action="" method="post">
    
          <!-- Acciones -->
          <div class="actions" style="margin-top:1rem">
            <input type="submit" name="tienda" value="tienda">
          </div>
    
        </form>
</body>
</html>