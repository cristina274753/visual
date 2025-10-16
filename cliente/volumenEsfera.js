
"use strict"; 
/////////////////////////////////////////////
//funciones
/////////////////////////////////////////////

/**
 *Calcula el volumen de una esfera
 *
 * @param {number} radio
 * @return {number} 
 */
function calcularVolumenEsfera(radio){
    return 4/3 *Math.PI * (radio**3);
}




function recuperarDatosyCalcular(){
    //recuperamos el input donde el usuario ha puestoo el radio

    const txtRadio=document.querySelector("#txtRadio");

    //recuperamos el valor del input

    const radio=Number(txtRadio.value);

    //const radio=document.querySelector("#txtRadio").value;

    //calcullamos el volumen de una esfera

    const volumenEsfera= calcularVolumenEsfera(radio);

    //presentamos el resultadp al usuario 
    presentarInformacion(radio, volumenEsfera);

}


/**
 *presenta el resultado al usuario en la web 
 *
 * @param {number} radio
 * @param {number} volumenEsfera
 */
function presentarInformacion(radio, volumenEsfera){

    //recuperamos la division del resultado

    const divResultado=document.querySelector("#divResultado");

    //creamos la cadena de caracteres que se mostraraa en la division 

    const solucion= "una esfera de radio: <code>" + radio + "</code> tiene un volumen de: <code>" + volumenEsfera + "</code> unidades";

    //mostrara la cadenaa de caracterees en la division

    divResultado.innerHTML= solucion; 


}




//////////////////////////////////////////////
//main
/////////////////////////////////////////////


//1 recuperamos el boton  del html
const btnCalcular=document.querySelector("#btnCalcular");

//2 añadimos funcionalidad al boton
btnCalcular.addEventListener("click", recuperarDatosyCalcular);



/*
let volumenEsferaRadio1= calcularVolumenEsfera(1);
alert("el volumen de una esfera de radio 1 es "+ volumenEsferaRadio1);


let volumenEsferaRadio2= calcularVolumenEsfera(2);
alert("el volumen de una esfera de radio 2 es "+ volumenEsferaRadio2);
*/