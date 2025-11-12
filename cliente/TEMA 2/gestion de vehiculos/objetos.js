'use strict';

class Vehiculo{  /*clase vehiculo*/
  constructor(marca,modelo, anyo, precio, stock){
    this.marca=marca;
    this.modelo=modelo;
    this.anyo=anyo;
    this.precio=precio;
    this.stock=stock;
  }


  /*metodos*/
  ObtenerDescripcion(){  /*devuelve la extension*/
    return `Vehiculo: ${this.marca}, ${this.modelo}, ${this.anyo}, ${this.precio}, ${this.stock}`;
  }

  Vender(){

    this.stock=0;
    return `vehiculo vendido`;
  }
}



class Coche{  /*clase coche*/
  constructor(numeroPuertas,matricula, tipoCombustible){
    this.numeroPuertas=numeroPuertas;
    this.matricula=matricula;
    this.tipoCombustible=tipoCombustible;

  }


  /*metodos*/
  calcularImpuestos(){  /*devuelve la extension*/

    let impuesto=0;

    if(this.tipoCombustible=="gasolina"){
        impuesto= this.precio*0.10;
        return impuesto;

    }else if(this.tipoCombustible=="diesel"){
        impuesto=this.precio*0.15;
        return impuesto;

    }else if(this.tipoCombustible=="electrico" || this.tipoCombustible=="gas"){
        impuesto= this.precio*0.05;
        return impuesto;
    }
    
  }

  Vender(){

    this.stock=0;
    return `vehiculo vendido`;
  }
}



class Motocicleta extends Coche{  
  constructor(numeroPuertas,matricula, tipoCombustible, matricula, cilindrada, tipo){
    super(numeroPuertas, matricula, tipoCombustible);
    this.matricula = matricula;
    this.cilindrada = cilindrada;
    this.tipo=tipo;
  }

  CalcularImpuesto(){

    let impuesto=0;

    if(this.cilindrada<500){
        impuesto= this.precio*0.05;
        return impuesto;

    }else if(this.cilindrada>=500){
        impuesto=this.precio*0.15;
        return impuesto;

    }
  }

  /*sobreescribir obtenerDescripcion() para incluir porpiedades de los obj coches y motos*/
}