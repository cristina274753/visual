'use strict';

/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////

function calcularVolumenEsfera(){

    //recuperamos input donde se pone el numero
    let txtRadio= document.getElementById("txtRadio");

    //recuperamos el valor del dato
    let radio= txtRadio.value;

    //calculamos el volumen
    let volumenEsfera= (4/3)*Math.PI*Math.pow(radio,3);

    //mostramos el resultado
    let resultado= document.getElementById("resultado");
    resultado.innerHTML="el volumen de la esfera de radio "+radio+" es " +volumenEsfera;
}


/////////////////////////////////////////////
//constantes
/////////////////////////////////////////////

//////////////////////////////////////////////
//main
/////////////////////////////////////////////

//recuperamos el boton de calcular
let btnCalcular=document.getElementById("btnCalcular");

//le damos un evento al boton
btnCalcular.addEventListener("click", calcularVolumenEsfera);
