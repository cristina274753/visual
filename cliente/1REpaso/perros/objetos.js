'use strict';
console.log("obj");

class Perro {

    constructor(nombre, edad, raza){
          this.nombre = nombre;  
          this.edad = edad;
          this.raza = raza;
    }
    

    mostrarDatos(){

        return "Animal: nombre= "+this.nombre+ ", edad= "+ this.edad+ 
        ", raza= "+ this.raza;
    }
}