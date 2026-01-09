<?php

use PepeLluyot\App\Coche;
use PepeLluyot\Lib\Utilidades;

/*require_once "./src/App/Coche.php";
require_once "./src/Lib/Utilidades.php";*/

spl_autoload_register(function ($clase) {
    
    //Definimos el prefijo que queremos quitar (tu "Vendor")
    $prefijo = 'PepeLluyot\\';
    //Quitamos el prefijo de la clase (Pepelluyot\App\Coche -> App\Coche)
    // Usamos str_replace para borrar "Pepelluyot\" del principio
    $clase_relativa = str_replace($prefijo, '', $clase);
    //Cambiamos las barras invertidas por barras de directorio (App\Coche -> App/Coche)
    $ruta = "./src/".str_replace('\\', '/', $clase_relativa) . '.php';
    if (file_exists($ruta)) require_once $ruta;
    else die("Error: No se pudo cargar la clase $clase en la ruta $ruta");
});




$coche = new Coche("Toyota", "Rav4");
$util = new Utilidades;
$util->saludar();
echo "\n";
