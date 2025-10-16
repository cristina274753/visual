'use strict';

/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////
function CalcularPH(){

    //recuperar el input
    let txtPH= document.getElementById("txtPH");

    //recuperamos el valor
    let ph= Number(txtPH.value);

    //calculamos el ph

    let resultado;

    if (ph<3.5) {
        resultado= "muy acido";
    } else if(ph>=3.5 && ph<6.5){
        resultado= "ligeramente acido";
    }else if(ph>=6.5 && ph<8.5){
        resultado= "ph neutro";
    }else if(ph>=8.5 && ph<11){
        resultado= "ligeramente alcalino";
    }else{
        resultado= "muy alcalino";
    }

    //mostramos el resultado
    let divresultado= document.getElementById("divresultado");
    divresultado.innerHTML="el ph es "+resultado;
}

/////////////////////////////////////////////////////
//main
/////////////////////////////////////////////

//recuperamos el boton de calcular
let btnCalcular= document.getElementById("btnCalcular");

//le damos un evento al boton
btnCalcular.addEventListener("click", CalcularPH);