'use strict';




class Vehiculo {

    constructor(marca, modelo, anio, precio) {
          
        this.marca=marca;
        this.modelo=modelo;
        this.anio=anio;
        this.precio=precio;
        this.stock=true;
    }
    

    ObtenerDescripcion(){
       let detalles= "VEHICULO: "+ this.marca+ " - "+ this.modelo+ " - "+ this.anio+ " - "+ this.precio+ " - "+ this.stock;

       return detalles;
    }

    Vender(){
       
        this.stock=false;
        let mensaje= "el vehiculo ha sido vendido";

       return mensaje;;
    }
}


class Coche extends Vehiculo {

    constructor(marca, modelo, anio, precio, numPuertas, matricula, combustible) {
          super(marca,modelo,anio,precio);
        this.numPuertas=numPuertas;
        this.matricula=matricula;
        this.combustible=combustible;
    }
    

    calcularImpuestos(){

        let impuesto="";
       
        if(this.combustible=="Gasolina"){
            impuesto= this.precio*0.10;

        }else if(this.combustible=="Diesel"){
            impuesto= this.precio*0.15;

        }else if(this.combustible=="Eléctrico" || this.combustible=="Gas"){
            impuesto=this.precio*0.05;
        }

        return impuesto;
    }
    
    //sobreescribimos
     ObtenerDescripcion(){
       let detalles= "COCHE: "+ this.marca+ " - "+ this.modelo+ " - "+ this.anio+ " - "+ this.precio+ " - " +this.numPuertas+ " - "+ this.matricula+ " - "+ this.combustible;

       return detalles;
    }
}


class Motocicleta extends Vehiculo {

    constructor(marca, modelo, anio, precio, matricula, cilindrada, tipo) {
          super(marca,modelo,anio,precio);
        this.matricula=matricula;
        this.cilindrada=cilindrada;
        this.tipo=tipo;
    }
    

    calcularImpuestos(){

        let impuesto="";
       
        if(this.cilindrada<500){
            impuesto= this.precio*0.05;

        }else if(this.cilindrada>=500){
            impuesto= this.precio*0.15;

        }

        return impuesto;
    }

    //sobreescribimos
     ObtenerDescripcion(){
       let detalles= "MOTO: "+ this.marca+ " - "+ this.modelo+ " - "+ this.anio+ " - "+ this.precio+ " - " +this.matricula+ " - "+ this.cilindrada+ " - "+ this.tipo;

       return detalles;
    }
    
}


