'use strict';

console.log("code");
let perros=[];

function añadir() {
    
    //obtener nombre, edad y raza del formulario
    const nombre = document.querySelector("#txtNombre").value;
    const edad = document.querySelector("#txtEdad").value;
    const raza = document.querySelector("#txtRaza").value;

    if(nombre=="" || edad=="" || raza==""){
        //poner error debes rellenar todos los campos
    }else{

        let perro= new Perro(nombre, edad, raza);

        perros.push(perro);
    }
}



function ordInsercion() {
    
    let lista="<ul>";

    for (let p of perros){
        lista+= "<li>"+ p.mostrarDatos()+ "</li>";
    }

    lista+= "</ul>";


    document.querySelector("#divLista").innerHTML=lista;
}


function ordEdad() {
    
    let lista="<ol>";

    let arrOrd=perros.toSorted((p1,p2)=> p1.edad-p2.edad); //ordenado comparando

    for(let p of arrOrd){
        lista+= "<li>"+ p.mostrarDatos()+ "</li>";
    }

    lista+="</ol>";

    document.querySelector("#divLista").innerHTML=lista;
    
}



function ordRaza() {
    

    let lista="<ul>";

    let arrOrd= perros.toSorted((p1,p2)=> p1.raza.localeCompare(p2.raza, "es")); //ordenando por letras 

    for( let p of arrOrd){
        lista+= "<li>" + p.mostrarDatos()+ "</li>";
    }

    lista+="</ul>";

    document.querySelector("#divLista").innerHTML=lista;
}




/*boton de añadir*/
document.querySelector("#btnAnadir").addEventListener("click", añadir);

//btn ordenar por insercion
document.querySelector("#btnOrdInsercion").addEventListener("click", ordInsercion);


//btn ord por edad
document.querySelector("#btnOrdEdad").addEventListener("click", ordEdad);


//btn ord * raza
document.querySelector("#btnOrdRaza").addEventListener("click", ordRaza);
