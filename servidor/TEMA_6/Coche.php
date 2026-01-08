<?php
/****************************************************************************************
* EJERCICIO 1 – Introducción a la POO
****************************************************************************************/

class CocheBasico {
    public $marca;
    public $modelo;
    public $anio;

    public function mostrarInfo() {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Año: {$this->anio}";
    }
    
    public function actualizarAño($nuevoAnio) {
        $this->anio = $nuevoAnio;
    }
}

echo "<h2>EJERCICIO 1</h2>";
$c1 = new CocheBasico();
$c1->marca = "Ford";
$c1->modelo = "Fiesta";
$c1->anio  = 2012;

$c2 = new CocheBasico();
$c2->marca = "Seat";
$c2->modelo = "Ibiza";
$c2->anio  = 2015;

echo $c1->mostrarInfo()."<br>";
echo $c2->mostrarInfo()."<br>";

$c1->actualizarAño(2020);
echo "Tras actualizar: ".$c1->mostrarInfo()."<br><br>";



/****************************************************************************************
* EJERCICIO 2 – Constructor
****************************************************************************************/

class CocheConConstructor {
    public $marca;
    public $modelo;
    public $anio;

    public function __construct($marca, $modelo, $anio) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
    }

    public function mostrarInfo() {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Año: {$this->anio}";
    }
}

echo "<h2>EJERCICIO 2</h2>";

$c3 = new CocheConConstructor("Audi", "A3", 2019);
echo $c3->mostrarInfo()."<br><br>";



/****************************************************************************************
* EJERCICIO 3 – Encapsulación
****************************************************************************************/

class CocheEncapsulado {
    private $marca;
    private $modelo;
    private $anio;

    public function __construct($m = "", $mod = "", $a = 0) {
        $this->marca = $m;
        $this->modelo = $mod;
        $this->anio = $a;
    }

    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getAño()   { return $this->anio; }

    public function setMarca($x) { $this->marca = $x; }
    public function setModelo($x) { $this->modelo = $x; }
    public function setAño($x)   { $this->anio = $x; }
}

echo "<h2>EJERCICIO 3</h2>";

$c4 = new CocheEncapsulado();
$c4->setMarca("BMW");
$c4->setModelo("X1");
$c4->setAño(2021);

echo $c4->getMarca()." ".$c4->getModelo()." - ".$c4->getAño()."<br><br>";



/****************************************************************************************
* EJERCICIO 4 – Optimización + Magic Methods + Validación + Destructor
****************************************************************************************/

class Coche {
    private static int $cantidadCoches = 0;   // ← Para EJERCICIO 5

    public function __construct(
        private string $marca,
        private string $modelo,
        private int $anio = 2000
    ) {
        self::$cantidadCoches++; // contador estático
    }

    public function __get($p) {
        if (property_exists($this, $p)) {
            return $this->$p;
        }
        echo "⚠️ La propiedad '$p' no existe.<br>";
        return null;
    }

    public function __set($p, $v) {
        if (!property_exists($this, $p)) {
            echo "⚠️ No se puede asignar '$p': no existe.<br>";
            return;
        }

        if ($p === "anio" && $v < 1886) {
            echo "❌ Error: el año no puede ser menor que 1886.<br>";
            return;
        }

        $this->$p = $v;
    }

    public function compararAntiguedad(Coche $otro) {
        if ($this->anio > $otro->anio) return "{$this->marca} es más nuevo";
        if ($this->anio < $otro->anio) return "{$otro->marca} es más nuevo";
        return "Son del mismo año";
    }

    public function __destruct() {
        self::$cantidadCoches--;
        echo "💀 El coche {$this->marca} {$this->modelo} está siendo desguazado.<br>";
    }

    /* ------------------- EJERCICIO 5 – MÉTODOS ESTÁTICOS ------------------- */

    public static function getTotalCoches() {
        return self::$cantidadCoches;
    }
}

echo "<h2>EJERCICIO 4</h2>";

$c5 = new Coche("Renault", "Megane", 2010);

echo "Modelo: ".$c5->modelo."<br>";
$c5->modelo = "Clio";
echo "Modelo actualizado: ".$c5->modelo."<br>";

$c5->novale = "xxx";   // propiedad que no existe
$c5->anio = 1500;      // año inválido

echo "<br>";

$c6 = new Coche("Mercedes", "C200", 2020);
echo $c5->compararAntiguedad($c6)."<br><br>";

unset($c6); // fuerza destructor


/****************************************************************************************
* EJERCICIO 5 – Propiedades y Métodos Estáticos
****************************************************************************************/

echo "<h2>EJERCICIO 5</h2>";

echo "Coches actuales: ".Coche::getTotalCoches()."<br>";

$a = new Coche("Opel", "Corsa", 2005);
$b = new Coche("Nissan", "Micra", 2008);

echo "Tras crear objetos: ".Coche::getTotalCoches()."<br>";

unset($a);

echo "Tras borrar uno: ".Coche::getTotalCoches()."<br><br>";



/****************************************************************************************
* EJERCICIO 6 – ORGANIZACIÓN DEL PROYECTO CON NAMESPACES
* (ESTO NO SE PUEDE EJECUTAR EN UN ÚNICO ARCHIVO — es solo para mostrar los archivos)
****************************************************************************************/

echo "<h2>EJERCICIO 6 (Namespaces) — CÓDIGO MOSTRADO ABAJO</h2>";

echo "<p>Consulta el final del archivo para ver los archivos separados.</p>";

?>
