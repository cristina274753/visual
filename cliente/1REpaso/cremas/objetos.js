

class Crema {

    constructor(nombre, precio, marca) {
          this.nombre = nombre;  
          this.precio = precio;
          this.marca = marca;
          this.ingredientes=[];
    }
    

    addIngrediente(nombre, cantidad){

        let ing= new Ingrediente(nombre, cantidad);

        this.ingredientes.push(ing);
       
    }

    removeIngrediente(i){
       this.ingredientes.splice(i,1); /*borrar ingrediente del array*/
    }

    toHTMLTable(){
       
        let tabla="<h2>"+ this.nombre +"</h2><table>";

        tabla+="<thead> <tr> <th>Nombre </th><th> Cantidad </th> </tr> </thead> ";

        tabla+= "<tbody>";

        for (let i of this.ingredientes){
            tabla+= i.toHTMLRow();
        };

        tabla+= "</tbody>";

        tabla+="</table>";

        return tabla;

        
    }

}

class Ingrediente {

    constructor(nombre, cantidad) {
          this.nombre = nombre;  
          this.cantidad = cantidad;
    }
    

    toHTMLRow(){
       return `<tr>
                    <td>${this.nombre}</td>
                    <td>${this.cantidad}</td>
                </tr>`;
    }
}