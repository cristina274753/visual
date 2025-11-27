<?php
session_start();
require_once '../dataset.php';

$errores = [];
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = intval($_GET['id'] ?? 0);

    // Validar id
    if ($id <= 0 || !isset($viajes[$id])) {
        $_SESSION['flash_message'] = "ID de viaje no válido";
        header("Location: index.php");
        exit();
    }

    // Evitar duplicados en sesión
    if (!in_array($id, $_SESSION['reservas'], true)) {
        $_SESSION['reservas'][] = $id;
        $_SESSION['flash_message'] = "Viaje a " . $viajes[$id]['destino'] . " reservado con éxito";
        
        // Guardar en CSV
        $archivo = fopen("carrito.csv", "a");
        
        if ($archivo) {
            $viaje = [
                $id,
                $viajes[$id]['destino'],
                $viajes[$id]['precio']
            ];
            
            if (fputcsv($archivo, $viaje, ";")) {
                $mensaje = "Registro completado";
            } else {
                $errores['guardarDatos'] = "Error al guardar datos";
            }
            
            fclose($archivo);
        } else {
            $errores['abrirArchivo'] = "No se pudo abrir carrito.csv";
        }
    } else {
        $_SESSION['flash_message'] = "Este viaje ya está reservado";
    }


    //guardar en archivo txt
    $archivoTxt = fopen("reservas.txt", "a");

    if ($archivoTxt) {
        $texto = "ID: $id | Destino: " . $viajes[$id]['destino'] . " | Precio: " . $viajes[$id]['precio'] . "€\n";
        fwrite($archivoTxt, $texto);
        fclose($archivoTxt);
    } else {
        $errores['abrirTxt'] = "No se pudo abrir reservas.txt";
    }
    
}

header("Location: index.php");
exit();
?>