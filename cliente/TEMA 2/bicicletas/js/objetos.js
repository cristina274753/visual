'use strict';


class Tienda {

    constructor(tBicis = [], numVentas,numCarretera, numMontaña, numTotal, numSinVender) {
          this. tBicis = [];
          this.numVentas = numVentas;  
          this.numCarretera = numCarretera;
          this.numMontaña = numMontaña;
          this.numTotal = numTotal;
          this.numSinVender = numSinVender;
    }
    

    altaBicicleta(OBici){
       const bici = this.tBicis.find(b => b.localizador === OBici.localizador);

        if (bici) {
            return "Bicicleta registrada previamente.";  
        } else {

        this.tBicis.push(OBici);
        return "Alta bicicleta OK";
    }
}


     ventaBici(localizador) {
        // buscar la bicicleta en el array
        const bici = this.tBicis.find(b => b.localizador === localizador);
        
      
        if (!bici) {    
           return "Bicicleta no encontrada";
        }
        
        
        if (bici.vendida) {
            return "Bicicleta ya vendida";
        }
        
        // caso c: Vender la bicicleta
        bici.vendida = true; // cambiar estado a vendida

        return "Bicicleta vendida";
    }



    listadoGeneral() {
        let html = `
            <table class="table table-striped">
                <thead><h2>Tienda al completo</h2>
                    <tr>
                        <th>Localizador</th>
                        <th>Año</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>`;
        
        for (const bici of this.tBicis) {
            html += bici.toHTMLrow();
        }
        
        html += `</tbody></table>`;
        return html;
    }
    listadoMontania() {
        let html = `
            <table class="table table-striped">
                <thead><h2>Bicicletas de Montaña</h2>
                    <tr>
                        <th>Localizador</th>
                        <th>Año</th>
                        <th>Suspensiones</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>`;
        
        for (const bici of this.tBicis) {
            if (bici instanceof Montaña) {
                html += bici.toHTMLrowMontaña();
            }
        }
        
        html += `</tbody></table>`;
        return html;
    }

    listadoCarretera() {
        let html = `
            <table class="table table-striped">
                <thead> <h2> Bicicletas de Carretera</h2>
                    <tr>
                        <th>Localizador</th>
                        <th>Año</th>
                        <th>Platos</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>`;
        
        for (const bici of this.tBicis) {
            if (bici instanceof Carretera) {
                html += bici.toHTMLrowCarretera();
            }
        }
        
        html += `</tbody></table>`;
        return html;
    }

}



function Bicicleta(localizador, año, vendida) {
    this.localizador = localizador;
    this.año = año;
    this.vendida = vendida || false;      
}

Bicicleta.prototype.toHTMLrow = function () {
    const estado = this.vendida ? 'Vendida' : 'Disponible';
    return `
        <tr>
            <td>${this.localizador}</td>
            <td>${this.año}</td>
            <td>Bicicleta</td>
            <td>-</td>
            <td>${estado}</td>
        </tr>`;
}

Bicicleta.prototype.toHTMLrowCarretera = function () {
    const estado = this.vendida ? 'Vendida' : 'Disponible';
    return `
        <tr>
            <td>${this.localizador}</td>
            <td>${this.año}</td>
            <td>${this.numPlatos} platos</td>
            <td>${estado}</td>
        </tr>`;
}

Bicicleta.prototype.toHTMLrowMontaña = function () {
    const estado = this.vendida ? 'Vendida' : 'Disponible';
    return `
        <tr>
            <td>${this.localizador}</td>
            <td>${this.año}</td>
            <td>${this.numSuspensiones} suspensiones</td>
            <td>${estado}</td>
        </tr>`;
}



// para herencia prototipica, class.call(this, cosa, cosa)

function Carretera(localizador, año, vendida, numPlatos) {
    Bicicleta.call(this, localizador, año, vendida);
    this.numPlatos = numPlatos;
}

Object.setPrototypeOf(Carretera.prototype, Bicicleta.prototype);

function Montaña(localizador, año, vendida, numSuspensiones) {
    Bicicleta.call(this, localizador, año, vendida);
    this.numSuspensiones = numSuspensiones;
}

Object.setPrototypeOf(Montaña.prototype, Bicicleta.prototype);



Object.setPrototypeOf(Montaña.prototype, Bicicleta.prototype);