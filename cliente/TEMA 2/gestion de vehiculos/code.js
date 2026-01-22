'use strict';

console.log("✅ code.js conectado correctamente");


let vehiculos=[];

/*datos añadidos*/
vehiculos = [
  new Coche("Toyota", "Corolla", 2022, 20000, true, 4, "ABC123", "Gasolina"),
  new Coche("Tesla", "Model 3", 2023, 40000, true, 4, "ELEC999", "Eléctrico"),
  new Motocicleta("Yamaha", "MT-07", 2021, 7000, true, "MOTO500", 689, "Deportiva"),
  new Motocicleta("Honda", "CB125", 2020, 2500, true, "MOTO125", 125, "Urbana")
];


function agregar() {

    /*obtenemos el valor de los campos*/
    const tipo = document.getElementById("tipoVehiculo").value; /*obtenemos si es coche o moto*/
    const marca = document.getElementById("marca").value;
    const modelo = document.getElementById("modelo").value;
    const anio = parseInt(document.getElementById("anio").value);
    const precio = parseFloat(document.getElementById("precio").value);
    const matricula = document.getElementById("matricula").value;
    
     if (tipo === "coche") {
        const puertas = parseInt(document.getElementById("puertas").value);
        const combustible = document.getElementById("combustible").value;

        /*creamos instancia*/
        const coche = new Coche(marca, modelo, anio, precio, true, puertas, matricula, combustible);

        /*añadimos el coche al array*/
        vehiculos.push(coche);

      } else {

        const cilindrada = parseInt(document.getElementById("cilindrada").value);
        const tipoMoto = document.getElementById("tipoMoto").value;

        const moto = new Motocicleta(marca, modelo, anio, precio, true, matricula, cilindrada, tipoMoto);

        vehiculos.push(moto);
      }
}

function listaDisponibles() {

    //filtramos los vehiculos que stock sea true
    const disponibles = vehiculos.filter(v => v.stock);

    //si no hay vehiculos mostramos el mensaje
    if (disponibles.length === 0) {
    document.getElementById("listaVehiculos").innerHTML = "No hay vehículos disponibles.";
    return;
  }

  //lista para mostrar los vehiculos
    let lista = "<ul>";
    //recorremos los vehiculos disponibles y por cada uno creamos li con su descripcion, y unimos para formar una sola cadena
    lista += disponibles.map(v => `<li>${v.obtenerDescripcion()}</li>`).join("");
    lista += "</ul>";


    document.getElementById("listaVehiculos").innerHTML= lista;
}

function vender() {
    
    //obtenemos valor de la matricula que quiere veder 
    const matriculaVender=document.getElementById("matriculaVenta").value;

    //buscamos en array vehiculos el vehiculo que tenga la matricula igual
    const vehiculo= vehiculos.find(v=> v.matricula === matriculaVender);

    //llamamos metodo vender
    vehiculo.vender();

    listaDisponibles();
}

function calcularImpuestoTotal() {
    let total = 0;

    // Filtramos los vehículos que están en stock
    const vehiculosConStock = vehiculos.filter(v => v.stock);

    // Creamos un array con los impuestos de cada vehículo
    const impuestos = vehiculosConStock.map(v =>v.calcularImpuestos());
    alert (impuestos)

    // Sumamos todos los impuestos usando forEach
    impuestos.forEach(impuesto => {
        total += impuesto;
    });


    // Creamos el mensaje final
    const impuestoTotal = "Total de impuestos: " + total;

    // Mostramos en el HTML
    document.getElementById("impuestos").innerHTML = impuestoTotal;
            
}


document.querySelector("#btnLista").addEventListener("click", listaDisponibles);
document.querySelector("#btnAgregar").addEventListener("click", agregar);
document.querySelector("#btnVender").addEventListener("click", vender);
document.querySelector("#btnImpuesto").addEventListener("click", calcularImpuestoTotal);

/*TODO ocultar campos segun coche o moto*/

// Mostrar/ocultar campos según tipo
 

    const mostrarFormulario = (tipo) => {
    // Ocultamos todos los formularios primero
    document.querySelectorAll(".formularioExtra").forEach((formulario) => {
        formulario.classList.add("oculto");
    });

    // Mostramos solo el formulario correspondiente
    if (tipo === "coche") {
        document.getElementById("cocheExtra").classList.remove("oculto");
    } else if (tipo === "motocicleta") {
        document.getElementById("motoExtra").classList.remove("oculto");
    }
    };

    // Evento cuando cambia el select
    document.getElementById("tipoVehiculo").addEventListener("change", e => {
        mostrarFormulario(document.getElementById("tipoVehiculo").value);
    });

