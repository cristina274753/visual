'use strict';

const hospital = new Hospital();

let medicos=[];
let citas=[];

let ordenarbtn=false;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//funciones
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function anadirMedico() {

    const email = document.querySelector("#frmAltaMedico input[name='txtEmail']").value.trim();
    const idMedico = document.querySelector("#frmAltaMedico input[name='txtIdMedico']").value.trim();
    const nombre = document.querySelector("#frmAltaMedico input[name='txtNombre']").value.trim();
    const numColegiado = parseInt(document.querySelector("#frmAltaMedico input[name='txtColegiado']").value);
    const telefono = parseFloat(document.querySelector("#frmAltaMedico input[name='txtTelefono']").value);
    

    // ============ VALIDACIONES GENERALES ============

    if (!idMedico || !nombre || !numColegiado || !telefono ) {
        alert("todos los campos son obligatorio menos el email");
        return;
    }


    //meter en el array
    let medico = new Medico(idMedico, numColegiado);
        medicos.push(medico);


    //no sale el mensaje de cpnfrimacion

    hospital.altaMedico(medico);
    
}


function anadirCita() {

    const idMedico = document.querySelector("#frmAltaCita input[name='txtIdMedico']").value.trim();
    const paciente = document.querySelector("#frmAltaCita input[name='txtPaciente']").value.trim();
    const fecha = document.querySelector("#frmAltaCita input[name='txtFecha']").value;
    const hora = document.querySelector("#frmAltaCita input[name='txtHora']".value);
    

    // ============ VALIDACIONES GENERALES ============

    if (!idMedico || !paciente || !fecha || !hora ) {
        alert("todos los campos son obligatorio ");
        return;
    }


    //meter en el array
    let cita = new Cita(idMedico, paciente, fecha, hora);
        citas.push(cita);

    hospital.altaCita(cita);

}


function listadoMedicos() {


    let medicosSinEmail=medicos.filter(m =>!m.email );
    let sinEmail= medicosSinEmail.length;

    const totales = document.querySelector("#listado");

    let tabla=hospital.listadoMedicos();

    totales.innerHTML = tabla;
   

}

function listadoCitas() {


    const totales = document.querySelector("#listado");


    totales.innerHTML = hospital.listadoCitas();
   

}










//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//botones
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//btn agregar

document.querySelector("#btnAltaMedico").addEventListener("click", anadirMedico);


//btn lista vehiculos

document.querySelector("#btnAltaCita").addEventListener("click", anadirCita);


//btn vender por matricula

document.querySelector("#btnListadoMedicos").addEventListener("click", listadoMedicos);


//btn inpuesto

document.querySelector("#btnListadoCitas").addEventListener("click", listadoCitas);


if(ordenarbtn){
    //btn ordenar medicos
    document.querySelector("#ordenar").addEventListener("click", ordenarMedicos);
}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esconder formularios
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Al inicio, ocultamos ambos formularios
const altaMedico = document.querySelector("#divFrmAltaMedico");
const AltaCita = document.querySelector("#divFrmAltaCita");
altaMedico.classList.add("oculto");
AltaCita.classList.add("oculto");

// Función que muestra uno u otro
const mostrarFormulario = (tipo) => {
    // Ocultamos ambos primero
    altaMedico.classList.add("oculto");
    AltaCita.classList.add("oculto");

    // Mostramos solo el que toca
    if (tipo === "medico") {
        altaMedico.classList.remove("oculto");
    } else if (tipo === "cita") {
        AltaCita.classList.remove("oculto");
    }
};

// Botones de acción (ya existen en tu HTML)
document.querySelector("#btnFormAltaMedico").addEventListener("click", () => mostrarFormulario("medico"));
document.querySelector("#btnFormAltaCita").addEventListener("click", () => mostrarFormulario("cita"));


document.querySelector("#btnListadoMedicos").addEventListener("click", () => mostrarFormulario("otro"));
document.querySelector("#btnListadoCitas").addEventListener("click", () => mostrarFormulario("otro"));
