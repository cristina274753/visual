<?php
namespace Pepelluyot\Lib;

class Menu {

    // Array privado que almacenará las opciones del menú
    private array $opciones = [];

    // Método para añadir nuevas opciones
    public function agregarOpcion(string $titulo, string $enlace) {
        $this->opciones[] = [
            "titulo" => $titulo,
            "enlace" => $enlace
        ];
    }

    // Método que genera el menú horizontal en formato HTML
    public function mostrarHorizontal() {
        $html = "";

        foreach ($this->opciones as $opcion) {
            $html .= '<a href="'.$opcion["enlace"].'">'.$opcion["titulo"].'</a> - ';
        }

       
        return $html;
    }
}
