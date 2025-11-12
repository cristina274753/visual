'use strict';


function Crema(nombre, precio, marca) {
    
    this.nombre=nombre;
    this.precio=precio;
    this.marca=marca;
    this.ingredientes=[];
}


function Ingrediente(nombre, cantidad) {
    
    this.nombre=nombre;
    this.cantidad=cantidad;
}

Ingrediente.prototype.toHTMLRow= function(){  /*fila de la tabla*/
    return `<tr>
  <td>${this.nombre}</td>
  <td>${this.cantidad}</td>
  </tr>`;
}



Crema.prototype.addIngrediente= function(nombre,cantidad){
    let ing = new Ingrediente(nombre, cantidad); /*crear objeto*/
    this.ingredientes.push(ing);/*añadir obj al array*/
}

Crema.prototype.removeIngrediente= function(i){
    this.ingredientes.splice(i,1); /*borrar ingrediente del array*/
}

Crema.prototype.toHTMLTable= function(){  /*tabla html con todos los ingredientes*/

    /*inicio tabla*/
    let tabla=  `<table style="width:80%;margin-inline:auto"> 
            <caption>Crema ${this.nombre} - Marca ${this.marca}</caption>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody>`;
    

    /*bucle de los ingredientes del array y pintar funcion de filas tabla*/
    for (let ing of this.ingredientes){
        tabla+= ing.toHTMLRow();
    }

    /*fin tabla*/
    tabla+=`</tbody>
            <tfoot>
                <tr>
                <th colspan="2">Precio: ${this.precio} €</th>
                </tr>
            </tfoot>
            </table>`;
  
  return tabla;
}