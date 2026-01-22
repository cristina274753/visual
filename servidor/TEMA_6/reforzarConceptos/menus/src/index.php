<?php

require_once __DIR__ . '/lib/Menu.php';

use Pepelluyot\Lib\Menu;

$menu = new Menu();

$menu->agregarOpcion("Google", "https://www.google.com");
$menu->agregarOpcion("Aula Virtual", "https://aulaVirtual.com");
$menu->agregarOpcion("El Tiempo", "https://www.eltiempo.com");

echo $menu->mostrarHorizontal();
