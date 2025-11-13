'use strict';

console.log("✅ objetos.js conectado correctamente");


class Vehiculo{  /*clase vehiculo*/
  constructor(marca,modelo, anyo, precio, stock=true){
    this.marca=marca;
    this.modelo=modelo;
    this.anyo=anyo;
    this.precio=precio;
    this.stock=stock;
  }


  /*metodos*/
  obtenerDescripcion(){  /*devuelve la extension*/
    return `Vehiculo: ${this.marca}, ${this.modelo}, ${this.anyo}, ${this.precio}, ${this.stock}`;
  }

  vender(){ /*comprobar que stock es true*/

    this.stock=0;
    return `vehiculo vendido`;
  }
}



class Coche extends Vehiculo{  /*clase coche*/
  constructor(marca, modelo, anyo, precio, stock, numeroPuertas, matricula, tipoCombustible) {
    super(marca, modelo, anyo, precio, stock);
    this.numeroPuertas=numeroPuertas;
    this.matricula=matricula;
    this.tipoCombustible=tipoCombustible;

  }


  /*metodos*/
  calcularImpuestos(){  /*devuelve la extension*/

    let impuesto=0;

    if(this.tipoCombustible=="Gasolina"){
        impuesto= this.precio*0.10;
        return impuesto;

    }else if(this.tipoCombustible=="Diesel"){
        impuesto=this.precio*0.15;
        return impuesto;

    }else if(this.tipoCombustible=="Eléctrico" || this.tipoCombustible=="Gas"){
        impuesto= this.precio*0.05;
        return impuesto;
    }
    
  }

  /*sobreescribir informacion*/

    obtenerDescripcion() {
    return `${super.obtenerDescripcion()}, Puertas: ${this.numeroPuertas}, Matrícula: ${this.matricula}, Combustible: ${this.tipoCombustible}`;
  }
}



class Motocicleta extends Vehiculo{  
  constructor(marca, modelo, anyo, precio, stock, matricula, cilindrada, tipo) {
    super(marca, modelo, anyo, precio, stock);
    this.matricula = matricula;
    this.cilindrada = cilindrada;
    this.tipo = tipo;
  }

  calcularImpuestos(){

    let impuesto=0;

    if(this.cilindrada<500){
        impuesto= this.precio*0.05;
        return impuesto;

    }else if(this.cilindrada>=500){
        impuesto=this.precio*0.15;
        return impuesto;

    }
  }

  obtenerDescripcion() {
    return `${super.obtenerDescripcion()}, Matrícula: ${this.matricula}, Cilindrada: ${this.cilindrada}cc, Tipo: ${this.tipo}`;
  }

}