'use strict';

function reconstruirVehiculos(datos) {
  return datos.map(v => {
    let vehiculoRec;

    if (v.numPuertas !== undefined) {
      vehiculoRec = new Coche(
        v.marca,
        v.modelo,
        v.anio,
        v.precio,
        v.numPuertas,
        v.matricula,
        v.combustible
      );
    } else {
      vehiculoRec = new Motocicleta(
        v.marca,
        v.modelo,
        v.anio,
        v.precio,
        v.matricula,
        v.cilindrada,
        v.tipo
      );
    }

    // Mantener el estado stock original
    vehiculoRec.stock = v.stock;

    return vehiculoRec;
  });
}


let vehiculos=[];

let guardados = JSON.parse(localStorage.getItem("vehiculos"));

if (guardados) {
  vehiculos = reconstruirVehiculos(guardados);
} else {
  vehiculos = [
    new Coche("Toyota", "Corolla", 2022, 20000, 3, "ABC123", "Gas"),
    new Coche("Tesla", "Model 3", 2023, 40000, 2, "ELEC999", "Eléctrico"),
    new Motocicleta("Yamaha", "MT-07", 2021, 7000, "MOTO500", 689, "Deportiva"),
    new Motocicleta("Honda", "CB125", 2020, 2500, "MOTO125", 125, "Urbana")
  ];
}




function añadirVehiculo() {

    const tipo = document.getElementById("tipoVehiculo").value;
    const marca = document.getElementById("marca").value.trim();
    const modelo = document.getElementById("modelo").value.trim();
    const anio = parseInt(document.getElementById("anio").value);
    const precio = parseFloat(document.getElementById("precio").value);
    const matricula = document.getElementById("matricula").value.trim();

    // ============ VALIDACIONES GENERALES ============

    if (!marca || !modelo || !anio || !precio || !matricula) {
        alert("Todos los campos generales son obligatorios.");
        return;
    }

    if (isNaN(anio) || anio < 1900 || anio > new Date().getFullYear()) {
        alert("El año no es válido.");
        return;
    }

    if (isNaN(precio) || precio <= 0) {
        alert("El precio no es válido.");
        return;
    }

    // Evitar matrículas duplicadas
    if (vehiculos.some(v => v.matricula === matricula)) {
        alert("Ya existe un vehículo con esa matrícula.");
        return;
    }

    // ============ VALIDACIONES POR TIPO ============

    if (tipo === "coche") {

        const puertas = parseInt(document.getElementById("puertas").value);
        const combustible = document.getElementById("combustible").value;

        if (!puertas || puertas < 2 || puertas > 7) {
            alert("El número de puertas no es válido.");
            return;
        }

        const combustiblesValidos = ["Gasolina", "Diesel", "Eléctrico", "Gas"];

        if (!combustiblesValidos.includes(combustible)) {
            alert("El tipo de combustible no es válido.");
            return;
        }

        // Crear el coche si todo OK
        let vehiculo = new Coche(marca, modelo, anio, precio, puertas, matricula, combustible);
        vehiculos.push(vehiculo);

    } else {

        const cilindrada = parseInt(document.getElementById("cilindrada").value);
        const tipoMoto = document.getElementById("tipoMoto").value.trim();

        if (!cilindrada || cilindrada <= 0) {
            alert("La cilindrada no es válida.");
            return;
        }

        if (!tipoMoto) {
            alert("El tipo de motocicleta no puede estar vacío.");
            return;
        }

        const vehiculo = new Motocicleta(marca, modelo, anio, precio, matricula, cilindrada, tipoMoto);
        vehiculos.push(vehiculo);
    }

    // Guardamos en localStorage
    localStorage.setItem("vehiculos", JSON.stringify(vehiculos));

    alert("Vehículo añadido correctamente");

    
}


function listar() {

    let vDisponibles=vehiculos.filter(v => v.stock);


    
    let lista="<ul>";

    for(let v of vDisponibles){
        lista+= "<li>"+ v.ObtenerDescripcion()+ "</li>";
    }

    lista+= "</ul>";

    return document.querySelector("#listaVehiculos").innerHTML=lista;


}

function vender() {
    
    const matricula = document.getElementById("matriculaVenta").value;

    let vehiculo= vehiculos.find(v=> v.matricula === matricula);

    vehiculo.Vender();

    listar();

    //guardamos en localStorage
    localStorage.setItem("vehiculos", JSON.stringify(vehiculos));


}

function impuesto() {
    
    let total=0;

    let vDisponibles=vehiculos.filter(v => v.stock);

    for (let v of vDisponibles){
        total+= v.calcularImpuestos();
    }

    let mensaje= "el total de impuestos es: "+ total;

    return document.querySelector("#impuestos").innerHTML=mensaje;

}


//btn agregar

document.querySelector("#btnAgregar").addEventListener("click", añadirVehiculo);


//btn lista vehiculos

document.querySelector("#btnLista").addEventListener("click", listar);


//btn vender por matricula

document.querySelector("#btnVender").addEventListener("click", vender);


//btn inpuesto

document.querySelector("#btnImpuesto").addEventListener("click", impuesto);



//ocultar formularios dependiendo del tipo

// Al inicio, ocultamos ambos formularios
const formCoche = document.querySelector("#cocheExtra");
const formMoto = document.querySelector("#motoExtra");

formMoto.classList.add("oculto");

// Función que muestra uno u otro
const mostrarFormulario = (tipo) => {
    // Ocultamos ambos primero
    formMoto.classList.add("oculto");
    formCoche.classList.add("oculto");

    // Mostramos solo el que toca
    if (tipo === "motocicleta") {
        formMoto.classList.remove("oculto");
    } else if (tipo === "coche") {
        formCoche.classList.remove("oculto");
    }
};

// Botones de acción (ya existen en tu HTML)
document.querySelector("#tipoVehiculo").addEventListener("change", function () {
    mostrarFormulario(this.value);});

