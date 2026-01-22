<?php
class Coche
{
    public string $marca = '';
    public string $modelo = '';
    public int $anyo = 2000;

    //mostrarmos la información del coche
    public function mostrarInfo()
    {
        //no se debe hacer
        echo "Marca: " . $this->marca . " - Modelo: " . $this->modelo . " - Año :" . $this->anyo . "\n";
    }
    //actualiza el eño de un coche
    public function actualizarAnyo(int $anyo)
    {
        $this->anyo = $anyo;
    }
};

$coche = new Coche();
$coche->marca = "Volkswagen";
$coche->modelo = "Passat";
// $coche->anyo = 2006;
//mostrar la información del coche
$coche->mostrarInfo();

$coche2 = new Coche();
$coche2->marca = "Peugeot";
$coche2->modelo = "208";
$coche2->anyo = 2015;

//mostrar la información del coche
$coche2->mostrarInfo();

//mostrar la información del coche
$coche2->actualizarAnyo(2025);
$coche2->mostrarInfo();
