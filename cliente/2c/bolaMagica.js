'use strict';

/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////

function getRandomInt(max) {
  return Math.floor(Math.random()*8) 
}

function respuestaAzar(){

    //recuperamos el input
    let txtPregunta=document.getElementById("txtPregunta");

    //recuperamos el valor
    let pregunta= txtPregunta.value;

    let numero= getRandomInt(5);

    let resultado;

    //calculamos la respuesta
    if(numero===0){
        resultado="No cuentes con ello";
     }
    else if(numero===1){
        resultado="Seguro que sí";
    }
    else if(numero===2){
        resultado="No parece probable";
    }
    else if(numero===3){
        resultado="Por supuesto que sí";
    }
    else if(numero===4){
        resultado="Dudo que ocurra";
    }

    //mostramos el resultado
    let divresultado=document.getElementById("divresultado");
    divresultado.innerHTML="la respuesta a la pregunta "+pregunta+" es "+resultado;

}

/////////////////////////////////////////////////////
//main
/////////////////////////////////////////////

//recuperamos el boton de azar
let btnAzar=document.getElementById("btnAzar");

//le damos un evento al boton
btnAzar.addEventListener("click", respuestaAzar);