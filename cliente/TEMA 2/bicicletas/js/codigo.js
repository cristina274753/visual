"use strict";

// creamos tienda
const tienda = new Tienda();
// añadir objetos de prueba
tienda.altaBicicleta( new Carretera(1001, 2020, false, 18) );
tienda.altaBicicleta( new Montaña(2001, 2019, false, 2) );
tienda.altaBicicleta( new Carretera(1002, 2021, false, 22) );
tienda.altaBicicleta( new Montaña(2002, 2018, false, 3) );
tienda.altaBicicleta( new Carretera(1003, 2017, false, 16) );
tienda.altaBicicleta( new Montaña(2003, 2022, false, 4) );



// contamos las bicicletas
let bicisCarretera = 0;
let bicisMontaña = 0;
let totalBicicletas = 0;
let totalVentas = 0;
let totalSinVender = 0;

for (const bici of tienda.tBicis) {
    totalBicicletas++;
    if (bici instanceof Carretera) {
        bicisCarretera++;
    } else if (bici instanceof Montaña) {
        bicisMontaña++;
    }
    if (bici.vendida) {
        totalVentas++;
    } else {
        totalSinVender++;
    }
}

// las guardamos en la tienda segun su numero, ventas y sin vender
tienda.numCarretera = bicisCarretera;
tienda.numMontaña = bicisMontaña;
tienda.numTotal = totalBicicletas;
tienda.numVentas = totalVentas;
tienda.numSinVender = totalSinVender;





const mostrarAlta = function() {
    
    const localizador = document.querySelector("#txtLocalizador").value.trim();
    const anio = document.querySelector("#lstAnio").value.trim();
    const tipoBicicleta = document.querySelector('input[name="rbtTipoBicicleta"]:checked')?.value;
    if (!tipoBicicleta) {
        alert("Selecciona una opción");
        return;
    }

    const suspensiones = document.querySelector("#txtSuspensiones").value;
    const platos = document.querySelector("#txtPlatos").value;

    if (localizador === "" || anio === "" || tipoBicicleta === "" || suspensiones === "" || platos === "") {
        alert("Todos los campos deben estar rellenos.");
        return;
    }

    // transformar las suspensiones y platos a números
    const numSuspensiones = parseInt(suspensiones);
    const numPlatos = parseInt(platos);

    
    for (const bici of tienda.tBicis) {
        if (bici.localizador === localizador) {
            alert("Bicicleta registrada previamente.")
            return;
        }    
    }

    let nuevaBici;
    if (tipoBicicleta === "carretera") {
        // 
        nuevaBici = new Carretera(localizador, anio, false, platos);
    } else if (tipoBicicleta === "montana") {
        nuevaBici = new Montaña(localizador, anio, false, suspensiones );
    }

 // añadimos la nueva bici al tienda
   tienda.altaBicicleta(nuevaBici);

    // ocultar con style.display = "none"
    const frmAltaBicicleta = document.querySelector("form[form='frmAltaBicicleta']");
frmAltaBicicleta.style.display = "none";
    // con css
    // const frmAltaBicicleta = document.querySelector("#frmAltaBicicleta");
    //frmAltaBicicleta.classList.add("hidden"); // O "d-none" si usas Bootstrap


};

const mostrarVenta = function() {
    const localizador = document.querySelector("[name='txtLocalizadorVenta']").value;

    
    if (isNaN(localizador)) {
        alert("Introduce un localizador válido");
        return;
    }

    let localizadorBici = parseInt(localizador);

    alert(tienda.ventaBici(localizadorBici));
};

const mostrarTotales = function() {
 
const totales = document.querySelector("#totales");



totales.innerHTML = `
<h3>Bicicletas de carretera: ${tienda.numCarretera} </h3> <br>
<h3>Bicicletas de montaña: ${tienda.numMontaña} </h3> <br>
<h3>Total de bicicletas: ${tienda.numTotal} </h3> <br>
<h3>Total de ventas: ${tienda.numVentas} </h3> <br>
<h3> Total sin vender: ${tienda.numSinVender} </h3>
`;
 
};

const mostrarListado = function() {
    const totales = document.querySelector("#totales");

    // mostrar los listados
    totales.innerHTML = tienda.listadoGeneral() + tienda.listadoCarretera() + tienda.listadoMontania();
};





// main



const btnMostrarAlta = document.querySelector("#btnAltaBicicleta");
const btnMostrarVenta = document.querySelector("#btnVentaBicicleta");
const btnMostrarTotales = document.querySelector("#btnMostrarTotales");
const btnMostrarListado = document.querySelector("#btnMostrarListado");






btnMostrarAlta.addEventListener('click', mostrarAlta);
btnMostrarVenta.addEventListener('click', mostrarVenta);
btnMostrarTotales.addEventListener('click', mostrarTotales);
btnMostrarListado.addEventListener('click', mostrarListado);




// Mostrar/ocultar campos según tipo
 

// --- Mostrar / ocultar formularios de alta y venta ---

// Al inicio, ocultamos ambos formularios
const frmAlta = document.querySelector("form[form='frmAltaBicicleta']");
const frmVenta = document.querySelector("form[form='frmVentaBicicleta']");
frmAlta.classList.add("oculto");
frmVenta.classList.add("oculto");

// Función que muestra uno u otro
const mostrarFormulario = (tipo) => {
    // Ocultamos ambos primero
    frmAlta.classList.add("oculto");
    frmVenta.classList.add("oculto");

    // Mostramos solo el que toca
    if (tipo === "alta") {
        frmAlta.classList.remove("oculto");
    } else if (tipo === "venta") {
        frmVenta.classList.remove("oculto");
    }
};

// Botones de acción (ya existen en tu HTML)
document.querySelector("#btnMostrarAlta").addEventListener("click", () => mostrarFormulario("alta"));
document.querySelector("#btnMostrarVenta").addEventListener("click", () => mostrarFormulario("venta"));

