<?php
    class Coche{
        public string $marca='';
        public string $modelo='';
        public int $anyo=2000;

        public function mostrarInfo(){
            //no se debe hacer
            echo "Marca: ".$this->marca. " - Modelo: ". $this->modelo . " - Año :". $this->anyo;
        }
    };

    $coche = new Coche();
    $coche->marca = "Volkswagen";
    $coche->modelo = "Passat";
    $coche->anyo = 2006;

    $coche->mostrarInfo();

