
'use strict';

function Perro(nombre, edad, raza) {
    
    this.nombre=nombre;
    this.edad=edad;
    this.raza=raza;
}

Perro.prototype.mostrarDatos= function(){
    return  `nombre: ${this.nombre} edad: (${this.edad}) raza: ${this.raza}`;
}