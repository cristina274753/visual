<?php

namespace Pepelluyot\App;

class Baraja
{
    // Propiedades privadas
    private array $palos = ["Oros", "Copas", "Espadas", "Bastos"];
    private array $numeros = [1, 2, 3, 4, 5, 6, 7, "Sota", "Caballo", "Rey"];
    private array $cartas = [];

    // Constructor
    public function __construct()
    {
        $this->generarBaraja();
    }

    // Método privado: genera la baraja completa
    private function generarBaraja(): void
    {
        foreach ($this->palos as $palo) {
            foreach ($this->numeros as $numero) {
                $this->cartas[] = [
                    "palo" => $palo,
                    "numero" => $numero,
                    "descripcion" => "$numero de $palo"
                ];
            }
        }
    }

    // Mostrar todas las cartas
    public function mostrarBaraja(): void
    {
        foreach ($this->cartas as $carta) {
            echo $carta["descripcion"] . "<br>";
        }
    }

    // Mezclar la baraja
    public function mezclar(): void
    {
        shuffle($this->cartas);
    }

    // Contar cartas restantes
    public function contarCartas(): int
    {
        return count($this->cartas);
    }

    // Método privado: sacar una carta
    private function sacarUna(): ?array
    {
        return array_pop($this->cartas);
    }

    // Repartir varias cartas
    public function repartir(int $cantidad): array
    {
        $repartidas = [];

        for ($i = 0; $i < $cantidad; $i++) {
            if ($this->contarCartas() === 0) {
                echo "⚠️ No quedan más cartas en la baraja.<br>";
                break;
            }
            $repartidas[] = $this->sacarUna();
        }

        return $repartidas;
    }
}
