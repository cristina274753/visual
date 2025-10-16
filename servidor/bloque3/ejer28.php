<?php

$archivo = "productos.txt";

$contenido ="";

$productos = [];

function cargarProductosDesdeArchivo($archivo){


    $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Extrae la primera línea como encabezados
    $encabezados = str_getcsv(array_shift($lineas));

    // Recorre cada línea y construye el array asociativo
    foreach ($lineas as $linea) {
        $valores = str_getcsv($linea);
        $producto = array_combine($encabezados, $valores);
        $productos[] = $producto;
    }


}

function imprimirProductos($productos){

    foreach ($productos as $producto) {
        echo "Nombre: " . htmlspecialchars($producto['nombre']) . "<br>";
        echo "Precio: " . htmlspecialchars($producto['precio']) . "<br>";
        echo "Cantidad: " . htmlspecialchars($producto['cantidad']) . "<br>";
        echo "<hr>";
    }

}


if (!file_exists($archivo)) {
    $contenido = "El archivo no existe";
} else {
    cargarProductosDesdeArchivo($archivo);
    imprimirProductos($productos);
}


?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>validar texto</title>
    
</head>

<body>

    
</body>
</html>
