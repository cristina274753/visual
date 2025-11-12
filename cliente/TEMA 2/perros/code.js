'use strict';



/////////////////////////////////////////
//funciones
//////////////////////////////////////////

function muestraHTMLEnDiv(msj) {

    const divLista= document.querySelector("#divLista");

    divLista.innerHTML=msj;
    
}


function muestraPerrosInsercion() {

    let lista="";

    for (let perro of arrPerros){
        lista+="<li>"+ perro.mostrarDatos()+ "</li>";
    }

    muestraHTMLEnDiv("<ul>" + lista+ "</ul>");
    
}




//////////////////////////////////////////////
//main
//////////////////////////////////////////

const arrPerros=[];

// Datos de prueba
arrPerros.push(new Perro("Arya", 2, "Bichón maltés"));
arrPerros.push(new Perro("Sandokán", 7, "Pastor alemán"));
arrPerros.push(new Perro("Pacífico", 4, "Doberman"));
arrPerros.push(new Perro("Nana", 3, "Chihuahua"));
arrPerros.push(new Perro("Bea", 3, "Salchicha"));


//boton añadir

document.querySelector("#btnAnadir").addEventListener("click", e=>{

    const nombre= document.querySelector("#txtNombre").value.trim();
    const edad = document.querySelector("#txtEdad").valueAsNumber;
    const raza = document.querySelector("#txtRaza").value.trim();

    if(!nombre || !edad || !raza){
        muestraHTMLEnDiv("debe introducir los datos");
        return;
    }

    const p= new Perro(nombre, edad, raza);  //creamos el objeto perro
    arrPerros.push(p);   //añadimos el objeto al array


})


//boton ordenar por insercion

document.querySelector("#btnOrdInsercion").addEventListener("click", muestraPerrosInsercion);



//boton ordenar por edad

document.querySelector("#btnOrdEdad").addEventListener("click", e=>{

    const arrOrdEdad= arrPerros.toSorted((p1,p2)=> p1.edad-p2.edad);

    const lista= arrOrdEdad.map(p=>`<li>${p.mostrarDatos()}</li>`).join("");

    muestraHTMLEnDiv("<ol>"+ lista + "</ol>");


});



//boton ordenar por nombre raza

document.querySelector("#btnOrdRaza").addEventListener("click", e=>{

    const arrOrdNombre= arrPerros.toSorted((p1,p2)=> p1.raza.localeCompare(p2.raza, "es"));

    const lista= arrOrdNombre.map(p=>`<li>${p.mostrarDatos()}</li>`).join("");

    muestraHTMLEnDiv("<ul>"+ lista + "</ul>");


});