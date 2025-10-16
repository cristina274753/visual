"use strict"; //obligatorio

//alert("Hola caracola");

//////////////////////////////////////
//functions
/////////////////////////////////////

function enviar(){
    alert("hola caracola");
}

//////////////////////////////////////
//main
/////////////////////////////////////

//1. recuperamos boton del html
//document.getElementById("btnenviar")  anticuao
let btnenviar=document.querySelector("#btnenviar");  //busca cuyo id sea ese y lo guarda

//console.log("el contenido de la variable aparece abajo");
//console.log(btnenviar);


//2. añadimos funcionalidad al boton
btnenviar.addEventListener("click", enviar);




