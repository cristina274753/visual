<?php

require_once "autoload.php";

use Pepelluyot\App\Baraja;

$baraja = new Baraja();

echo "<h3>📦 Baraja inicial</h3>";
$baraja->mostrarBaraja();

echo "<hr>";
echo "<h3>🔀 Baraja mezclada</h3>";
$baraja->mezclar();
$baraja->mostrarBaraja();

echo "<hr>";
echo "<h3>🧮 Cartas restantes</h3>";
echo $baraja->contarCartas();

echo "<hr>";
echo "<h3>🃏 Repartiendo 5 cartas</h3>";
$cartas = $baraja->repartir(5);

foreach ($cartas as $carta) {
    echo $carta["descripcion"] . "<br>";
}

echo "<hr>";
echo "<h3>🧮 Cartas restantes tras repartir</h3>";
echo $baraja->contarCartas();
